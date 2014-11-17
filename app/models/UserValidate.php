<?php
/**
 * Project : ctneventor
 * User: thuytien
 * Date: 11/15/2014
 * Time: 9:36 AM
 */

class UserValidate implements UserValidatorInterface{
    public function validate(ConfideUserInterface $user)
    {
        unset($user->password_confirmation);
        return true; // If the user valid
    }
}