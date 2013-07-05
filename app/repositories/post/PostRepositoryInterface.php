<?php

/**
 * Interface for the Post model repositories.
 */
interface PostRepositoryInterface extends BaseRepositoryInterface
{

	public function paginateAllDesc($pagination);

	public function store($data);

}