<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/18/20
 * Time: 5:10 AM
 */
trait formCryptTrait{
    public function crypt(){
        $crypt = md5(time());
        $_SESSION['LOGIN_CRYPT'] = $crypt;
        $req = ['crypt'=>$crypt];
        echo json_encode($req);
    }
}
