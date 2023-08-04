@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
    @endif

    <form method="post">
        @csrf
        <div class="mb-2">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{$article['title']}}">
        </div>

        <div class="mb-2">
            <label >Body</label>
            <textarea class="form-control" name="body">{{$article['body']}}</textarea>
        </div>

        <div class="mb-2">
            <label>Category</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                        @if ($category['id'] == $article['category_id'])
                            <option value="{{$category['id']}}" selected>
                                {{ $category['name']}}
                            </option>
                        @elseif ($category['id'] != $article['category_id'])
                            <option value="{{$category['id']}}">
                                {{ $category['name']}}
                            </option>
                        @endif

                @endforeach
            </select>
        </div>
        <input type="submit" value="Update Article" class="btn btn-primary">
    </form>
</div>
@endsection
