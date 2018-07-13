@extends('default')

@section('contents')
<table class="table">
    <tr>
        <td>ID</td>
        <td>姓名</td>
        <td>年龄</td>
        <td>操作</td>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->age }}</td>
        <td>编辑 删除</td>
    </tr>
    @endforeach
</table>
@endsection
