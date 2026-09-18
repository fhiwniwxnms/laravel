<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contacts', function () {
    $contacts = [
    'Телефон' => '81234567890',
    'Email' => 'ivan.ivanov@example.com',
    'Адрес' => 'ул. Тверская д.1'
    ];
    return view('contacts',['contacts' => $contacts]);
});
