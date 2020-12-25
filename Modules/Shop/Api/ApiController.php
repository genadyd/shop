<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/23/20
 * Time: 7:23 PM
 */


namespace Shop\Api;


use Shop\Api\Models\BrandsModel;
use Shop\Api\Models\CategoriesModel;
use Shop\Api\Models\ProductsModel;
require_once 'Modules/Shop/Api/Models/BrandsModel.php';
require_once 'Modules/Shop/Api/Models/CategoriesModel.php';
require_once 'Modules/Shop/Api/Models/ProductsModel.php';
class ApiController
{
    protected $brands_model;
    protected $categories_model;
    protected $products_model;
    public function __construct()
    {
       $this->brands_model=new BrandsModel();
       $this->categories_model=new CategoriesModel();
       $this->products_model=new ProductsModel();
    }

    public function fillState(){
        echo json_encode( array(
            'brands'=>$this->brands_model->get(),
            'categories'=>$this->categories_model->get(),
            'products'=>$this->products_model->get()
    )
        );
   }
}
