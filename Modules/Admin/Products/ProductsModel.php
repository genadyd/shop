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

    public function add($params, string $product_image): int
    {
        $query = "INSERT INTO products (product_name, product_description, product_image, brand_id, category_id, quantity, price, active)
VALUES (:NAME, :DESCRIPTION, :IMAGE, :BRAND, :CATEGORY, :QUANTITY, :PRICE, :ACTIVE)";
        $product_name = htmlspecialchars($params['product_name']);
        $product_description = htmlspecialchars($params['product_description']);
        $product_quantity = (int)htmlspecialchars($params['product_quantity']);
        $product_price = (int)htmlspecialchars($params['product_price']);
        $brand = (int)htmlspecialchars($params['brand'])??0;
        $category = (int)htmlspecialchars($params['category'])??0;
        $product_image = htmlspecialchars($product_image);
        $active = $params['product_active'];
        $st = $this->db->prepare($query);
        $st->bindParam(':NAME', $product_name, \PDO::PARAM_STR);
        $st->bindParam(':DESCRIPTION', $product_description, \PDO::PARAM_STR);
        $st->bindParam(':BRAND', $brand, \PDO::PARAM_INT);
        $st->bindParam(':CATEGORY', $category, \PDO::PARAM_INT);
        $st->bindParam(':QUANTITY', $product_quantity, \PDO::PARAM_INT);
        $st->bindParam(':PRICE', $product_price, \PDO::PARAM_INT);
        $st->bindParam(':IMAGE', $product_image, \PDO::PARAM_STR);
        $st->bindParam(':ACTIVE', $active, \PDO::PARAM_BOOL);
        if ($st->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM products";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function detOne(int $id): array
    {
        $query = "SELECT * FROM products WHERE id = :ID";
        $st = $this->db->prepare($query);
        $st->bindParam(':ID',$id, \PDO::PARAM_INT);
        $st->execute();
        return $st->fetch(\PDO::FETCH_ASSOC);
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
