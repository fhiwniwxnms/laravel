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
@endsection