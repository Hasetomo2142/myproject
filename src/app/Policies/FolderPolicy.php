<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Folder;

class FolderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }
}