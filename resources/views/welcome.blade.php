@extends('layouts.app')

@section('content')
    <h1>Последние публикации</h1>
    <div class="articles">
        @foreach ($articles as $index => $article) 
            <div class='article'>
                <a href="/galery/{{ $index }}">
                    <img src="/images/{{ $article['preview_image'] }}" alt="{{ $article['name'] }}">
                </a>
                <h2>{{ $article['name'] }}</h2>
                <h3>{{ $article['date'] }}</h3>
                @if (isset($article['shortDesc']))
                    <p>{{ $article['shortDesc'] }}</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection