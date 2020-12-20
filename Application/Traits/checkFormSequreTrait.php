<?php


trait checkFormSequreTrait
{
    protected function checkForm($crypt){
        return $crypt && $crypt===$_SESSION['LOGIN_CRYPT'];
    }

}
