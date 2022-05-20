<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Community;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function store(User $user, Community $community): Response
    {
        $userBelongsToCommunity = $community->hasUser($user);

        return $userBelongsToCommunity
            ? Response::allow()
            : Response::deny('ユーザは指定されたコミュニティに所属していません');
    }
}
