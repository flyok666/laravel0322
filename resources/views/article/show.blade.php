@extends('default')

@section('contents')
    <h1>{{ $article->title }}</h1>
    <div>{{ $article->content }}</div>
@stop
