<?php

namespace App\Models;

use Carbon\Carbon;

class User
{
    public $id = '';
    public $name = '';
    public $created_at = '';
    public $updated_at = '';
    public $exists = true;  // FIXME

    private $eloquent = null;

    public function __construct(
        string $id,
        string $name,
        string $created_at,
        string $updated_at
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function countToday(Community $community): int
    {
        return $this
            ->eloquent
            ->posts()
            ->where('community_id', $community->id)
            ->where('created_at', '>=', Carbon::midnight())
            ->count();

    }
}
