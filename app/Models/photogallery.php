<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class photogallery extends Model
{
    // Belongs To user 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
