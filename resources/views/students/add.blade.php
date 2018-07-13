@extends('default')

@section('contents')
<form method="post" action="{{ route('saveStudent') }}">
    姓名<input type="text" name="name"><br>
    年龄<input type="text" name="age"><br>
    {{ csrf_field() }}
    <input type="submit" value="提交">
</form>
@endsection
