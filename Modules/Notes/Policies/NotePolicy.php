<?php

namespace Modules\Notes\Policies;

use App\Models\User;
use Modules\Notes\Entities\Note;

class NotePolicy
{
    public function viewAny(User $user): bool
    {
        return true; // everyone authenticated can list own notes
    }

    public function view(User $user, Note $note): bool
    {
        return $user->role_id == 1 || $note->created_by == $user->id;
    }

    public function create(User $user): bool
    {
        return true; // permission middleware already applied separately if needed
    }

    public function update(User $user, Note $note): bool
    {
        return $user->role_id == 1 || $note->created_by == $user->id;
    }

    public function delete(User $user, Note $note): bool
    {
        return $user->role_id == 1 || $note->created_by == $user->id;
    }

    public function export(User $user): bool
    {
        return $user->role_id == 1 || true; // allow everyone to export own filtered subset
    }
}
