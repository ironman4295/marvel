@extends('first.two')
@section('title','登陆')

@section('content')

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">HI</h1>

        </div>
        <h3>欢迎进入大飞集团</h3>

        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="用户名" required="" id="name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="密码" required="" id="pass">
            </div>

            <p class="text-muted text-center"> <a href="/forget"><small>忘记密码了？</small></a> | <a href="/reg">注册一个新账号</a>
            </p>
        </form>
        <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
    </div>
</div>

<script>
    $(function () {
        $('.btn').click(function(){
            var name = $("#name").val();
            var pass = $("#pass").val();

            $.post(
                    '/log',
                    {name:name,pass:pass},
                    function (res) {
                        if(res.error==1001){
                            alert(res.msg);
                            location.href='/index'
                        }else{
                            alert(res.msg);
                        }
                    },'json'
            );
        });
    })
</script>

@endsection