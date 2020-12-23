<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/19/20
 * Time: 8:20 AM
 */


namespace Admin\Brands;
require_once 'Application/Components/Db/Db.php';
require_once 'Application/Interfaces/AdminModelsInterface.php';

use Admin\ModelsInterface\AdminModelsInterface;
use Db\Db;

class BrandsModel implements AdminModelsInterface
{
    protected $db;

    public function __construct()
    {
        $conn = new Db();
        $this->db = $conn->connection();
    }

    public function add(array $params):int
    {
        $query = "INSERT INTO brands (brand_name, brand_logo) VALUES (:NAME, :LOGO)";
        $brand_name = htmlspecialchars($params['brand_name']);
        $brand_logo = htmlspecialchars($params['file_path']);
        $st = $this->db->prepare($query);
        $st->bindParam(':NAME', $brand_name, \PDO::PARAM_STR);
        $st->bindParam(':LOGO', $brand_logo, \PDO::PARAM_STR);
        if ($st->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function getAll():array
    {
        $query = "SELECT * FROM brands";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function detOne(int $id):array{
        $query = "SELECT * FROM brands WHERE id = :ID";
        $st = $this->db->prepare($query);
        $st->bindParam(':ID',$id, \PDO::PARAM_INT);
        $st->execute();
        return $st->fetch(\PDO::FETCH_ASSOC);
    }
    public function edit($params):int{
        $name = htmlspecialchars($params['brand_name']);
        $id = (int) htmlspecialchars($params['id']);
        if($params['file_path'] && $params['file_path'] !=''){
            $file_path = htmlspecialchars($params['file_path']);
            $query = "UPDATE brands SET brand_name = :NAME, brand_logo=:LOGO WHERE id = :ID ";
            $st = $this->db->prepare($query);
            $st->bindParam(':LOGO', $file_path, \PDO::PARAM_STR);
        }else{
            $query = "UPDATE brands SET brand_name = :NAME WHERE id = :ID ";
            $st = $this->db->prepare($query);
        }
        $st->bindParam(':NAME', $name, \PDO::PARAM_STR);
        $st->bindParam(':ID', $id, \PDO::PARAM_INT);
       return (int)$st->execute();
    }
    public function delete(int $id): bool
    {
        $query = "DELETE FROM brands WHERE id=:ID";
        $st = $this->db->prepare($query);
        $st->bindParam(':ID',$id, \PDO::PARAM_INT);
        $st->execute();
        return $st->errorCode();
    }
}
