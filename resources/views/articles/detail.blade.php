@extends("layouts.app")

@section("content")
    <div class="container">
        @if (session('error'))
            <div class="alert alert-warning">{{session('error')}}</div>
        @endif
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $article->title }}
                </h5>
                <div class="card-subtitle mb-2 small text-muted">
                    By <b class="text-success">{{$article->user->name}}</b>,
                    {{ $article->created_at->diffForHumans()}},
                    Category: <b>{{ $article->category->name}}</b>
                </div>
                <p class="card-text">
                    {{ $article->body }}
                </p>
                <a href="{{url("/articles/update/$article->id")}}" class="btn btn-success">Update</a>
                <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-danger">Delete</a>
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments ({{count($article->comments) }})</b>
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{ url("/comments/delete/$comment->id")}}" class="float-end btn-close"></a>
                    {{ $comment->content }}
                    <div class="small mb-2">
                        By <b class="text-success">{{$comment->user->name}}</b>,
                        {{$comment->created_at->diffForHUmans()}}
                    </div>
                </li>
            @endforeach
        </ul>

        @auth
        <form action="{{url('/comments/add')}}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>
        @endauth
    </div>
@endsection
