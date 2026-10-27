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
        <label for="password-confirmation">Подтверждение пароля
            <input type="password" name="password_confirmation" id="password-confirmation">
            @if ($errors->has('password_confirmation')) 
                <p class="error">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </label>
        <button type="submit" id="signin">Зарегистрироваться</button>
    </form>
    <p class="singin-login">Уже есть аккаунт? <a href="/login">Войти</a></p>
@endsection