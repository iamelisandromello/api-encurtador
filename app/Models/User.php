<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps      = false;
    protected $table        = 'users';
    protected $keyType      = 'string';
    protected $primaryKey   = 'id';
    public $incrementing    = false;
    protected $casts = ['id' => 'string']; // cast
    
    protected $fillable = [
        'id'
    ];

}