<?php

namespace App\Policies;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ParticipantPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        return $user->hasAnyRole(['competition-manager', 'super_admin']) ? true : null;
    }

    public function viewAny(User $user): bool { return false; }

    public function view(User $user, Participant $participant): bool { return false; }

    public function create(User $user): bool { return false; }

    public function update(User $user, Participant $participant): bool { return false; }

    public function delete(User $user, Participant $participant): bool { return false; }

    public function restore(User $user, Participant $participant): bool { return false; }

    public function forceDelete(User $user, Participant $participant): bool { return false; }
}
