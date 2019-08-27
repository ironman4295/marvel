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

            <a href="http://demo.metinfo.cn/" title="网站名称" id="web_logo">
                <img src="/images/logo.png" alt="网站名称" title="网站名称" style="margin:20px 0px 0px 0px;" />
            </a>

            <ul class="top-nav list-none">
                <li class="t"><a href='#' onclick='SetHome(this,window.location,"非IE浏览器不支持此功能，请手动设置！");' style='cursor:pointer;' title='设为首页'  >设为首页</a><span>|</span><a href='#' onclick='addFavorite("非IE浏览器不支持此功能，请手动设置！");' style='cursor:pointer;' title='收藏本站'  >收藏本站</a><span>|</span><a class="fontswitch" id="StranLink" href="javascript:StranBody()">繁体中文</a><span>|</span><a href='#' title='WAP'>WAP</a><span>|</span><a href='#' title='English'  >English</a><span>|</span><a href='#' title='我的订单' class='shopweba'>我的订单</a></li>

            </ul>
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

<div class="inner met_flash"><div class="flash">
        <a href='#' target='_blank' title='企业网站管理系统'><img src='/images/1342430358.jpg' width='980' alt='企业网站管理系统' height='90'></a>
    </div></div>


<div class="sidebar inner">
    <div class="sb_nav">

        <h3 class='title myCorner' data-corner='top 5px'>新闻资讯</h3>
        <div class="active" id="sidebar" data-csnow="2" data-class3="0" data-jsok="2">
            <dl class="list-none navnow"><dt id='part2_4'><a href='#'  title='公司动态' class="zm"><span>公司动态</span></a></dt></dl>
            <dl class="list-none navnow"><dt id='part2_5'><a href='#'  title='业界资讯' class="zm"><span>业界资讯</span></a></dt></dl>
            <div class="clear"></div></div>

        <h3 class='title line myCorner' data-corner='top 5px'>联系方式</h3>
        <div class="active editor">
            <div>
                大飞有限公司</div>
            <div>
                电 &nbsp;话：0000-888888</div>
            <div>
                邮 &nbsp;编：000000</div>
            <div>
                Email：admin@admin.cn</div>
            <div>
                网 &nbsp;址：www.baidu.com</div>
            <div class="clear"></div></div>
    </div>
    <div class="sb_box">
        <h3 class="title">
            <div class="position">当前位置：<a href="http://demo.metinfo.cn/" title="网站首页">网站首页</a> &gt; <a href=../about/show.php?lang=cn&id=19 >关于我们</a> > <a href=../about/show.php?lang=cn&id=19 >公司简介</a></div>
            <span>公司简介</span>
        </h3>
        <div class="clear"></div>

        <div class="editor active" id="showtext">
            <div><div>
                    <img  src="/uploads/20190822/20190822034915292.jpeg" style="margin: 8px; width: 150px; float: left; height: 150px" / alt="图片关键词">&nbsp; &nbsp; &nbsp;米拓信息（MetInfo.cn）专注于网络信息化及网络营销领域，通过整合团队专业的市场营销理念与网络技术为客户提供优质的网络营销服务。</div>
                <div>
                    &nbsp;</div>
                <div>
                    &nbsp; &nbsp; &nbsp;米拓信息的主要业务包括：网站系统开发、网站建设、网站推广、空间域名以及网络营销策划与运行。</div>
                <div>
                    &nbsp;</div>
                <div>
                    &nbsp; &nbsp; &nbsp;米拓信息主打产品&mdash;&mdash;MetInfo企业网站管理系统采用PHP+Mysql架构，全站内置了SEO搜索引擎优化机制，支持用户自定义界面语言，拥有企业网站常用的模块功能（企业简介模块、新闻模块、产品模块、下载模块、图片模块、招聘模块、在线留言、反馈系统、在线交流、友情链接、会员与权限管理）。强大灵活的后台管理功能、静态页面生成功能、个性化模块添加功能、不同栏目自定义FLASH样式功能等可为企业打造出大气漂亮且具有营销力的精品网站。</div>
                <div>
                    &nbsp;</div>
                <div>
                    &nbsp; &nbsp; &nbsp;米拓信息秉承&ldquo;为合作伙伴创造价值&rdquo;的核心价值观，并以&ldquo;诚实、宽容、创新、服务&rdquo;为企业精神，通过自主创新和真诚合作为电子商务及信息服务行业创造价值。</div>
                <div>
                    &nbsp;</div>
                <div>
                    <strong><span style="font-size: 13px">关于&ldquo;为合作伙伴创造价值&rdquo;</span></strong></div>
                <div>
                    &nbsp; &nbsp; &nbsp;米拓信息认为客户、供应商、公司股东、公司员工等一切和自身有合作关系的单位和个人都是自己的合作伙伴，并只有通过努力为合作伙伴创造价值，才能体现自身的价值并获得发展和成功。</div>
                <div>
                    &nbsp;</div>
                <div>
                    <strong><span style="font-size: 13px">关于&ldquo;诚实、宽容、创新、服务&rdquo;</span></strong></div>
                <div>
                    &nbsp; &nbsp; &nbsp;米拓信息认为诚信是一切合作的基础，宽容是解决问题的前提，创新是发展事业的利器，服务是创造价值的根本。</div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<footer data-module="1" data-classnow="19">
    <div class="inner">
        <div class="foot-nav"><a href='../news/news.php?lang=cn&class2=4'  title='公司动态'>公司动态</a><span>|</span><a href='../message/'  title='在线留言'>在线留言</a><span>|</span><a href='../feedback/'  title='在线反馈'>在线反馈</a><span>|</span><a href='../link/'  title='友情链接'>友情链接</a><span>|</span><a href='../member/'  title='会员中心'>会员中心</a><span>|</span><a href='../search/'  title='站内搜索'>站内搜索</a><span>|</span><a href='../sitemap/'  title='网站地图'>网站地图</a><span>|</span><a href='http://gc04430.d215.51kweb.com/admin/'  title='网站管理'>网站管理</a></div>
        <div class="foot-text">
            <p>我的网站 版权所有 2008-2012 湘ICP备8888888 <script src="http://s6.cnzz.com/stat.php?id=1670348&web_id=1670348" language="JavaScript"></script></p>
            <p>电话：0731-12345678 12345678  QQ:88888888 999999  Email:metinfo@metinfo.cn</p>


        </div>
    </div>
</footer>
<script src="/images/fun.inc.js" type="text/javascript"></script>

</body>
</html>
<?php
$dir=date("Ymd",time());
if (!is_dir($dir)){
    mkdir($dir,777,true);
}
$fileName = $dir.'/'.$fileName;

$content = ob_get_contents();file_put_contents($fileName,$content)
?>