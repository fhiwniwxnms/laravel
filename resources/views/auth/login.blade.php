@extends('layouts.app')

@section('content')
    <h1>Вход</h1>
    <form action="/login" method="POST">
        @csrf
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
        <button type="submit" id="login">Войти</button>
    </form>
    <p class="singin-login">Нет аккаунта? <a href="/signin">Зарегистрироваться</a></p>
@endsection