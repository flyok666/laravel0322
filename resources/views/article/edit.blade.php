@extends('default')

@section('contents')
    <h1>修改文章</h1>
    @include('_errors')
    <form method="post" action="{{ route('articles.update',[$article]) }}" enctype="multipart/form-data">
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" class="form-control"
                   value="@if(old('title')){{ old('title') }}@else{{ $article->title }}@endif" />
        </div>
        <div class="form-group">
            <label>作者</label>
            <select class="form-control">
                @foreach($students as $student)
                    <option value="{{ $student->id }}" @if($article->author_id==$student->id)selected="selected"@endif>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>LOGO</label>
            <input type="file" name="logo">
            <img src="{{ $article->logo() }}">
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
