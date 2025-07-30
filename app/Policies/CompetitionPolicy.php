<?php

namespace App\Policies;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompetitionPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        // Give all access to competition-manager or admin
        return $user->hasAnyRole(['competition-manager', 'super_admin']) ? true : null;
    }

    public function viewAny(User $user): bool { return false; }

    public function view(User $user, Competition $competition): bool { return false; }

    public function create(User $user): bool { return false; }

    public function update(User $user, Competition $competition): bool { return false; }

    public function delete(User $user, Competition $competition): bool { return false; }

    public function restore(User $user, Competition $competition): bool { return false; }

    public function forceDelete(User $user, Competition $competition): bool { return false; }
}
