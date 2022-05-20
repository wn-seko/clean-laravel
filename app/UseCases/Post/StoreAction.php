<?php

namespace App\UseCases\Post;

use App\UseCases\Post\Exceptions\PostLimitExceededException;
use App\Models\Community;
use App\Models\Post;
use App\Models\User;

class StoreAction
{
    public function __invoke(User $user, Community $community, Post $post): Post
    {
        // バグを防ぐために簡易的にアサーションを書く
        assert($user->exists);
        assert($community->exists);
        assert(!$post->exists);

        $userPostsCountToday = $user->countToday($community);

        if ($userPostsCountToday >= 200) {
            throw new PostLimitExceededException('本日の投稿可能な回数を超えました。');
        }

        $post->save();

        return $post;
    }
}
