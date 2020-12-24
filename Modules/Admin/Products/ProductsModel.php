<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/20/20
 * Time: 9:24 AM
 */


namespace Admin\Products;


use Admin\ModelsInterface\AdminModelsInterface;
use Db\Db;

class ProductsModel implements AdminModelsInterface
{
    protected $db;

    public function __construct()
    {
        $conn = new Db();
        $this->db = $conn->connection();
    }

    public function add(array $params): int
    {
        $query = "INSERT INTO products (product_name, product_description, product_image, brand_id, category_id, quantity, price, active)
VALUES (:NAME, :DESCRIPTION, :IMAGE, :BRAND, :CATEGORY, :QUANTITY, :PRICE, :ACTIVE)";
        $product_name = htmlspecialchars($params['product_name']);
        $product_description = htmlspecialchars($params['product_description']);
        $product_quantity = (int)htmlspecialchars($params['product_quantity']);
        $product_price = (int)htmlspecialchars($params['product_price']);
        $brand = (int)htmlspecialchars($params['brand'])??0;
        $category = (int)htmlspecialchars($params['category'])??0;
        $product_image = htmlspecialchars($params['file_path']);
        $active = $params['active']??0;
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

    public function edit($params): int
    {
        $id = htmlspecialchars($params['id']);
        $name = htmlspecialchars($params['product_name']);
        $description = htmlspecialchars($params['product_description']);
        $brand = (int)htmlspecialchars($params['brand']);
        $category = (int)htmlspecialchars($params['category']);
        $product_quantity = (int)htmlspecialchars($params['product_quantity']);
        $product_price = (int)htmlspecialchars($params['product_price']);
        $active = (isset( $params['product_active']) && $params['product_active']==='on') ;
        if($params['file_path']){
            $file_path = htmlspecialchars($params['file_path']);
            $query = "UPDATE products SET product_name = :NAME, product_description=:DESCRIPTION, product_image =:IMADE,
                    brand_id = :BRAND,category_id = :CATEGORY, quantity = :QUANTITY, price = :PRICE, active = :ACTIVE  WHERE id = :ID ";
            $st = $this->db->prepare($query);
            $st->bindParam(':IMADE', $file_path, \PDO::PARAM_STR);
        }else{
            $query = "UPDATE products SET product_name = :NAME, product_description=:DESCRIPTION,
                    brand_id = :BRAND,category_id = :CATEGORY, quantity = :QUANTITY, price = :PRICE, active = :ACTIVE  WHERE id = :ID ";
            $st = $this->db->prepare($query);
        }
        $st->bindParam(':ID', $id, \PDO::PARAM_INT);
        $st->bindParam(':NAME', $name, \PDO::PARAM_STR);
        $st->bindParam(':DESCRIPTION', $description, \PDO::PARAM_STR);
        $st->bindParam(':BRAND', $brand, \PDO::PARAM_INT);
        $st->bindParam(':CATEGORY', $category, \PDO::PARAM_INT);
        $st->bindParam(':QUANTITY', $product_quantity, \PDO::PARAM_INT);
        $st->bindParam(':PRICE', $product_price, \PDO::PARAM_INT);
        $st->bindParam(':ACTIVE', $active, \PDO::PARAM_BOOL);
        $st->execute();
        return (int) $st->errorCode()[0];
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM products WHERE id = :ID";
        $st = $this->db->prepare($query);
        $st->bindParam(':ID',$id, \PDO::PARAM_INT);
       return $st->execute();


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
