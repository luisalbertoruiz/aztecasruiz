<?php

class Marcador extends \Eloquent {
	protected $table = 'marcadores';
	protected $fillable = [];

	public function scopeMarcadorPartido($query)
	{
		return $query
		->join('partidos','partidos.id','=','marcadores.partido_id')
		->select(
			'partidos.torneo_id AS torneo',
			'partidos.dia AS dia',
			'marcadores.*'
			);
	}
	public function equipo()
	{
		return $this->belongsTo('Equipo');
	}
}