<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/23/20
 * Time: 7:12 PM
 */


namespace Shop\Home;


class HomeController
{
    public function index()
    {
        require_once 'Modules/Shop/views/layout/shop_main_template.php';
    }
}
