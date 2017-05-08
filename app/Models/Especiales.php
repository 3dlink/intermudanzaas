<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especiales extends Model
{
    protected $table = 'especiales';

    public function estimacion()
    {
    	return $this->belongsTo('App\Models\Estimacion', 'estimacion_id');
    }
}
