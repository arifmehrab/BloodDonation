<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    // Belong To Divitions
    public function divition(){
        return $this->belongsTo(divition::class, 'divition_id', 'id');
    }
}
