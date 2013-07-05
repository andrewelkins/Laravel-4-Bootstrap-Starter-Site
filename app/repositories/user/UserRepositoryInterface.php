<?php

/**
 * Interface for the User model repositories.
 */
interface UserRepositoryInterface extends BaseRepositoryInterface
{

    public function store($data);

}