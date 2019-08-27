@extends('first.first')
@section('title','展示底部导航栏')

@section('content')

    <h3>底部导航栏</h3><br/>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>导航栏名称</th>
            <th>权重等级</th>
            <th>是否展示</th>
            <th width="20%">操作</th>
        </tr>

        <?php $num=1; ?>
        @foreach($info as $k => $v)
            <tr>
                <td>{{$num++}}</td>
                <td>{{$v->name}}</td>
                <td>
                    @if($v->weight==1)1级权重
                    @elseif($v->weight==2)2级权重
                    @elseif($v->weight==3)3级权重
                    @elseif($v->weight==4)4级权重
                    @else   5级权重
                    @endif
                </td>
                <td>
                    @if($v->is_show==0)展示
                    @else隐藏
                    @endif
                </td>
                <td>
                    <a href="/edit/{{$v->did}}"><button type="button" class="btn btn-info">编辑</button></a> |
                    <a href="/delete/{{$v->did}}"><button type="button" class="btn btn-danger">删除</button></a>
                </td>
            </tr>
        @endforeach
    </table>
    <div>
    {{$info->appends(6)->links()}}
    </div>


@endsection