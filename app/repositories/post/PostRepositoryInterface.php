<?php

/**
 * Interface for the Post model repositories.
 */
interface PostRepositoryInterface {

	public function findAll();

	public function findById($id);

	public function store($data);

	public function update($id, $data);

	public function destroy($id);

	public function instance($data);

	public function validate($data, $rules);

}