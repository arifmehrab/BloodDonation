<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    // Belong to many post
    public function posts()
    {
        return $this->belongsToMany(post::class);
    }
}
