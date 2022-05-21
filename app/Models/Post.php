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
    )
    {
    }

    public function save()
    {
    }

}
