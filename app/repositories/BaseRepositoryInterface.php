<?php


interface BaseRepositoryInterface
{

    public function findAll();

    public function findById($id);

    public function update(array $attributes = array());

    public static function destroy($id);

    public function instance($data);
}