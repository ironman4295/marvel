<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Report;
use App\Model\Column;

class ReportController extends Controller
{
    //展示专栏
    public function first()
    {
        $data = Report::leftjoin('column','column.cid','=','report.cid')->where('status',0)->get();
        return view('admin.report',compact('data'));
    }

    //专栏添加
    public function repAdd()
    {
        $data = Column::where(['show'=>0])->get();
        return view('admin.rep',compact('data'));
    }

    //执行添加
    public function addRep(Request $request)
    {
        $post = $request->input();
        if(empty($post['title']) || empty($post['cid']) || empty($post['text'])){
            $res = [
                'error' =>  1002,
                'msg'   =>  '请完善专栏信息'
            ];
            return json_encode($res);
        }

        $add = [
            'title' =>  $post['title'],
            'cid'   =>  $post['cid'],
            'cont' =>  $post['text'],
            'addtime'   =>  time()
        ];

        $in = Report::insert($add);
        if($in){
            $res = [
                'error' =>  1001,
                'msg'   =>  '添加专栏成功'
            ];
        }else{
            $res = [
                'error' =>  1003,
                'msg'   =>  '发生未知错误'
            ];
        }
        return json_encode($res);
    }

    //修改专栏
    public function repUp($id)
    {
        $data = Report::where(['rid'=>$id])->first();
        $info = Column::where(['show'=>0])->get();
        return view('admin.uprep',compact('data','info'));
    }

    //执行修改专栏
    public function upRep(Request $request)
    {
        $post = $request->input();
        $like = Report::where(['rid'=>$post['rid']])->first();
        if(empty($post['title']) || empty($post['text'])){
            $res = [
                'error' =>  1002,
                'msg'   =>  '请完善专栏信息'
            ];
            return json_encode($res);
        }

        if($post['title'] == $like['title'] && $post['text'] == $like['cont'] && $post['cid'] == $like['cid'] && $post['show'] == $like['status']){
            $res = [
                'error' =>  1004,
                'msg'   =>  '请更改内容'
            ];
            return json_encode($res);
        }

        $arr = [
            'cid'   =>  $post['cid'],
            'title' =>  $post['title'],
            'cont'  =>  $post['text'],
            'status'    =>  $post['show'],
            'addtime'   =>  time()
        ];

        $aa = Report::where(['rid'=>$post['rid']])->update($arr);
        if($aa){
            $res = [
                'error' =>  1001,
                'msg'   =>  '修改成功'
            ];
        }else{
            $res = [
                'error' =>  1003,
                'msg'   =>  '发生未知错误'
            ];
        }
        return json_encode($res);

    }

    //软删除专栏
    public function repDe(Request $request)
    {
        $rid = $request->input('rid');
        $del = Report::where(['rid'=>$rid])->update(['status'=>1]);
        $res = [
            'error' =>  1001,
            'msg'   =>  '删除成功'
        ];
        return json_encode($res);
    }
}
