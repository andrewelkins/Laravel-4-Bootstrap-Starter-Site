<?php

/**
 * Project : ctneventor
 * User: thuytien
 * Date: 11/14/2014
 * Time: 10:07 PM
 */
class EventType extends Eloquent
{
    public function events()
    {
        return $this->hasMany('User');
    }
}