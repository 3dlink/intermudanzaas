<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public function rooms()
    {
    	return $this->morphToMany('App\Models\Room', 'contained', 'contains');
    }
}
