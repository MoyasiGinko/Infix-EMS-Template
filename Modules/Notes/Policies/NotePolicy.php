<?php

namespace Modules\Notes\Policies;

use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use Modules\Notes\Entities\Note;

class NotePolicy
{
    public function viewAny(Authenticatable $user): bool
    {
        return true; // everyone authenticated can list own notes
    }

    public function view(Authenticatable $user, Note $note): bool
    {
        return $user->role_id == 1 || $note->created_by == $user->id;
    }

    public function create(Authenticatable $user): bool
    {
        return true; // permission middleware already applied separately if needed
    }

    public function update(Authenticatable $user, Note $note): bool
    {
        return $user->role_id == 1 || $note->created_by == $user->id;
    }

    public function delete(Authenticatable $user, Note $note): bool
    {
        return $user->role_id == 1 || $note->created_by == $user->id;
    }

    public function export(Authenticatable $user): bool
    {
        return $user->role_id == 1 || true; // allow everyone to export own filtered subset
    }
}
