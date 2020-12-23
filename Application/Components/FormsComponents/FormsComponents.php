<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/17/20
 * Time: 12:36 AM
 */


namespace Application\Components\FormsComponents;
require_once 'Application/Interfaces/FormsComponentsInterface.php';



class FormsComponents implements FormsComponentsInterface
{
   public function input(string $title, string $type, string $id, string $name,  $value = false,  $placeholder =false):string{
       $input ='';
       if(!in_array($type, [ 'hidden','submit'])) {
           $input = '<label for="' . $id . '">' . $title . '</label>';
       }
       $input .= '<input type="'.$type.'" id="'.$id.'" name="'.$name.'"';
       $input.= $value?' value="'.$value.'"':'';
       $input.= $placeholder?' placeholder="'.$placeholder.'"':'';
       if($type ==='checkbox' && $value){
           $input.='checked';
       }
       $input .='>';
       if(!in_array($type, [ 'hidden', 'submit', 'checkbpx'])) {
           $input.='<div class="error_box"></div>';
       }
       return $input;
   }
    public function textarea(string $title, string $id, string $name,  $value = false,  $placeholder =false):string{
        $input = '<label for="'.$id.'">'.$title.'</label>';
        $input .= '<textarea id="'.$id.'" name="'.$name.'"';
        $input.= $value?' value="'.$value.'"':'';
        $input.= $placeholder?' placeholder="'.$placeholder.'"':'';
        $input .='>'.$value.'</textarea>';
        return $input;
    }

}
