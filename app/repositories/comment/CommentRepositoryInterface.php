<?php

/**
 * Interface for the Comment model repositories.
 */
interface CommentRepositoryInterface {

	public function findAll();

	public function findByPostDesc($postId);

	public function findById($id);

	public function store($postId, $data);

	public function update($id, $data);

	public function destroy($id);

	public function instance($data);

	public function validate($data, $rules);

}