@extends('first.two')
@section('title','注册')

@section('content')
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">F1</h1>

            </div>
            <h3>欢迎注册 F</h3>
            <p>创建一个大飞集团新账户</p>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="请输入用户名" required="" id="name">
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" placeholder="请输入手机号" required="" id="tel">
                    <button class="btn btn-default" type="submit">获取验证码</button>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="code" placeholder="输入验证码">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="请输入密码" required="" id="pass">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="请再次输入密码" required="" id="pwd">
                </div>
                <div class="form-group text-left">
                    <div class="checkbox i-checks">
                        <label class="no-padding">
                            <input type="checkbox"><i></i> 我同意注册协议</label>
                    </div>
                </div>

                <p class="text-muted text-center"><small>已经有账户了？</small><a href="/">点此登录</a>
                </p>

            <button type="submit" class="btn btn-primary block full-width m-b">注 册</button>
        </div>
    </div>

    <script>
        $(function () {
            $(".btn-primary").click(function () {
                var name = $("#name").val();
                var pass = $("#pass").val();
                var pwd = $("#pwd").val();
                var tel = $("#tel").val();
                var code = $("#code").val();

                $.post(
                        '/reg',
                        {name:name,pass:pass,pwd:pwd,tel:tel,code:code},
                        function(res){
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
        })
    </script>

@endsection
