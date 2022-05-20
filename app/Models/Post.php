<?php

namespace App\Models;

class Post
{
    public $id = '';
    public $title = '';
    public $body = '';
    public $created_at = '';
    public $updated_at = '';
    public $exists = true;  // FIXME

    public function __construct(
        string $id,
        string $title,
        string $body,
        string $created_at,
        string $updated_at
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function save()
    {
    }

}
