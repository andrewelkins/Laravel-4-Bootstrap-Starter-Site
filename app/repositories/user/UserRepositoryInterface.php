<?php

/**
 * Interface for the User model repositories.
 */
interface UserRepositoryInterface {

	public function findAll();

	public function findById($id);

	public function store($data);

	public function update($id, $data);

	public function destroy($id);

	public function instance($data);

	public function validate($data, $rules);

}