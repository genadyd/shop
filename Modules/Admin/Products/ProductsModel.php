<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/20/20
 * Time: 9:24 AM
 */


namespace Admin\Products;


use Db\Db;

class ProductsModel implements \Admin\ModelsInterface\AdminModelsInterface
{
    protected $db;

    public function __construct()
    {
        $conn = new Db();
        $this->db = $conn->connection();
    }

    public function add(string $brand_name, string $brand_logo): int
    {
        // TODO: Implement add() method.
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM products";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function detOne(int $id): array
    {
        // TODO: Implement detOne() method.
    }

    public function edit(int $id, string $name, string $file_path): int
    {
        // TODO: Implement edit() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
    public function getBrands(){
        $query = "SELECT * FROM brands";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getCategories(){
        $query = "SELECT * FROM categories";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }
}
