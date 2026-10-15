 @extends('layouts.app')

@section('content')
    <h1>Редактировать новость</h1>

    <form action="{{ route('articles.update', $article) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Название
            <input type="text" name="name" id="name" value="{{ old('name', $article->name) }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="date">Дата публикации
            <input type="date" name="date" id="date" value="{{ old('date', $article->date) }}">
            @error('date') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="preview_image">Имя файла превью
            <input type="text" name="preview_image" id="preview_image" value="{{ old('preview_image', $article->preview_image) }}">
            @error('preview_image') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="full_image">Имя файла полного изображения
            <input type="text" name="full_image" id="full_image" value="{{ old('full_image', $article->full_image) }}">
            @error('full_image') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="shortDesc">Краткое описание
            <textarea name="shortDesc" id="shortDesc">{{ old('shortDesc', $article->shortDesc) }}</textarea>
            @error('shortDesc') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="fullText">Полный текст
            <textarea name="fullText" id="fullText">{{ old('fullText', $article->fullText) }}</textarea>
            @error('fullText') <p class="error">{{ $message }}</p> @enderror
        </label>

        <button type="submit" id="signin">Сохранить изменения</button>
    </form>
@endsection