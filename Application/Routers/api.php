<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/24/20
 * Time: 6:15 PM
 */
use CoffeeCode\Router\Router;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$router = new Router("http://www.simple-shop.loc");

require_once 'Modules/Shop/Api/ApiController.php';
$router->group('api')->namespace("Shop");

$router->post('/fill_state',"Api\ApiController:fillState");

$router->dispatch();

