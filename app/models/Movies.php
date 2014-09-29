<?php


class Movies extends Eloquent {
	protected $table = 'movies';
	protected $fillable = array('name');

	public function category(){
		return $this->belongsTo('Category', 'category_id', 'id');
	}

	public function user(){
		return $this->belongsTo('User', 'user_id', 'id');
	}
}