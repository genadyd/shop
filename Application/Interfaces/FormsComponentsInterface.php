<?php


namespace Application\Components\FormsComponents;


interface FormsComponentsInterface
{
  public function input(string $title, string $type, string $id, string $name,  $value = false, $placeholder =false):string;/*html*/
  public function textarea(string $title, string $id, string $name,  $value = false, $placeholder =false):string;/*html*/
}
