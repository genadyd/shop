<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/17/20
 * Time: 12:33 AM
 */

namespace Admin;


use Application\Components\Forms\Forms;
use Application\Components\FormsComponents\FormsComponents;

require 'Application/Traits/formCryptTrait.php';
require 'LoginModel.php';

class LoginController
{

    use \formCryptTrait;


    protected $model;

    public function __construct()
    {
        $this->model = new LoginModel();
    }

    /*
     * login form show
     * */
    public function index()
    {
        $component_data = array(
            'FORM_TITLE' => 'Login:',
            'FORM' => $this->loginForm()
        );
        require_once 'Modules/Admin/views/login_template.php';
    }

    /*
    login form builder
    use Components interface
    @return string (HTML)
    */
    protected function loginForm()
    {
        require_once 'Application/Components/FormsComponents/FormsComponents.php';
        $components = new FormsComponents();
        $form_properties = [
            'login_form',
            'POST',
            '/admin/log_form',
            [
                $components->input('User email', 'email', 'login_email', 'login_email', false, 'email'),
                $components->input('User Password', 'password', 'login_pass', 'login_pass', false, 'password'),
                $components->input('', 'submit', 'login', 'login', 'LogIn', false),
                $components->input('', 'hidden', 'crypt', 'crypt', false, false)
            ]
        ];
        require_once 'Application/Components/Forms/Forms.php';
        $form = new Forms(...$form_properties);
        return $form->formBuild();
    }

    public function getForm($params)
    {
        /*check if crypts equals*/
        if($params['crypt']=== $_SESSION['LOGIN_CRYPT']){
         if( $this->model->adminExists(htmlspecialchars($params['login_pass']), htmlspecialchars($params['login_email']) )){
              header('Location: /admin');
         }else{
             unset($_SESSION['LOGIN_CRYPT']);
             header('Location: /admin/login');
         }
        }



    }
}
