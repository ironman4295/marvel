@extends('first.first')
@section('title','修改专栏')

@section('content')
    <h3>专栏修改</h3><br/>
    <form>
        <input type="hidden" id="rid" value="{{$data->rid}}">
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">专栏名称</label>
            <input type="text" class="form-control" id="title" value="{{$data->title}}">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择对应栏目</label>
            <select class="form-control" name="cid" id="cid">
                @foreach($info as $k => $v)
                    @if($data['cid'] == $v['cid'])
                        <option value="{{$v['cid']}}" selected>{{$v['cname']}}</option>
                    @else
                        <option value="{{$v['cid']}}" >{{$v['cname']}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">专栏内容</label>
            <div id="editor">
                <p>{{$data->cont}}</p>
            </div>
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

        <button type="button" class="btn btn-success">确认修改</button>
    </form>

    <script type="text/javascript" src="/Editor/release/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    </script>

    <script>
        $(function(){
            $(".btn-success").click(function () {
                var rid = $("#rid").val();
                var title = $("#title").val();
                var cid = $("#cid").val();
                var text = $(".w-e-text").children("p").text();
                var show = $('input:radio:checked').val();

                $.post(
                        '/port',
                        {title:title,cid:cid,text:text,show:show,rid:rid},
                        function(res){
                            if(res.error){
                                alert(res.msg);
                                location.href='/report'
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            })
        });
    </script>
@endsection