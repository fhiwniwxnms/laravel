@extends('layouts.app')

@section('content')
    <h1>Новости</h1>
    <div class="articles">
        @foreach ($articles as $article) 
            <div class='article'>
                <img src="/images/{{ $article->preview_image }}" alt="{{ $article->name }}">
                <h2>{{ $article->name }}</h2>
                <h3>{{ $article->date }}</h3>
                <p>{{ $article->shortDesc }}</p>
            </div>
        @endforeach
    </div>

@endsection