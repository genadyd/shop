<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/18/20
 * Time: 7:45 AM
 */


namespace Admin;


use Db\Db;
require 'Application/Components/Db/Db.php';
class LoginModel
{

    protected $Db;

    public function __construct()
    {
        $class = new Db();
        $this->Db = $class->connection();
    }

    public function adminExists($pass, $email):bool{
       $query = "SELECT id FROM admins WHERE email = :EMAIL AND password = :PASS";
       $pass = md5($pass);
       $st = $this->Db->prepare($query);
       $st->bindParam(':EMAIL',$email,\PDO::PARAM_STR);
       $st->bindParam(':PASS',$pass, \PDO::PARAM_STR);
       $st->execute();
       return $st->fetch(\PDO::FETCH_ASSOC)?true:false;
    }

}
