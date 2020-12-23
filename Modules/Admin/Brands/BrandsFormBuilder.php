<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/19/20
 * Time: 8:51 AM
 */


namespace Admin\Brands;

require_once 'Application/Interfaces/ModuleFormBuilderInterface.php';
require_once 'Application/Components/FormsComponents/FormsComponents.php';
require_once 'Application/Components/Forms/Forms.php';

use Application\Components\Forms\Forms;
use Application\Components\Forms\ModuleFormBuilderInterface;
use Application\Components\FormsComponents\FormsComponents;

class BrandsFormBuilder implements ModuleFormBuilderInterface
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
      $brand_name =  $this->form_components_data['brand_name']??false;
      $brand_image = $this->form_components_data['brand_image']??false;
      $inputs = [
          $this->components->input('Brand name', 'text','brand_name','brand_name',$brand_name,'brand name' ),
          $this->components->input('Brand logo', 'file','brand_logo','brand_logo' ),
          $this->components->input('', 'hidden','crypt','crypt' ),
          $this->components->input('', 'submit','brand_submit','brand_submit','Submit' )
      ];

      $this->form_builder = new Forms($this->form_data['id'],$this->form_data['method'],$this->form_data['action'], $inputs);
      return $this->form_builder->formBuild();
  }
}
