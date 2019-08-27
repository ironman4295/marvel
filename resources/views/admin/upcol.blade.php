@extends('first.first')
@section('title','修改栏目')

@section('content')
    <h3>修改栏目</h3><br>
    <form>
        <input type="hidden" id="cid" value="{{$data->cid}}">
        <div class="form-group">
            <label for="exampleInputEmail1">栏目名称</label>
            <input type="text" class="form-control" id="cname" value="{{$data->cname}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">所属导航栏</label>
            <select class="form-control" name="nid" id="nid">
                @foreach($info as $k => $v)
                    @if($data['nid'] == $v['nid'])
                        <option value="{{$v['nid']}}" selected>{{$v['name']}}</option>
                    @else
                        <option value="{{$v['nid']}}" >{{$v['name']}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">是否展示</label>
            <div>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="0" @if($data->show==0)checked @endif> 是
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="1" @if($data->show==1)checked @endif> 否
                </label>
            </div>
        </div>
        <button type="button" class="btn btn-success">修改栏目</button>
    </form>

    <script>
        $(function () {
            $(".btn-success").click(function () {
                var cid = $("#cid").val();
                var cname = $("#cname").val();
                var nid = $("#nid").find("option:selected").val();
                var show = $('input:radio:checked').val();

                $.post(
                        '/upcol',
                        {cname:cname,nid:nid,cid:cid,show:show},
                        function(res){
                            if(res.error){
                                alert(res.msg);
                                location.href='/column'
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            });
        });
    </script>

@endsection