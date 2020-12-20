<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/20/20
 * Time: 9:24 AM
 */


namespace Admin\Products;
require_once 'Application/Interfaces/ModuleFormBuilderInterface.php';
require_once 'Application/Components/FormsComponents/FormsComponents.php';
require_once 'Application/Components/Forms/Forms.php';

use Application\Components\Forms\Forms;
use Application\Components\Forms\ModuleFormBuilderInterface;
use Application\Components\FormsComponents\FormsComponents;

class ProductsFormBuilder implements ModuleFormBuilderInterface
{
    protected  $form_data;
    protected  $form_components_data;
    protected  $components; /* FormsComponentsInterface type */
    protected  $form_builder; /*FormInterface*/
    public function __construct(array $form_data, array $form_components_data = [])
    {
        $this->form_components_data = $form_components_data;
        $this->components = new FormsComponents();
        $this->form_data = $form_data;
    }


    public function build()
    {
        $product_name =  $this->form_components_data['product_name']??false;
        $product_description =  $this->form_components_data['product_description']??false;
        $product_image = $this->form_components_data['product_image']??false;
        $product_quantity = $this->form_components_data['product_quantity']??false;
        $inputs = [
            $this->components->input('Product name', 'text','product_name','product_name',$product_name,'product name' ),
            $this->components->textarea('Product description','product_description','product_description',$product_description,'product description' ),
            $this->components->input('Product quantity', 'number','product_quantity','product_quantity',$product_quantity,'product quantity' ),
            $this->components->input('Product logo', 'file','product_image','product_image',$product_image ),
            $this->components->input('', 'hidden','brand','brand' ),
            $this->components->input('', 'hidden','category','category' ),
            $this->components->input('', 'hidden','crypt','crypt' ),
            $this->components->input('', 'submit','brand_submit','brand_submit','Submit' )
        ];

        $this->form_builder = new Forms($this->form_data['id'],$this->form_data['method'],$this->form_data['action'], $inputs);
        return $this->form_builder->formBuild();
    }
}
