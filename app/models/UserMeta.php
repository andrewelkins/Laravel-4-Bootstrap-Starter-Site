<?php
/**
 * Project : ctneventor
 * User: thuytien
 * Date: 11/14/2014
 * Time: 10:30 PM
 */

class UserMeta extends Eloquent{
    public static $rules = array(
        'first_name' => 'required',
        'last_name' => 'required',
        'legal_name' => 'required',
        'birthday' => 'required|date',
        'phone' => 'numeric|min:9|unique:user_metas',
        'id_number' => 'unique:user_metas'
    );
    public function user(){
        return $this->belongsTo('User');
    }
    public function id_number(){
        return $this->id_number;
    }
    public function address(){
        return $this->address;
    }
    public function first_name(){
        return $this->first_name;
    }
    public function last_name(){
        return $this->last_name;
    }
    public function legal_name(){
        return $this->legal_name;
    }
    public function birthday(){
        return $this->birthday;
    }
    public function phone(){
        return $this->phone;
    }
    public function note(){
        return $this->note;
    }
}