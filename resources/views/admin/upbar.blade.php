@extends('first.first')
@section('title','修改导航栏')

@section('content')
    <h3>修改顶部导航栏</h3><br/>
    <form>
        <input type="hidden" id="nid" value="{{$data->nid}}">
        <div class="form-group">
            <label for="exampleInputEmail1">导航栏名称</label>
            <input type="text" class="form-control" id="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">权重等级</label>
            <select class="form-control" name="weight" id="weight">
                <option value="<?php echo $data['weight']?>"><?php echo $data['weight']?></option>
                <option value="1">1</option>
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
                    <input type="radio" name="inlineRadioOptions" id="show" value="0" @if($data->is_show==0)checked @endif> 是
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="1" @if($data->is_show==1)checked @endif> 否
                </label>
            </div>
        </div>
        <button type="button" class="btn btn-success">修改导航栏</button>
    </form>

    <script>
        $(function(){
            $(".btn-success").click(function(){
                var name = $("#name").val();
                var weight = $("#weight").val();
                var nid = $("#nid").val();
                var show = $('input:radio:checked').val();

                $.post(
                        '/upd',
                        {name:name,weight:weight,show:show,nid:nid},
                        function (res) {
                            if(res.error==1001){
                                alert(res.msg);
                                location.href='/bar'
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            });
        });
    </script>
@endsection