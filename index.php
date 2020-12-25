<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/16/20
 * Time: 8:24 AM
 */
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//phpinfo();
require_once 'vendor/autoload.php';
///*
// *  web routes
// * */
require_once 'Application/Routers/web.php';
///*
// *  api routes
// * */
require_once 'Application/Routers/api.php';

