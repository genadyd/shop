<?php


namespace Application\Components\Forms;


interface FormsInterface
{
    public function __construct(string $form_id, string $form_method = 'POST',string $fotm_action = '#',array $form_elements=[]);
    public function formBuild();

}
