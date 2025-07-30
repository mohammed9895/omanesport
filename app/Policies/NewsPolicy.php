<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NewsPolicy
{
    /**
     * Grant all permissions to users with 'news' or 'admin' roles.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasAnyRole(['News', 'super_admin'])) {
            return true;
        }

        return false;
    }

    // You can omit the methods below, or define them to return false
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, News $news): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, News $news): bool
    {
        return false;
    }

    public function delete(User $user, News $news): bool
    {
        return false;
    }

    public function restore(User $user, News $news): bool
    {
        return false;
    }

    public function forceDelete(User $user, News $news): bool
    {
        return false;
    }
}
