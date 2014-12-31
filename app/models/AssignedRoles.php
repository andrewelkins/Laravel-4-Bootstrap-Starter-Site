<?php

class AssignedRoles extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public function role() {
        return $this->belongsTo('Role');
    }

}