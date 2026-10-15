@extends('layouts.app')

@section('content')
    <h1>Добавить новость</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <label for="name">Название
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="date">Дата публикации
            <input type="date" name="date" id="date" value="{{ old('date') }}">
            @error('date') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="preview_image">Имя файла превью
            <input type="text" name="preview_image" id="preview_image" value="{{ old('preview_image') }}">
            @error('preview_image') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="full_image">Имя файла полного изображения
            <input type="text" name="full_image" id="full_image" value="{{ old('full_image') }}">
            @error('full_image') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="shortDesc">Краткое описание
            <textarea name="shortDesc" id="shortDesc">{{ old('shortDesc') }}</textarea>
            @error('shortDesc') <p class="error">{{ $message }}</p> @enderror
        </label>

        <label for="fullText">Полный текст
            <textarea name="fullText" id="fullText">{{ old('fullText') }}</textarea>
            @error('fullText') <p class="error">{{ $message }}</p> @enderror
        </label>

        <button type="submit" id="signin">Сохранить новость</button>
    </form>
@endsection