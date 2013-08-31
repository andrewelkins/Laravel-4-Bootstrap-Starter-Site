<?php

class NavigationGroup extends Eloquent {
	public $table="navigation_groups";
	protected $guarded = array();
	public static $rules = array(
		'title' => 'required',
		'abbrev' => 'required'
	);
}