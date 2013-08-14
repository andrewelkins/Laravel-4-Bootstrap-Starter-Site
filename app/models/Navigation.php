<?php

class Navigation extends Eloquent {
	public $table="navigation_links";
	protected $guarded = array();
	public static $rules = array(
		'title' => 'required',
		'abbrev' => 'required'
	);
}