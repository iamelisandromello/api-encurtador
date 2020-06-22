<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Uuid
{
    /**
    * Change model primary key.
    *
    * @see Model::bootIfNotBooted()
    *s
    * @return void
    */
    protected function bootIfNotBooted()
    {
        parent::bootIfNotBooted();
    }

    /**
    * Boot UUID trait.
    *
    * @return void
    */
    public static function bootUuid()
    {
        self::creating(function ($model) {
            $model->short_url = $model->generateUuid();
        });
    }

    /**
    * Generate a new UUID.
    *
    * @return string
    */
    public function generateUuid()
    {
        return substr((string) Str::uuid(), 0, 8);
    }
  }