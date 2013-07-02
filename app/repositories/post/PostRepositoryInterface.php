<?php

/**
 * Interface for the Post model repositories.
 */
interface PostRepositoryInterface {

	public function findAll();

	public function paginateAllDesc($pagination);

	public function findById($id);

    public function findBySlug($slug);

	public function store($data);

	public function update($id, $data);

	public function destroy($id);

	public function instance($data);

	public function validate($data, $rules);

}