@extends('first.two')
@section('title','登陆')

@section('content')
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">R</h1>

            </div>
            <h3>请更改密码</h3>

            <form>
                <div class="form-group">
                    <input type="tel" class="form-control" placeholder="当时存入手机号" required="" id="tel">
                    <button class="btn btn-default" type="submit">获取验证码</button>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="code" placeholder="输入验证码">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="设置新密码" required="" id="pass">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="确认密码" required="" id="pwd">
                </div>

                <p class="text-muted text-center">  <a href="/">返回登陆页面</a>
                </p>
            </form>
            <button type="submit" class="btn btn-primary block full-width m-b">修 改</button>
        </div>
    </div>

    <script>
        $(function(){
            $(".btn-primary").click(function () {
                var tel = $("#tel").val();
                var code = $("#code").val();
                var pass = $("#pass").val();
                var pwd = $("#pwd").val();

                $.post(
                        '/forget',
                        {tel:tel,code:code,pass:pass,pwd:pwd},
                        function (res) {
                            if(res.error==1001){
                                alert(res.msg);
                                location.href='/'
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            });

            $(".btn-default").click(function(){
                var tel = $("#tel").val();

                $.post(
                        'send',
                        {tel:tel},
                        function (res) {
                            if(res.error==1001){
                                alert(res.msg);
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            });
        });
    </script>

@endsection