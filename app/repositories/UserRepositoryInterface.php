<?php

interface UserRepositoryInterface {
  public function findById($id);
  public function store($data);
}