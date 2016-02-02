<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model {
	protected $fillable = [
		'nome',
	];

	protected $hidden = [
		'id', 'created_at', 'updated_at',
	];
	public function campos() {
		return $this->hasMany('App\Campo');
	}
}