@extends('layouts.app')

@section('content')
    <h1>Модерация комментариев</h1>
    @if (session('status'))
        <p class="success-message">{{ session('status') }}</p>
    @endif
    @forelse ($comments as $comment)
        <div class="comment-mod">
            <h3>
                Статья:
                <a href="{{ route('articles.show', $comment->article) }}">
                    {{ $comment->article->name }}
                </a>
            </h3>
            <p><strong>Автор:</strong> {{ $comment->user->name }}</p>
            <p class="text">{{ $comment->text }}</p>
            <small>{{ $comment->created_at->format('d.m.Y H:i') }}</small>
            <div class="approve-buttons">
                <form action="{{ route('comments.approve', $comment) }}" method="POST" class="action">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Принять</button>
                </form>
                <form action="{{ route('comments.reject', $comment) }}" method="POST" class="action">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Отклонить</button>
                </form>
            </div>
        </div>
    @empty
        <p>Нет комментариев, ожидающих модерации</p>
    @endforelse
@endsection