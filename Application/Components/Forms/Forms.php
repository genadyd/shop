<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/17/20
 * Time: 1:13 AM
 */


namespace Application\Components\Forms;

use JetBrains\PhpStorm\Pure;

require 'Application/Interfaces/FormsInterface.php';

class Forms implements FormsInterface
{
    protected  $form_id;
    protected  $form_method;
    protected  $form_action;
    protected  $form_elements;

    public function __construct(string $form_id,
                                string $form_method = 'POST',
                                string $form_action = '#',
                                array $form_elements = []
    )
    {
        $this->form_id = $form_id;
        $this->form_method = $form_method;
        $this->form_action = $form_action;
        $this->form_elements = $form_elements;
    }

    public function formBuild():string
    {
        $form = '<form id="' . $this->form_id . '" class="main_form" method="' . $this->form_method . '" action="' . $this->form_action . '">';
        if(count($this->form_elements)>0){
            foreach ($this->form_elements as $form_component){
                $form.=$form_component;

            }
        }
        $form .= '</form>';
        return $form;
    }
}




