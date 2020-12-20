<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/16/20
 * Time: 3:15 PM
 */

use CoffeeCode\Router\Router;

$router = new Router("http://www.simple-shop2.loc");
/*admin routes*/
require_once 'Modules/Admin/Home/HomeController.php';
require_once 'Modules/Admin/Login/LoginController.php';
require_once 'Modules/Admin/Brands/BrandsController.php';
require_once 'Modules/Admin/Categories/CategoriesController.php';
require_once 'Modules/Admin/Products/ProductsController.php';
$router->group('admin')->namespace("Admin");

$router->get('/',"HomeController:index");
$router->get('/login',"LoginController:index");
$router->post('/crypt',"LoginController:crypt");
$router->post('/log_form',"LoginController:getForm");
/* brands*/
$router->get('/brands',"Brands\BrandsController:index");
$router->get('/brands/add',"Brands\BrandsController:add");
$router->post('/brands/add',"Brands\BrandsController:add_form");
$router->get('/brands/edit/{id}',"Brands\BrandsController:edit");
$router->post('/brands/edit_form/{id}',"Brands\BrandsController:edit_form");
$router->get('/brands/delete/{id}',"Brands\BrandsController:delete");
/*==============*/
/* categories */
$router->get('/categories',"Categories\CategoriesController:index");
$router->get('/categories/add',"Categories\CategoriesController:add");
$router->post('/categories/add',"Categories\CategoriesController:add_form");
$router->get('/categories/edit/{id}',"Categories\CategoriesController:edit");
$router->post('/categories/edit_form/{id}',"Categories\CategoriesController:edit_form");
$router->get('/categories/delete/{id}',"Categories\CategoriesController:delete");
/*==================================================*/
/* products */
$router->get('/products',"Products\ProductsController:index");
$router->get('/products/add',"Products\ProductsController:add");
$router->post('/categories/add',"Products\ProductsController:add_form");
$router->get('/products/edit/{id}',"Products\ProductsController:edit");
$router->post('/products/edit_form/{id}',"Products\ProductsController:edit_form");
$router->get('/products/delete/{id}',"Products\ProductsController:delete");
/*===================================*/

$router->dispatch();


