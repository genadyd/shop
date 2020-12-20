<?php


namespace Admin\ModelsInterface;


interface AdminModelsInterface
{
    public function add( $brand_name, string $brand_logo):int;
    public function getAll():array;
    public function detOne(int $id):array;
    public function edit(int $id,string $name,string $file_path):int;
    public function delete(int $id):bool;
}
