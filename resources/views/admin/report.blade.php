@extends('first.first')
@section('title','专栏展示')

@section('content')
    <h3>专栏展示</h3><br/>
    <table class="table">
        <tr style="text-align: center">
            <td><b>ID</b></td>
            <td><b>所属栏目</b></td>
            <td><b>专栏标题</b></td>
            <td><b>专栏内容</b></td>
            <td><b>编辑</b></td>
        </tr>

        <?php $num=1;?>
        @foreach($data as $k => $v)
            <tr  style="text-align: center">
                <input type="hidden" class="rid" rid="{{$v->rid}}">
                <td>{{$num++}}</td>
                <td>{{$v->cname}}</td>
                <td>{{$v->title}}</td>
                <td>{{$v->cont}}</td>
                <td>
                    <a href="/port/{{$v->rid}}"><button type="button" class="btn btn-info">编辑</button></a> |
                    <input type="submit" class="btn btn-danger" value="删除" >
                </td>
            </tr>
        @endforeach
    </table>

    <script>
        $(function(){
            $(".btn-danger").click(function(){
                var rid = $(this).parent('td').siblings('input').attr('rid');

                $.post(
                        'por',
                        {rid:rid},
                        function(res){
                            if(res.error){
                                alert(res.msg);
                                location.href="/report"
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            });
        });
    </script>
@endsection