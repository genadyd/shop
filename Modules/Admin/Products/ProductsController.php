<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/20/20
 * Time: 9:23 AM
 */


namespace Admin\Products;
use Admin\ControllersInterface\AdminControllersInterface;
use Images\ImageUploader;

//use Images\ImageUploader;
require_once 'Application/Interfaces/AdminControllersInterface.php';
require_once 'Modules/Admin/Products/ProductsFormBuilder.php';
require_once 'Application/Components/ImageUploader/ImageUploader.php';
require_once 'Modules/Admin/Products/ProductsModel.php';
require_once 'Application/Traits/checkFormSequreTrait.php';

class ProductsController implements AdminControllersInterface
{
    use \adminCheckIfLogged;
    use \checkFormSequreTrait;
    protected $model;
    protected $module_name;
    public function __construct()
    {
        $this->model = new ProductsModel();
        $this->module_name = 'products';
    }
    public function index(): void
    {
        if(!$this->isLogged()) header('Location: /admin/login');
        $component_name = 'index';
        $products = $this->model->getAll();
        $style_url = '/Modules/Admin/src/styles/products/'.$this->module_name.'.css';
        ob_start();
        require_once 'Modules/Admin/views/content/product_component.php';
        $content = ob_get_clean();

        require('Modules/Admin/views/layout/main_template.php');
    }

    public function add(): void
    {
        if(!$this->isLogged()) header('Location: /admin/login');
        $brands = $this->model->getBrands();
        $categories = $this->model->getCategories();
        ob_start();
        require_once 'Modules/Admin/views/content/product_brands_categories_component.php';
        $content = ob_get_clean();

        $f= new ProductsFormBuilder(['id'=>'new_product','method'=>'POST','action'=>'/admin/products/add']);
        $form = $f->build();
        $component_name = 'add';
        $content .= $form;
        require('Modules/Admin/views/layout/main_template.php');
    }

    public function add_form(array $params): void
    {
        if(!$this->checkForm($params['crypt'])) return;
        $uploader = new ImageUploader($_FILES['product_image'],'files/products/');
        $file_path = ($uploader->fileDataSave())? '/'.$uploader->fileDataSave():null;
        if($this->model->add($params, $file_path)){
            header('Location:/admin/products');
        }
    }

    public function edit(array $params): void
    {
        // TODO: Implement edit() method.
    }

    public function edit_form(array $params): void
    {
        // TODO: Implement edit_form() method.
    }
}
