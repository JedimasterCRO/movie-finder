<?php



class Ranking extends Eloquent{
	protected $table = 'ranking';
	public $timestamps = false;

	public function movie(){
		return $this->belongsTo('Movie', 'movie_id', 'id');
	}
}