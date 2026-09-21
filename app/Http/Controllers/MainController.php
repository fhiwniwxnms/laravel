<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $articles = file_get_contents(public_path("articles.json"));
        $articles = json_decode($articles, true);
        return view('welcome', ['articles' => $articles]);
    }

    public function galery($index)
    {
        $articles = file_get_contents(public_path("articles.json"));
        $articles = json_decode($articles, true);
        $article = $articles[$index];
        return view('galery', ['article' => $article]);
    }
}
