@extends('layouts.app')

@section('content')
    <div class="galery-article">
        <img src="/images/{{ $article->full_image }}" alt="{{ $article->name }}">
        <h1>{{ $article->name }}</h1>
        <h2>{{ $article->date }}</h2>
        <p>{{ $article->shortDesc }}</p>
        <p>{{ $article->fullText }}</p>

        <a href="{{ route('articles.index') }}">Назад к новостям</a>
    </div>
    <h2 class="h2-comment">✿ Комментарии</h2>

    @foreach ($article->comments as $comment)
        <div class="comment">
            <strong>{{ $comment->user->name }}</strong>
            <p>{{ $comment->text }}</p>
            <small>{{ $comment->created_at->format('d.m.Y H:i') }}</small>

            @can('delete', $comment)
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="delete-comment">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить комментарий</button>
                </form>
            @endcan
        </div>
    @endforeach

    @can('create', \App\Models\Comment::class)
        <form action="{{ route('comments.store', $article) }}" method="POST" class="write-comment">
            @csrf

            <label for="text">Оставить комментарий:</label>
            <textarea name="text" id="text" placeholder="Напишите что-то о статье..." required>{{ old('text') }}</textarea>

            @error('text')
                <p>{{ $message }}</p>
            @enderror

            <button type="submit">Отправить</button>
        </form>
    @endcan
@endsection