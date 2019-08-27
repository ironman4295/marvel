@extends('first.first')
@section('title','添加导航栏')

@section('content')
    <h3>新建导航栏</h3><br/>
    <form>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">导航栏方向</label>
            <select class="form-control" name="nav" id="nav">
                <option value="0">顶部导航栏</option>
                <option value="1">底部导航栏</option>
            </select>
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">导航栏名称</label>
            <input type="text" class="form-control" id="name" placeholder="请填写导航栏名称">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">权重等级  (默认为1)</label>
            <select class="form-control" name="weight" id="weight">
                <option value="1">请选择权重等级</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">是否展示</label>
            <div>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="0" checked> 是
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="1"> 否
                </label>
            </div>
        </div>

        <button type="button" class="btn btn-success">创建导航栏</button>
    </form>

    <script>
        $(function(){
            $(".btn-success").click(function(){
                var nav = $("#nav").val();
                var name = $("#name").val();
                var weight = $("#weight").val();
                var show = $('input:radio:checked').val();

                $.post(
                        '/nav',
                        {nav:nav,name:name,weight:weight,show:show},
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