@extends('layouts.app')

@section('content')
    <a href="/" class="galery">← Вернуться к списку</a>
    <div class="galery-article">
        <img src="/images/{{ $article['full_image'] }}" alt="{{ $article['name'] }}"> 
        <h1>{{ $article['name'] }}</h1>
        <h2>{{ $article['date'] }}</h2>
        <p>{{ $article['desc'] }}</p>
    </div>
@endsection