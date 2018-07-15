@extends('default')

@section('contents')
    <h1>添加文章</h1>
    @include('_errors')
    <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
        </div>
        <div class="form-group">
            <label>作者</label>
            <select name="author_id" class="form-control">
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>LOGO</label>
            <input type="file" name="logo">
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea name="content" class="form-control" rows="3">{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label>验证码</label>
            <input id="captcha" class="form-control" name="captcha" >
            <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary btn-block">提交</button>
    </form>
@stop
