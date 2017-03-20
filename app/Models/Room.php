<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	/**
	 * Get all of the objects that may be contained in this room.
	 */
	public function objects()
	{
		return $this->morphedByMany('App\Models\Object', 'contained', 'contains');
	}

	/**
	 * Get all of the boxes that may be contained in this room.
	 */
	public function boxes()
	{
		return $this->morphedByMany('App\Models\Box', 'contained', 'contains');
	}
}
