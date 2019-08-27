<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lotmp;
use App\Model\Thump;

class ThumpController extends Controller
{
    //顶部轮播图展示
    public function first()
    {
        $data = Thump::where('show',0)->orderBy('tid','desc')->paginate(2);
        return view('admin.thump',compact('data'));
    }

    //底部轮播图展示
    public function low()
    {
        $info = Lotmp::where('show',0)->orderBy('lid','desc')->paginate(2);
        return view('admin.lotmp',compact('info'));
    }

    //添加轮播图展示
    public function tmpAdd()
    {
        return view('admin.tmp');
    }

    //执行添加轮播图
    public function addTmp(Request $request)
    {
        $post = $request->input();
        if($post['dire'] == 0){
            if ($request->hasFile('logo')) {
                $post['logo']=$this->upload($request,'logo');
            }
            $path = $post['logo'];
            $aa = [
                'name'  =>  $post['name'],
                'dire'  =>  $post['dire'],
                'logo'  =>  $path,
                'addtime'   => time(),
            ];
            Thump::insert($aa);
            return redirect('/tmp');
        }else{
            if ($request->hasFile('logo')) {
                $post['logo']=$this->upload($request,'logo');
            }
            $path = $post['logo'];
            $aa = [
                'name'  =>  $post['name'],
                'dire'  =>  $post['dire'],
                'logo'  =>  $path,
                'addtime'   => time(),
            ];
            Lotmp::insert($aa);
            return redirect('/tmp');
        }
    }

    //轮播图软删除
    public function soft(Request $request)
    {
        $post = $request->input();
        if($post['dire'] == 0){
            //软删除顶部轮播图
            Thump::where(['tid'=>$post['tid']])->update(['show'=>1]);
            $res = [
                'error' =>  1001,
                'msg'   =>  '删除成功'
            ];
            return json_encode($res);
        }else{
            //软删除底部轮播图
            Lotmp::where(['lid'=>$post['lid']])->update(['show'=>1]);
            $res = [
                'error' =>  1001,
                'msg'   =>  '删除成功'
            ];
            return json_encode($res);
        }
    }

    //文件上传
    public function upload(Request $request,$name)
    {
        if ($request->file($name)->isValid()) {
            $photo = $request->file($name);

            // $store_result = $photo->store('img');
            $extension=$request->$name->extension();
            $store_result = $photo->storeAs(date('Ymd'),date('YmdHis').rand(100,999).'.'.$extension);

            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

}
