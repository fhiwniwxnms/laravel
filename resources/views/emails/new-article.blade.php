<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая статья</title>
</head>
<body>
    <h2>Добавлена новая статья!</h2>
    <h3>{{ $article->name }}</h3>
    <p><strong>Дата публикации:</strong> {{ $article->date }}</p>
    <p>{{ $article->shortDesc }}</p>
    <p>Полный текст статьи:</p>
    <p>{{ $article->fullText }}</p>
    <p>С уважением,<br>{{ config('app.name') }}</p>
</body>
</html>
