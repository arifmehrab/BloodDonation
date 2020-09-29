<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class upazila extends Model
{
    // Belong to Divition ==========
    public function divition()
    {
        return $this->belongsTo(divition::class, 'divition_id', 'id');
    }
     // Belong to District ==========
     public function district()
     {
        return $this->belongsTo(district::class, 'district_id', 'id');
     }
}
