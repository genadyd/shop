<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/24/20
 * Time: 6:13 PM
 */


namespace Shop\Api\Models;


use Application\Interfaces\ShopApi\ApiModelsAbstract;
require_once 'Application/Interfaces/ApiModelsAbstract.php';
class ProductsModel extends ApiModelsAbstract
{
    public function get(){
        $query = "SELECT * FROM products";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

}
