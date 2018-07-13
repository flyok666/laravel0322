@extends('default')

@section('contents')
    <h1>添加文章</h1>
    @include('_errors')
    <form method="post" action="{{ route('articles.store') }}">
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea name="content" class="form-control" rows="3">{{ old('content') }}</textarea>
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary btn-block">提交</button>
    </form>
@stop
