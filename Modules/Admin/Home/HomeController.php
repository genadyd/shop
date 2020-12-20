<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/16/20
 * Time: 3:20 PM
 */

namespace Admin;
require 'Application/Traits/adminCheckIfLogged.php';
class HomeController
{
    use \adminCheckIfLogged;
    public function index()
    {
        if(!$this->isLogged()) header('Location: admin/login');
        $data = 'jkjljlj';
        require('Modules/Admin/views/layout/main_template.php');
    }
}
