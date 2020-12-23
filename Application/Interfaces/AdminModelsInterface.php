<?php


namespace Admin\ModelsInterface;


interface AdminModelsInterface
{
    public function add( array $params):int;
    public function getAll():array;
    public function detOne(int $id):array;
    public function edit(array $params):int;
    public function delete(int $id):bool;
}
