@extends('first.first')
@section('title','添加轮播图')

@section('content')
    <h3>添加轮播图</h3><br/>
    <form action="/tmp" method="post" enctype="multipart/form-data">
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">轮播图方向</label>
            <select class="form-control" name="dire">
                <option value="0">顶部轮播图</option>
                <option value="1">底部轮播图</option>
            </select>
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">轮播图名称</label>
            <input type="text" class="form-control" name="name" placeholder="请填写轮播图名称">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">选择图片</label>
            <input type="file" name="logo">
            <p class="help-block" style="color: blueviolet">这是好看的样式！</p>
        </div>


        <button type="submit" class="btn btn-success">生成轮播图</button>
    </form>
@endsection