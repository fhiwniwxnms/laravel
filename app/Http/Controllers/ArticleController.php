<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Article::class);
        $articles = Article::paginate(5);
        return view('articles', ['articles' => $articles]);
    }

    public function create()
    {
        $this->authorize('create', Article::class);
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Article::class);        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'preview_image' => 'required|string|max:255',
            'full_image' => 'required|string|max:255',
            'shortDesc' => 'required|string',
            'fullText' => 'required|string',
        ]);

        Article::create($validated);
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'preview_image' => 'required|string|max:255',
            'full_image' => 'required|string|max:255',
            'shortDesc' => 'required|string',
            'fullText' => 'required|string',
        ]);

        $article->update($validated);

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $this->authorize('view', $article);
        return view('articles.show', ['article' => $article]);
    }
}
