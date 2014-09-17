<?php


class Category extends Eloquent {
	protected $table = 'category';


	public function movies(){
		return $this->hasMany('Movies', 'category_id', 'id');
	}
}