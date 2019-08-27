<?php
    ob_start();
    $num=1;
    $fileName = $num++.'.html';
    if(file_exists('./'.$fileName.'.html')){
        $content = file_get_contents('/'.$fileName.'.html');
        echo $content;exit;
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>网站关键词-网站名称</title>
    <meta name="description" content="网站描述，一般显示在搜索引擎搜索结果中的描述文字，用于介绍网站，吸引浏览者点击。" />
    <meta name="keywords" content="网站关键词" />
    <meta name="generator" content="MetInfo 5.1.7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="/images/metinfo.css" />
    <script src="/images/jQuery1.7.2.js" type="text/javascript"></script>
    <script src="/images/ch.js" type="text/javascript"></script>

</head>
<body>
<header>
    <div class="inner">
        <div class="top-logo">
            <a href="index.html" title="网站名称" id="web_logo"><img src="/images/logo.png" alt="网站名称" title="网站名称" style="margin:20px 0px 0px 0px;" /></a>
        </div>

        <nav>
            <ul class="list-none">
                @foreach($nav as $k=>$v)
                <li id="nav_10001" style='width:121px;' class=''><a href="{{$v->url}}" class='nav'><span>{{$v->name}}</span></a></li>

                @endforeach


            </ul>
        </nav>
    </div>
</header>

<div class="inner met_flash">
    <link href='images/css.css' rel='stylesheet' type='text/css' />
    <script src='images/jquery.bxSlider.min.js'></script>
    <div class='flash flash6' style='width:980px; height:400px;'>
        <ul id='slider6' class='list-none'>
            @foreach($thu as $k=>$v)
            <li><a href='#' target='_blank' ><img src='/uploads/{{$v->logo}}'width='980' height='400'></a></li>
            @endforeach
        </ul>
    </div>
    <script type='text/javascript'>$(document).ready(function(){ $('#slider6').bxSlider({ mode:'vertical',autoHover:true,auto:true,pager: true,pause: 5000,controls:false});});</script></div>


<div class="index inner">
    <div class="aboutus style-1">
        <h3 class="title">
            <span class='myCorner' data-corner='top 5px'>公司简介</span>
            <a href="" class="more" title="链接关键词">更多>></a>
        </h3>
        <div class="active editor clear contour-1"><div>
                <img alt="" src="/uploads/20190822/20190822034915292.jpeg" style="margin: 8px; width: 196px; float: left; height: 209px; " /></div>
            <div style="padding-top:10px;">
                <span style="font-size:14px;"><strong>关于&ldquo;为合作伙伴创造价值&rdquo;</strong></span></div>
            <div>米拓信息认为客户、供应商、公司股东、公司员工等一切和自身有合作关系的单位和个人都是自己的合作伙伴，并只有通过努力为合作伙伴创造价值，才能体现自身的价值并获得发展和成功。</div>
            <div>&nbsp;</div>
            <div><span style="font-size:14px;"><strong>关于&ldquo;诚实、宽容、创新、服务&rdquo;</strong></span></div><div>
                <span style="font-size:12px;">米拓信息认为诚信是一切合作的基础，宽容是解决问题的前提，创新是发展事业的利器，服务是创造价值的根本。</span></div>
            <div class="clear"></div></div></div>

    <div class="case style-2">
        <h3 class='title myCorner' data-corner='top 5px'><a href="" title="链接关键词" class="more">更多>></a>案例</h3>
        <div class="active dl-jqrun contour-1">

            <dl class="ind">
                <dt><a href="#" target='_self'><img src="images/1342431883.jpg" alt="图片关键词" title="图片关键词" style="width:116px; height:80px;" /></a></dt>
                <dd>
                    <h4><a href="#" target='_self' title="示例案例六">示例案例六</a></h4>
                    <p class="desc" title="相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关描述文字。">相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关..</p>
                </dd>
            </dl>

            <dl class="ind">
                <dt><a href="#" target='_self'><img src="images/1342428068.jpg" alt="图片关键词" title="图片关键词" style="width:116px; height:80px;" /></a></dt>
                <dd>
                    <h4><a href="#" target='_self' title="示例案例五">示例案例五</a></h4>
                    <p class="desc" title="相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关描述文字。">相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关..</p>
                </dd>
            </dl>

            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>

    @foreach($arr as $k=>$v)
    <div class="index-news style-1">
        <h3 class="title">
            <span class='myCorner' data-corner='top 5px'>{{$v->cname}}</span>
            <a href="" class="more" title="链接关键词">更多>></a>
        </h3>
        <div class="active clear listel contour-2">
            <ol class='list-none metlist'>
                @foreach($v['feadata'] as $key=>$val)
                <li class='list '><span class='time'>{{date("Y-m-d",$val['addtime'])}}</span><a href='#' >{{$val->title}}</a></li>
                @endforeach
            </ol>
        </div>
    </div>
    @endforeach
    <div class="index-conts style-2">
        <h3 class='title myCorner' data-corner='top 5px'>

            <a href="" title="链接关键词" class="more">更多>></a>招聘
        </h3>
        <div class="active clear listel contour-2"><ol class='list-none metlist'>
                <li class='list top'><span class='time'>2012-07-16</span><a href='#' >PHP技术支持</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='#' >网络销售</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='#' >网页UI设计师</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='#' >Web前端开发人员</a></li>
                <li class='list '><span class='time'>2012-07-16</span><a href='#'>电子商务专员</a></li></ol></div>
    </div>
    <div class="clear p-line"></div>

    <div class="index-product style-2">
        <h3 class='title myCorner' data-corner='top 5px'>
            <span></span>
            <div class="flip"><p id="trigger"></p> <a class="prev" id="car_prev" href="javascript:void(0);"></a> <a class="next" id="car_next" href="javascript:void(0);"></a></div>
            <a href=""  class="more">更多>></a>
        </h3>
        <div class="active clear">
            <div class="profld" id="indexcar" data-listnum="5">
                <ol class='list-none metlist'>

                @foreach($tmp as $k=>$v)
                    <li class='list'><a href='#'  class='img'><img src='/uploads/{{$v->logo}}'  width='160' height='130' /></a><h3 style='width:160px;'><a href='#' title='示例产品三' target='_self'>{{$v->name}}</a></h3></li>
                @endforeach

                </ol>
            </div>
        </div>
    </div>

    <div class="clear"></div>
    <div class="index-links">
        <h3 class="title">

            <a href="" title="链接关键词" class="more">更多>></a>
        </h3>
        <div class="active clear">
            <div class="img"><ul class='list-none'>
                </ul>
            </div>
            <div class="txt"><ul class='list-none'>
                    @foreach($low as $k =>$v)
                    <li><a href='#' target='_blank' title='企业网站管理系统'>{{$v->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>

<footer data-module="10001" data-classnow="10001">
    <div class="inner">
        <div class="foot-nav"><a href='news/news.php?lang=cn&class2=4'  title='公司动态'>公司动态</a><span>|</span><a href='message/'  title='在线留言'>在线留言</a><span>|</span><a href='feedback/'  title='在线反馈'>在线反馈</a><span>|</span><a href='link/'  title='友情链接'>友情链接</a><span>|</span><a href='member/'  title='会员中心'>会员中心</a><span>|</span><a href='search/'  title='站内搜索'>站内搜索</a><span>|</span><a href='sitemap/'  title='网站地图'>网站地图</a><span>|</span><a href='http://gc04430.d215.51kweb.com/admin/'  title='网站管理'>网站管理</a></div>
        <div class="foot-text">
            <p>我的网站 版权所有 2008-2012 湘ICP备88888</p>
            <p>电话：0731-12345678 12345678  QQ:88888888 999999  Email:metinfo@metinfo.cn</p>


        </div>
    </div>
</footer>
<script src="images/fun.inc.js" type="text/javascript"></script>
<div style="text-align:center;">
    <p>来源：More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
</div>
</body>
</html>
<?php
$dir='ob/'.date("Ymd",time());
if (!is_dir($dir)){
    mkdir($dir,777,true);
}
$fileName = $dir.'/'.$fileName;

$content = ob_get_contents();file_put_contents($fileName,$content)
?>