<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

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

    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view('comments.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $validated = $request->validate([
            'text' => 'required|string',
        ]);

        $comment->update($validated);

        return redirect()->route('articles.show', $comment->article);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $article = $comment->article;
        $comment->delete();
        return redirect()->route('articles.show', $article);
    }
}