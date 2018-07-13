@extends('default')

@section('contents')
    <h1>修改文章</h1>
    @include('_errors')
    <form method="post" action="{{ route('articles.update',[$article]) }}">
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" class="form-control"
                   value="@if(old('title')){{ old('title') }}@else{{ $article->title }}@endif" />
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea name="content" class="form-control" rows="3">{{ $article->content }}</textarea>
        </div>
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <button class="btn btn-primary btn-block">提交</button>
    </form>
@stop