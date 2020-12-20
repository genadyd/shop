<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/18/20
 * Time: 3:19 PM
 */
trait adminCheckIfLogged{
    protected function isLogged(){
        return isset($_SESSION['LOGIN_CRYPT']);
    }
}
