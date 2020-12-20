<?php


namespace Application\Components\Forms;


interface ModuleFormBuilderInterface
{
    public function __construct(array $form_data,  array $form_components_data=[]);
    public function build();

}
