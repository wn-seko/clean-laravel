<?php

namespace App\Http\Requests\Post;

use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Http\FormRequest;


class StoreRequest extends FormRequest
{
    // 認可処理もここで行うことができる
    public function authorize(PostPolicy $policy): Response
    {
        $community_id = $this->route()->parameter('community');

        // FIXME
        $user = new User('user-1', 'name', 'x', 'y');
        $community = new Community($community_id);

        //    	return $gate->authorize('store', [Post::class, $community]);
        return $policy->store($user, $community);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:30',
            'body' => 'required|string|max:10000',
        ];
    }

    public function makePost(): Post
    {
        // バリデーションした値で埋めた Post を取得
        return new Post(...$this->validated());
    }
}
