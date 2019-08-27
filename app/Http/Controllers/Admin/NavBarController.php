<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Navbar;
use App\Model\Lownav;

class NavBarController extends Controller
{
    //展示顶部导航栏
    public function first()
    {
        $data = Navbar::orderBy('weight','desc')->paginate(6);
        return view('admin.nav',compact('data'));
    }

    //底部导航栏
    public function low()
    {
        $info = Lownav::orderBy('weight','desc')->paginate(6);
        return view('admin.low',compact('info'));
    }

    //栏目添加
    public function barAdd()
    {
        return view('admin.bar');
    }

    //执行添加专栏
    public function addBar(Request $request)
    {
        $post = $request->input();
        if($post['nav'] == 0){
            if(empty($post['name'])){
                $res = [
                    'error' =>  1002,
                    'msg'   =>  '请填写导航栏'
                ];
                return json_encode($res);
            }

            $arr = [
                'name'  =>  $post['name'],
                'weight'    =>  $post['weight'],
                'is_show'   =>  $post['show'],
                'addtime'   =>  time()
            ];

            $ins =  Navbar::insert($arr);
            if($ins){
                $res = [
                    'error' =>  1001,
                    'msg'   =>  '添加成功'
                ];
            }else{
                $res = [
                    'error' =>  1003,
                    'msg'   =>  '请输入正确数据'
                ];
            }
            return json_encode($res);

        }else{
            if(empty($post['name'])){
                $res = [
                    'error' =>  1002,
                    'msg'   =>  '请填写导航栏'
                ];
                return json_encode($res);
            }

            $arr = [
                'name'  =>  $post['name'],
                'weight'    =>  $post['weight'],
                'is_show'   =>  $post['show'],
                'addtime'   =>  time()
            ];

            $ins =  Lownav::insert($arr);
            if($ins){
                $res = [
                    'error' =>  1001,
                    'msg'   =>  '添加成功'
                ];
            }else{
                $res = [
                    'error' =>  1003,
                    'msg'   =>  '请输入正确数据'
                ];
            }
            return json_encode($res);
        }
    }

    //修改导航栏页面
    public function upd($id)
    {
        $data = Navbar::where('nid',$id)->first();
        return view('admin.upbar',compact('data'));
    }

    //执行修改导航栏
    public function update(Request $request)
    {
        $post = $request->input();
        $data = Navbar::where(['nid'=>$post['nid']])->first();
        if(empty($post['name'])){
            $res = [
                'error' => 1002,
                'msg'   => '请完善修改内容'
            ];
            return json_encode($res);
        }

        if($data['name'] == $post['name'] && $data['weight'] == $post['weight'] && $data['is_show'] == $post['show']){
            $res = [
                'error' => 1004,
                'msg'   => '请选择要修改的内容'
            ];
            return json_encode($res);
        }

        $arr = [
            'name'  =>  $post['name'],
            'weight'    =>  $post['weight'],
            'is_show'   =>  $post['show'],
            'addtime'   =>  time()
        ];

        $nav = Navbar::where(['nid'=>$post['nid']])->update($arr);
        if($nav){
            $res = [
                'error' =>  1001,
                'msg'   =>  '修改成功'
            ];
        }else{
            $res = [
                'error' =>  1003,
                'msg'   =>  '修改时遇到未知错误'
            ];
        }
        return json_encode($res);
    }

    //删除导航栏
    public function del($id)
    {
        Navbar::where('nid',$id)->delete();
        return redirect('/bar');
    }

    //修改导航栏页面
    public function edit($id)
    {
        $data = Lownav::where('did',$id)->first();
        return view('admin.uplow',compact('data'));
    }

    //执行修改导航栏
    public function editDo(Request $request)
    {
        $post = $request->input();
        $data = Lownav::where(['did'=>$post['did']])->first();
        if(empty($post['name'])){
            $res = [
                'error' => 1002,
                'msg'   => '请完善修改内容'
            ];
            return json_encode($res);
        }

        if($data['name'] == $post['name'] && $data['weight'] == $post['weight'] && $data['is_show'] == $post['show']){
            $res = [
                'error' => 1004,
                'msg'   => '请选择要修改的内容'
            ];
            return json_encode($res);
        }

        $arr = [
            'name'  =>  $post['name'],
            'weight'    =>  $post['weight'],
            'is_show'   =>  $post['show'],
            'addtime'   =>  time()
        ];

        $nav = Lownav::where(['did'=>$post['did']])->update($arr);
        if($nav){
            $res = [
                'error' =>  1001,
                'msg'   =>  '修改成功'
            ];
        }else{
            $res = [
                'error' =>  1003,
                'msg'   =>  '修改时遇到未知错误'
            ];
        }
        return json_encode($res);
    }

    //删除底部导航栏
    public function delete($id)
    {
        Lownav::where('did',$id)->delete();
        return redirect('/low');
    }


}
