@extends('first.first')
@section('title','顶部轮播图')

@section('content')
    <h3>顶部轮播图</h3><br/>
    <table class="table table-bordered" align="center">

        <tr style="text-align: center">
            <td width="10%">ID</td>
            <td width="10%">轮播图名称</td>
            <td width="30%">轮播图</td>
            <td width="15%">添加时间</td>
            <td width="5%">编辑</td>
        </tr>

        <?php $num=1 ?>
        @foreach($data as $k=>$v)
            <tr style="text-align: center; vertical-align:middle">
                <td style="line-height: 100px">{{$num++}}</td>
                <td style="line-height: 100px">{{$v->name}}</td>
                <td style="line-height: 100px"><img src="/uploads/{{$v->logo}}" width="50%" class="click_img"></td>
                <td style="line-height: 100px">{{date("Y-m-d H:i",$v['addtime'])}}</td>
                <td style="line-height: 100px">
                    <button type="button" class="btn btn-warning">删除</button>
                </td>
                <input type="hidden" class="tid" value="{{$v->tid}}">
                <input type="hidden" class="dire" value="{{$v->dire}}">
            </tr>
        @endforeach
    </table>

    <div>
        {{$data->appends(2)->links()}}
    </div>

    <div class="bg_div" style="display:none;background: #ccc;width: 100%;height: 100%;position: absolute;top: 0;left: 0;opacity: 0.8;text-align: center;padding-top: 10%">
        <div class="close_div" style="padding-left: 50%">
            <b>关闭</b>
        </div>
        <img src="" width="600px" height="400px" alt="width:100px">
    </div>
    <script>
        $(function(){
            $(".btn-warning").click(function(){
                var tid = $(".tid").val();
                var dire = $(".dire").val();

                $.post(
                        'soft',
                        {tid:tid,dire:dire},
                        function(res){
                            if(res.error){
                                alert(res.msg);
                                location.href="/thump"
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            });
        });
    </script>
    <script>
        $(".click_img").on('click',function(){
            $('.bg_div').show();

            var src=$(this).attr("src");
            $(".bg_div img").attr('src',src);
        });

        $(".close_div").on('click',function(){
            $(".bg_div").hide();
        });
    </script>
@endsection