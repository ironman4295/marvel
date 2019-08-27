@extends('first.first')
@section('title','添加栏目')

@section('content')
    <h3>添加栏目</h3><br>
    <form>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">栏目名称</label>
            <input type="text" class="form-control" id="cname" placeholder="请填写栏目名称">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">所属导航栏</label>
            <select class="form-control" name="nid" id="nid">
                <option value="0">请选择导航栏</option>
                @foreach($data as $k => $v)
                    <option value="{{$v->nid}}">{{$v->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-success">添加栏目</button>
    </form>

    <script>
        $(function () {
           $(".btn-success").click(function () {
               var cname = $("#cname").val();
               var nid = $("#nid").val();

               $.post(
                       '/col',
                       {cname:cname,nid:nid},
                       function(res){
                           if(res.error){
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