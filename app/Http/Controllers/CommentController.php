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
            'is_approved' => false,
        ]);

        return redirect()
            ->route('articles.show', $article)
            ->with('status', 'Ваш комментарий отправлен и ожидает модерации.');
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

    public function moderation()
    {
        $this->authorize('moderate', Comment::class);
        $comments = Comment::where('is_approved', false)
            ->with(['user', 'article'])
            ->latest()
            ->get();
        return view('comments.moderation', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $this->authorize('moderate', Comment::class);
        $comment->update([
            'is_approved' => true,
        ]);
        return redirect()
            ->route('comments.moderation')
            ->with('status', 'Комментарий одобрен');
    }

    public function reject(Comment $comment)
    {
        $this->authorize('moderate', Comment::class);
        $comment->delete();
        return redirect()
            ->route('comments.moderation')
            ->with('status', 'Комментарий отклонён');
    }
}