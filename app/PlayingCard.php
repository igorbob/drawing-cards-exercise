<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayingCard extends Model
{
	protected $fillable = ['suit','value','position'];

	public function toString() {
		return $this->suit . $this->value;
	}
}
