<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // belongs to many category 
    public function categories()
    {
        return $this->belongsToMany(category::class);
    }
    // belong to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
