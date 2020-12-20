<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/20/20
 * Time: 1:27 AM
 */

namespace Admin\Categories;

require_once 'Application/Interfaces/ModuleFormBuilderInterface.php';
require_once 'Application/Components/FormsComponents/FormsComponents.php';
require_once 'Application/Components/Forms/Forms.php';

use Application\Components\Forms\Forms;
use Application\Components\Forms\ModuleFormBuilderInterface;
use Application\Components\FormsComponents\FormsComponents;

class CategoriesFormBuilder implements ModuleFormBuilderInterface
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
        $category_name =  $this->form_components_data['category_name']??false;
        $category_description =  $this->form_components_data['category_description']??false;

        $inputs = [
            $this->components->input('Category name', 'text','category_name','category_name',$category_name,'category name' ),
            $this->components->input('Category description', 'text','category_description','category_description',$category_description,'category description' ),
            $this->components->input('', 'hidden','crypt','crypt' ),
            $this->components->input('', 'submit','category_submit','category_submit','Submit' )
        ];

        $this->form_builder = new Forms($this->form_data['id'],$this->form_data['method'],$this->form_data['action'], $inputs);
        return $this->form_builder->formBuild();
    }
}
