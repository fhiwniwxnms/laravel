<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function viewAny(User $user): Response
    {
        return $user->role?->name === 'reader'
            ? Response::allow()
            : Response::deny('Просматривать список новостей могут только авторизованные читатели.');
    }

    public function view(User $user, Article $article): Response
    {
        return Response::allow();
    }

    public function create(User $user): Response
    {
        return Response::deny('Создавать новости может только модератор.');
    }

    public function update(User $user, Article $article): Response
    {
        return Response::deny('Редактировать новости может только модератор.');
    }

    public function delete(User $user, Article $article): Response
    {
        return Response::deny('Удалять новости может только модератор.');
    }
}