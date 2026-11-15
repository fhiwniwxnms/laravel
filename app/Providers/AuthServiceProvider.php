<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Article;
use App\Policies\ArticlePolicy;
use App\Models\Comment;
use App\Policies\CommentPolicy;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function (User $user, string $ability) {
            if ($user->role && $user->role->name === 'moderator') {
                return true;
            }
        });

        Gate::define('delete-comment', function (User $user, Comment $comment) {
            if ($user->role?->name === 'moderator') {
                return Response::allow();
            }

            return Response::deny('Удалять комментарии может только модератор.');
        });
    }
}
