<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/20/20
 * Time: 1:00 AM
 */


namespace Admin\Categories;

use Admin\ControllersInterface\AdminControllersInterface;

require_once 'Application/Interfaces/AdminControllersInterface.php';
require_once 'Modules/Admin/Categories/CategoriesFormBuilder.php';
require_once 'Modules/Admin/Categories/CategoriesModel.php';
require_once 'Application/Traits/checkFormSequreTrait.php';

class CategoriesController implements AdminControllersInterface
{
    use \adminCheckIfLogged;
    use \checkFormSequreTrait;

    protected $model;
    protected $module_name;

    public function __construct()
    {
        $this->model = new CategoriesModel();
        $this->module_name = 'categories';
    }

    public function index(): void
    {
        if (!$this->isLogged()) header('Location: /admin/login');
        $component_name = 'index';
        $categories = $this->model->getAll();
        $style_url = '/Modules/Admin/src/styles/categories/' . $this->module_name . '.css';
        ob_start();
        require_once 'Modules/Admin/views/content/categories_component.php';
        $content = ob_get_clean();
        require('Modules/Admin/views/layout/main_template.php');
    }

    public function add(): void
    {
        if (!$this->isLogged()) header('Location: /admin/login');
        $f = new CategoriesFormBuilder(['id' => 'new_category', 'method' => 'POST', 'action' => '/admin/categories/add']);
        $form = $f->build();
        $component_name = 'add';
        $content = $form;
        require('Modules/Admin/views/layout/main_template.php');
    }

    public function add_form(array $params): void
    {
        if (!$this->checkForm($params['crypt'])) return;
        if ($this->model->add($params)) {
            header('Location:/admin/categories');
        }
    }
    public function edit(array $params): void
    {
        if (!$this->isLogged()) header('Location: /admin/login');
        if (isset($params['id'])) {
            $category_data = $this->model->detOne((int)$params['id']);
            $f = new CategoriesFormBuilder(['id' => 'edit_brand', 'method' => 'POST', 'action' => "/admin/categories/edit_form/" . $params['id']],
                ['category_name' => $category_data['category_name'], 'category_description' => $category_data['category_description']]);
            $form = $f->build();
            $component_name = 'edit';
            $content = $form;
            require('Modules/Admin/views/layout/main_template.php');
        }
    }

    public function edit_form(array $params): void
    {
        if (!$this->checkForm($params['crypt'])) return;
        if (isset($params['id'])) {
            if ($this->model->edit($params) === 0) {
                header('Location:/admin/categories');
            }
        }
    }
    public function delete(array $params): void
    {
        if ($this->model->delete((int)$params['id'])) {
            header('Location:/admin/categories');
        }


    }
}
