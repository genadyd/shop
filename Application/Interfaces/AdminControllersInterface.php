<?php


namespace Admin\ControllersInterface;


interface AdminControllersInterface
{
public function index():void;
public function add():void;
public function add_form(array $params):void;
public function edit(array $params):void;
public function edit_form(array $params):void;
}
