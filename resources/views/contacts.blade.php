@extends('layouts.app')

@section('content')
<h1>Контакты</h1>
@foreach ($contacts as $contact => $value)
    @if ($contact == 'Телефон')
        @php
            $icon = '/images/phone.png';
        @endphp
    @elseif ($contact == 'Email')
        @php
            $icon = '/images/email.png';
        @endphp
    @elseif ($contact == 'Адрес')
        @php
            $icon = '/images/address.png';
        @endphp
    @endif
    
    <div class="contact">
        <img src="{{ $icon }}" alt="{{ $contact }}">
        <p>
            {{ $contact }}: {{ $value }}
        </p>
    </div>
@endforeach
@endsection