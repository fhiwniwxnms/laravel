@extends('layouts.app')

@section('content')
    <h1>Новости</h1>
    @can('create', \App\Models\Article::class)
        <a href="/articles/create" class='create-a'>Создать новость</a>
    @endcan
    <div class="articles">
        @foreach ($articles as $article) 
            <div class='article'>
                <img src="/images/{{ $article->preview_image }}" alt="{{ $article->name }}">
                <h2>
                    <a href="{{ route('articles.show', $article) }}">
                        {{ $article->name }}
                    </a>
                </h2>
                <h3>{{ $article->date }}</h3>
                <p>{{ $article->shortDesc }}</p>
                @can('update', $article)
                    <a href="{{ route('articles.edit', $article) }}">Редактировать</a>
                @endcan
                @can('delete', $article)
                    <form action="{{ route('articles.destroy', $article) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Удалить</button>
                    </form>
                @endcan
            </div>
        @endforeach
        <div class="pagination">
            {{ $articles->links() }}
        </div>
    </div>

@endsection