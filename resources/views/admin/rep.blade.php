@extends('first.first')
@section('title','专栏添加')

@section('content')
    <h3>专栏添加</h3><br/>
    <form>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">专栏名称</label>
            <input type="text" class="form-control" id="title" placeholder="请填写专栏名称">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择对应栏目</label>
            <select class="form-control" name="cid" id="cid">
                <option value="">请选择对应栏目等级</option>
                @foreach($data as $k => $v)
                    <option value="<?php echo $v['cid']?>"><?php echo $v['cname']?></option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">专栏内容</label>
            <div id="editor"></div>
        </div>

        <button type="button" class="btn btn-success">创建专栏</button>
    </form>

    <script type="text/javascript" src="Editor/release/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    </script>

    <script>
        $(function(){
            $(".btn-success").click(function () {
                var title = $("#title").val();
                var cid = $("#cid").val();
                var text = $(".w-e-text").children("p").text();

                $.post(
                        '/rep',
                        {title:title,cid:cid,text:text},
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