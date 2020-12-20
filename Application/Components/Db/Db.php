<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/18/20
 * Time: 5:39 AM
 */


namespace Db;



class Db
{
    public function connection(): \PDO
    {
        $conn='';
  require_once 'Application/config.php';
        try {
            /** @var  $host */
            /** @var  $db_name */
            /** @var  $user */
            /** @var  $pass */
            $conn = new \PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
}



}
