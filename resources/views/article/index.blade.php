@extends('default')

@section('contents')
    <table class="table table-bordered table-responsive">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>LOGO</th>
            <th>作者</th>
            <th>操作</th>
        </tr>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td><img src="{{ $article->logo() }}" /></td>
                <td>{{ $article->author_name() }}</td>
                <td>
                    <a href="{{ url("/articles",[$article->id]) }}">查看</a>
                    <a href="{{ route('articles.edit',[$article]) }}">编辑</a>
                    <form method="post" action="{{ route('articles.destroy',[$article]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger btn-xs">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $articles/*->appends(['keyword'=>'水浒'])*/->links() }}
@endsection

