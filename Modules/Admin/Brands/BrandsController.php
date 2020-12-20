<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/19/20
 * Time: 8:10 AM
 */


namespace Admin\Brands;
use Admin\ControllersInterface\AdminControllersInterface;
use Images\ImageUploader;
require_once 'Application/Interfaces/AdminControllersInterface.php';
require_once 'Modules/Admin/Brands/BrandsFormBuilder.php';
require_once 'Application/Components/ImageUploader/ImageUploader.php';
require_once 'Modules/Admin/Brands/BrandsModel.php';
require_once 'Application/Traits/checkFormSequreTrait.php';

class BrandsController implements AdminControllersInterface
{
    use \adminCheckIfLogged;
    use \checkFormSequreTrait;
    protected $model;
    protected $module_name;
    public function __construct()
    {
        $this->model = new BrandsModel();
        $this->module_name = 'brands';
    }
/*
 * get brands list
 * */
    public function index():void{
        if(!$this->isLogged()) header('Location: /admin/login');
        $component_name = 'index';
        $brands = $this->model->getAll();
        $style_url = '/Modules/Admin/src/styles/brands/'.$this->module_name.'.css';
        ob_start();
         require_once 'Modules/Admin/views/content/brand_component.php';
        $content = ob_get_clean();
        require('Modules/Admin/views/layout/main_template.php');
    }
    /*
     * get new brand form
     * */
    public function add():void{
        if(!$this->isLogged()) header('Location: /admin/login');
        $f= new BrandsFormBuilder(['id'=>'new_brand','method'=>'POST','action'=>'/admin/brands/add']);
        $form = $f->build();
        $component_name = 'add';
        $content = $form;
        require('Modules/Admin/views/layout/main_template.php');
    }
    /*
     * add form data
     * @var $params - params from form
     * */
    public function add_form(array $params):void{
        if(!$this->checkForm($params['crypt'])) return;
        $uploader = new ImageUploader($_FILES['brand_logo'],'files/brands/');
        $file_path = ($uploader->fileDataSave())? '/'.$uploader->fileDataSave():null;
        if($this->model->add($params['brand_name'], $file_path)){
            header('Location:/admin/brands');
        }
    }
    /*
     * get edit form with brand data by id
     * */
    public function edit(array $params):void{
        if(!$this->isLogged()) header('Location: /admin/login');
        if(isset($params['id'])){
            $brand_data = $this->model->detOne((int)$params['id']);
            $f= new BrandsFormBuilder(['id'=>'edit_brand','method'=>'POST','action'=>"/admin/brands/edit_form/".$params['id']],
            ['brand_name'=>$brand_data['brand_name']]);
            $form = $f->build();
            $component_name = 'edit';
            $content = $form;
            require('Modules/Admin/views/layout/main_template.php');
        }
    }
    public function edit_form(array $params):void{
        if(!$this->checkForm($params['crypt'])) return;
        if(isset($params['id'])){
            $file_path = '';
            if(isset($_FILES['brand_logo']) && $_FILES['brand_logo']['name']){
                $uploader = new ImageUploader($_FILES['brand_logo'],'files/brands/');
                $file_path = ($uploader->fileDataSave())? '/'.$uploader->fileDataSave():null;
            }
            if($this->model->edit($params['id'], $params['brand_name'], $file_path)===0){
                header('Location:/admin/brands');
            }
        }
    }
    public function delete(array $params):void{

        if($this->model->delete((int) $params['id'])){
            header('Location:/admin/brands');
        }


    }
}
