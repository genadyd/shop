<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/24/20
 * Time: 6:20 PM
 */


namespace Application\Interfaces\ShopApi;


use Db\Db;

abstract class ApiModelsAbstract
{
    protected  $db;
    public function __construct()
    {
        $c = new Db();
        $this->db = $c->connection();
    }



}
