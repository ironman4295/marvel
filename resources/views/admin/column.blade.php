@extends('first.first')
@section('title','栏目展示')

@section('content')
    <h3>栏目展示</h3><br>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>所属导航栏</th>
            <th width="30%">栏目名称</th>
            <th>添加时间</th>
            <th width="20%">操作</th>
        </tr>

        <?php $num=1?>
        @foreach($data as $k => $v)
            <tr>
                <input type="hidden" class="cid" cid="{{$v->cid}}">
                <td>{{$num++}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->cname}}</td>
                <td>{{date("Y-m-d H:i",$v['addtime'])}}</td>
                <td>
                    <a href="/upcol/{{$v->cid}}"><button type="button" class="btn btn-info">编辑</button></a> |
                    <input type="submit" class="btn btn-danger" value="删除" >
                </td>
            </tr>
        @endforeach
    </table>

    <script>
        $(function(){
            $(".btn-danger").click(function(){
                var cid = $(this).parent('td').siblings('input').attr('cid');

                $.post(
                        'decol',
                        {cid:cid},
                        function(res){
                            if(res.error){
                                alert(res.msg);
                                location.href="/column"
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            });
        });
    </script>
@endsection