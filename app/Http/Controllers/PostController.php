<?php

namespace App\Http\Controllers;

use App\Exceptions\TooManyRequestsHttpException;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Community;
use App\Models\User;
use App\UseCases\Post\Exceptions\PostLimitExceededException;
use App\UseCases\Post\StoreAction;

class PostController
{
    public function index(): array
    {
        return ['status' => 'OK'];
    }

    /**
     * POST communities/{community}/posts
     *
     * というエンドポイントで， {community} に指定された ID でルートモデルバインディング
     */
    public function store(StoreRequest $request, StoreAction $action): PostResource
    {
        
    	$post = $request->makePost();

        // FIXME
        $user = new User('user-1', 'name', 'x', 'y');
        $community = new Community('community-1');

        //var_dump($post);

        try {
            // ドメインバリデーションを呼び出す
            //return new PostResource($action($user, $community, $post));
            return new PostResource($post);
        } catch (PostLimitExceededException $e) {
            // 捕まえた例外はスタックトレースに積む
            throw new TooManyRequestsHttpException($e->getMessage(), $e);
        }
    }
}
