@extends('layouts.app')

@section('content')
    <h1>Регистрация</h1>
    <form action="/signin" method="POST">
        @csrf
        <label for="name">Имя
            <input type="text" name="name" id="name">
            @if ($errors->has('name')) 
                <p class="error">{{ $errors->first('name') }}</p>
            @endif
        </label>
        <label for="email">Email
            <input type="email" name="email" id="email">
            @if ($errors->has('email')) 
                <p class="error">{{ $errors->first('email') }}</p>
            @endif
        </label>
        <label for="password">Пароль
            <input type="password" name="password" id="password">
            @if ($errors->has('password')) 
                <p class="error">{{ $errors->first('password') }}</p>
            @endif
        </label>
        <button type="submit" id="signin">Зарегистрироваться</button>
    </form>
@endsection