@extends("layouts.app")

@section("content")
    <div class="container">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info')}}</div>
        @endif
        {{ $articles->links() }}

        @foreach ($articles as $article)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $article->title }}
                </h5>
                <div class="card-subtitle muted mb-2 small">
                    By <b class="text-success">{{$article->user->name}}</b>,
                    {{ $article->created_at->diffForHumans()}},
                    Category: <b>{{$article->category->name}}</b>
                </div>
                <p class="card-text">
                    {{ $article->body }}
                </p>
                <a href="{{ url("/articles/detail/$article->id")}}" class="card-link">View Detail &raquo;</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
