<?php

/**
 * Interface for the Role model repositories.
 */
interface RoleRepositoryInterface extends BaseRepositoryInterface
{

    public function store($data);

	public function preparePermissionsForSave($permissions);


}