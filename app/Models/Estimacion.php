<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimacion extends Model
{
    protected $table = 'estimaciones';

    public function operativo()
    {
    	return $this->belongsTo('App\Models\User', 'a_cargo');
    }

    public function logistics()
    {
        return $this->belongsTo('App\Models\User', 'logistica');
    }

    public function client()
    {
    	return $this->belongsTo('App\Models\User', 'cliente');
    }

    public function objects()
	{
		return $this->morphedByMany('App\Models\Object', 'contained', 'mudanza')->withPivot('cantidad', 'room_id');
	}

	public function boxes()
	{
		return $this->morphedByMany('App\Models\Box', 'contained', 'mudanza')->withPivot('cantidad', 'room_id');
	}

    public function origen(){
        return $this->belongsTo('App\Models\Pais', 'p_origen');
    }

    public function destino(){
        return $this->belongsTo('App\Models\Pais', 'p_destino');
    }

    public function especiales(){
        return $this->hasMany('App\Models\Especiales', 'estimacion_id');
    }

    public function fotos(){
        return $this->hasMany('App\Models\Fotos', 'estimacion_id');
    }

    public function state(){
        return $this->belongsTo('App\Models\Estados', 'estado');
    }

}
