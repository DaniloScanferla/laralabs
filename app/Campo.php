<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campo extends Model {
	protected $fillable = [
		'tipo',
		'conteudo',
		'indicador_id',
	];

	protected $hidden = [
		'id', 'created_at', 'updated_at',
	];

	public function indicador() {
		return $this->belongsTo('App\Indicador');
	}
}