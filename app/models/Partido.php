<?php

class Partido extends \Eloquent {
	protected $fillable = [];

	public function scopePartidoEquipo ($query)
	{
		return $query
		->leftJoin('equipos','equipos.id','=','partidos.equipo_id')
		->select(
			DB::raw('CONCAT(equipos.nombre,"-",partidos.dia) AS nombre'),
			'partidos.id'
			)
		->orderBy('dia','DESC');
 	}

	public function equipo()
	{
		return $this->belongsTo('Equipo');
	}

	public function cancha()
	{
		return $this->belongsTo('Cancha');
	}
	
	public function torneo()
	{
		return $this->belongsTo('Torneo');
	}
}