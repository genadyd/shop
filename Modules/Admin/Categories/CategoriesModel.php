<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/20/20
 * Time: 1:01 AM
 */


namespace Admin\Categories;


use Admin\ModelsInterface\AdminModelsInterface;
use Db\Db;

class CategoriesModel implements AdminModelsInterface
{
    protected $db;

    public function __construct()
    {
        $conn = new Db();
        $this->db = $conn->connection();
    }

    public function add($category_name, string $category_description): int
    {
        $query = "INSERT INTO categories (category_name, category_description) VALUES (:NAME, :DESCRIPTION)";
        $category_name = htmlspecialchars($category_name);
        $category_description = htmlspecialchars($category_description);
        $st = $this->db->prepare($query);
        $st->bindParam(':NAME', $category_name, \PDO::PARAM_STR);
        $st->bindParam(':DESCRIPTION', $category_description, \PDO::PARAM_STR);
        if ($st->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM categories";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function detOne(int $id): array
    {
        $query = "SELECT * FROM categories WHERE id = :ID";
        $st = $this->db->prepare($query);
        $st->bindParam(':ID',$id, \PDO::PARAM_INT);
        $st->execute();
        return $st->fetch(\PDO::FETCH_ASSOC);
    }

    public function edit(int $id, string $name, string $description): int
    {
        $name = htmlspecialchars($name);
        $description  = htmlspecialchars($description);
            $query = "UPDATE categories SET category_name = :NAME, category_description = :DESCRIPTION WHERE id = :ID ";
            $st = $this->db->prepare($query);
            $st->bindParam(':DESCRIPTION', $description, \PDO::PARAM_STR);
            $st->bindParam(':NAME', $name, \PDO::PARAM_STR);
            $st->bindParam(':ID', $id, \PDO::PARAM_INT);
        $st->execute();
        return $st->errorCode();
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM categories WHERE id=:ID";
        $st = $this->db->prepare($query);
        $st->bindParam(':ID',$id, \PDO::PARAM_INT);
        $st->execute();
        return $st->errorCode();
    }

}
