<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Column;
use App\Model\Navbar;

class ColumnController extends Controller
{
    //展示栏目
    public function first()
    {
        $data = Column::leftjoin('navbar','navbar.nid','=','column.nid')->where('show',0)->get();
        return view('admin.column',compact('data'));
    }

    //展示添加栏目
    public function colAdd()
    {
        $data = Navbar::where(['is_show'=>0])->get();

//        dd($data);
        return view('admin.col',compact('data'));
    }

    //执行添加栏目
    public function addCol(Request $request)
    {
        $post = $request->input();
        if(empty($post['cname']) || $post['nid'] == 0){
            $res = [
                'error' =>  1002,
                'msg'   =>  '请完善栏目添加'
            ];
            return json_encode($res);
        }

        $aa = [
            'cname'  =>  $post['cname'],
            'nid'   =>  $post['nid'],
            'addtime'   =>  time()
        ];
        $info = Column::insert($aa);
        if($info){
            $res = [
                'error' =>  1001,
                'msg'   =>  '添加成功'
            ];
        }else{
            $res = [
                'error' =>  1003,
                'msg'   =>  '发生未知错误'
            ];
        }
        return json_encode($res);
    }

    //修改栏目页
    public function upCol($id)
    {
        $data = Column::where('cid',$id)->first();
        $info = Navbar::where(['is_show'=>0])->get();
        return view('admin.upcol',compact('info','data'));
    }

    //执行修改栏目
    public function colUp(Request $request)
    {
        $post = $request->input();
        if(empty($post['cname'])){
            $res = [
                'error' =>  1002,
                'msg'   =>  '请完善信息再提交'
            ];
            return json_encode($res);
        }

        $arr = [
            'cname' =>  $post['cname'],
            'nid'   =>  $post['nid'],
            'show'  =>  $post['show'],
            'addtime'   =>  time()
        ];
        $up = Column::where(['cid'=>$post['cid']])->update($arr);
        if($up){
            $res = [
                'error' =>  1001,
                'msg'   =>  '修改完成'
            ];
        }else{
            $res = [
                'error' =>  1003,
                'msg'   =>  '发现未知错误'
            ];
        }
        return json_encode($res);
    }

    //软删除栏目
    public function colDe(Request $request)
    {
        $cid = $request->input('cid');
        //软删除栏目
        Column::where(['cid'=>$cid])->update(['show'=>1]);
        $res = [
            'error' =>  1001,
            'msg'   =>  '删除成功'
        ];
        return json_encode($res);
    }
}
