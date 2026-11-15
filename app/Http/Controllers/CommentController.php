<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $this->authorize('create', Comment::class);

        $validated = $request->validate([
            'text' => 'required|string',
        ]);

        $article->comments()->create([
            'user_id' => $request->user()->id,
            'text' => $validated['text'],
        ]);

        return redirect()->route('articles.show', $article);
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('delete-comment', $comment);
        $article = $comment->article;
        $comment->delete();
        return redirect()->route('articles.show', $article);
    }
}