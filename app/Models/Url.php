<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class Url extends Model
{
    use Uuid;
    public $timestamps = false;
    protected $fillable = [
        "hit",
        "url",
        "short_url",
        "user_id"
    ];
}
