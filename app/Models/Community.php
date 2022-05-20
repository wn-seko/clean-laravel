<?php

namespace App\Models;

class Community
{
    public $id = '';
    public $exists = true;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function hasUser(User $user): bool
    {
        var_dump($user);
//        return $this
//            ->users()
//            ->wherePivot('user_id', $user->id)
//            ->exists();

        return true; // FIXME
    }
}
