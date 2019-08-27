<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Column;
use App\Model\Lotmp;
use App\Model\Lownav;
use App\Model\Navbar;
use App\Model\Report;
use App\Model\Thump;
use App\Model\Url;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    //前台首页
    public function first()
    {
        $nav = Navbar::leftjoin('url','url.nid','=','navbar.nid')->where('is_show',0)->orderBy('weight','desc')->get();
        $thu = Thump::where('show',0)->orderBy('tid','desc')->limit(4)->get();
        $low = Lownav::where('is_show',0)->orderBy('weight','desc')->get();
        $tmp = Lotmp::where('show',0)->orderBy('lid','desc')->get();
        $col = Column::where('show',0)->orderBy('cid','desc')->limit(2)->get();

        $arr =[];
        foreach ($col as $k=>$v){
            $rep = Report::where('cid',$v['cid'])->orderBy('rid','desc')->limit(6)->get();
            $v['feadata']=$rep;
            $arr[] =$v;
        }
        $this->redisIn('nav',$nav);
        $this->redisIn('thu',$thu);
        $this->redisIn('low',$low);
        $this->redisIn('tmp',$tmp);
        $this->redisIn('rep',$arr);
//        $this->redisIn('col',$col);
        return view('index.index',compact('nav','thu','low','tmp','arr'));
    }

    //关于我们
    public function about()
    {
        $nav = Navbar::leftjoin('url','url.nid','=','navbar.nid')->where('is_show',0)->orderBy('weight','desc')->get();
        $this->redisIn('nav',$nav);
        return view('index.about',compact('nav'));
    }

    //新闻展示
    public function news()
    {
        $rep = Report::where('status',0)->orderBy('rid','desc')->get();
        $nav = Navbar::leftjoin('url','url.nid','=','navbar.nid')->where('is_show',0)->orderBy('weight','desc')->get();
        $this->redisIn('nav',$nav);
        $this->redisIn('rep',$rep);
        return view('index.news',compact('nav','rep'));
    }

    //缓存redis
    public function redisIn($key,$arr)
    {
        $obj = json_encode($arr);
        Redis::set($key,$obj);
        $aa=Redis::get($key);
        return json_decode($aa,true);
    }
}
