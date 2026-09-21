<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №1</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Главная</a>
            <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">О нас</a>
            <a href="/contacts" class="{{ request()->is('contacts') ? 'active' : '' }}">Контакты</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <h2>Цупрун Ангелина Денисовна, 251-321</h2>
    </footer>
</body>
</html>