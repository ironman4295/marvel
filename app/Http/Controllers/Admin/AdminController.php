<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    //后台首页
    public function index()
    {
        return view('admin.index');
    }

    //注册
    public function reg()
    {
        return view('admin.reg');
    }

    //执行注册
    public function regDo(Request $request)
    {
        //接收注册传来的数据
        $post = $request->input();
        //验证非空 && 验证密码是否对准 && 验证验证码是否有效
        if(empty($post['name']) || empty($post['pass']) || empty($post['tel']) || empty($post['code'])){
            $aa = [
                'error' => 2001,
                'msg'   => '请完善注册信息'
            ];
            return json_encode($aa);
        }

        if($post['pass'] != $post['pwd']){
            $aa=[
                'error' => 1002,
                'msg'   => '确认密码不正确'
            ];

            return json_encode($aa);
        }

        //取出发送验证码时的缓存
        $id = Redis::get('id');
        $code = Redis::get('code');
        if(($id != $post['tel']) || ($code != $post['code'])){
            $aa=[
                'error' => 2002,
                'msg'   => '无效的验证码'
            ];
            return json_encode($aa);
        }

        //添加用户数据
        $data = [
            'name'  => $post['name'],
            'pass'  => $post['pass'],
            'tel'   => $post['tel'],
            'addtime'   =>  time()
        ];
        $bb = User::insert($data);
        if($bb){
            $aa = [
                'error' => 1001,
                'msg'   => '账号注册成功'
            ];
        }else{
            $aa = [
                'error' => 1003,
                'msg'   => '账号注册失败'
            ];
        }

        return json_encode($aa);
    }

    //处理登陆
    public function log(Request $request)
    {
        $post = $request->input();

        $aa = User::where(['name'=>$post['name']])->first();
        if(empty($aa)){
            $res = [
                'error' =>  1002,
                'msg'   =>  '没有此账号'
            ];
            return json_encode($res);
        }

        $bb = User::where(['pass'=>$post['pass']])->first();
        if($bb){
            $res = [
                'error' =>  1001,
                'msg'   =>  '登陆成功'
            ];
            Redis::set('login',$bb->name);
        }else{
            $res = [
                'error' =>  1003,
                'msg'   =>  '账号密码错误'
            ];
        }
        return json_encode($res);
    }

    //忘记密码
    public function forget()
    {
        return view('admin.forget');
    }

    public function forge(Request $request)
    {
        $post = $request->input();
        //验证非空 && 验证密码是否对准 && 验证验证码是否有效
        if(empty($post['pwd']) || empty($post['pass']) || empty($post['tel']) || empty($post['code'])){
            $aa = [
                'error' => 2001,
                'msg'   => '请完善修改信息'
            ];
            return json_encode($aa);
        }

        $aa = User::where(['tel'=>$post['tel']])->first();
        if(empty($aa)){
            $res = [
                'error' =>  1002,
                'msg'   =>  '没有此手机号'
            ];
            return json_encode($res);
        }

        if($post['pass'] != $post['pwd']){
            $aa=[
                'error' => 1002,
                'msg'   => '确认密码不正确'
            ];

            return json_encode($aa);
        }

        //取出发送验证码时的缓存
        $id = Redis::get('id');
        $code = Redis::get('code');
        if(($id != $post['tel']) || ($code != $post['code'])){
            $aa=[
                'error' => 2002,
                'msg'   => '无效的验证码'
            ];
            return json_encode($aa);
        }

        $data = [
            'pass'  =>  $post['pass']
        ];
        //修改密码
        $oo = User::where(['tel'=>$post['tel']])->update($data);

        if($oo){
            $res = [
                'error' => 1001,
                'msg'   => '修改成功'
            ];
            return json_encode($res);
        }
    }

    //发送验证码
    public function send(Request $request)
    {
        $tel = $request->input('tel');
        $code = mt_rand(10000,99999);
        $url = 'http://v.juhe.cn/sms/send'; //短信接口的URL
        $smsConf = array(
            'key'   => 'd9c039eac7fe883f95a38f2549ce80da', //您申请的APPKEY
            'mobile'    => $tel, //接受短信的用户手机号码
            'tpl_id'    => '181090', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>"#code#={$code}&#company#=黑客帝国企业" //您设置的模板变量，根据实际情况修改
        );
        $content = $this->sendMail($url,$smsConf,1); //请求发送短信

        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code == 0){
                //状态为0，说明短信发送成功
                $res = [
                    'error' =>  1001,
                    'msg'   =>  "短信发送成功"
                ];
                Redis::set('id',$tel);
                Redis::set('code',$code);
            }else{
                //状态非0，说明失败
                $res = [
                    'error' =>  2001,
                    'msg'   =>  "短信发送失败"
                ];
            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            $res = [
                'error' =>  2002,
                'msg'   =>  "请求发送短信失败"
            ];
        }
        return json_encode($res);
    }

    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $post [是否采用POST形式]
     * @return  string
     */
    public function sendMail($url,$params=false,$post=0)
    {
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $post )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }

    //测试redis
    public function redis()
    {
        Redis::set('name', 'guwenjie');
        $values = Redis::get('nav');
        dd($values);
        //输出："guwenjie"
        //加一个小例子比如网站首页某个人员或者某条新闻日访问量特别高，可以存储进redis，减轻内存压力
        $userinfo = Member::find(1200);
        Redis::set('user_key',$userinfo);
        if(Redis::exists('user_key')){
            $values = Redis::get('user_key');
        }else{
            $values = Member::find(1200);//此处为了测试你可以将id=1200改为另一个id
        }
        dump($values);
    }

    //退出
    public function logOut()
    {
        Redis::del('login');
        return redirect('/');
    }
}
