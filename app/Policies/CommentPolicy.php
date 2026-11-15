<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function view(User $user, Comment $comment): Response
    {
        return Response::allow();
    }

    public function create(User $user): Response
    {
        if ($user->role?->name === 'reader') {
            return Response::allow();
        }

        return Response::deny(
            'Только читатель может добавлять комментарии.'
        );
    }

    public function update(User $user, Comment $comment): Response
    {
        return Response::deny(
            'Редактировать комментарии может только модератор.'
        );
    }

    public function delete(User $user, Comment $comment): Response
    {
        return Response::deny(
            'Удалять комментарии может только модератор.'
        );
    }
}