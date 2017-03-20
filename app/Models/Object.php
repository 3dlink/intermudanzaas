<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    public function rooms()
    {
    	return $this->morphToMany('App\Models\Room', 'contained', 'contains');
    }
}
