<?php

class Page extends Eloquent{
	public $table = 'pages';
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'content' => 'required',
		'status' => 'required'
	);
}