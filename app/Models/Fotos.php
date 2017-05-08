<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    public function estimacion()
    {
    	$this->belongsTo('App\Models\Estimacion','estimacion_id');
    }
}
