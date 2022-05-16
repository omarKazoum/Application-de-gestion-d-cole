<?php
require_once '../autoloader.php';
use core\Router;
//declare here your endpoints and their corresponding controller method

Router::get("users/",[new \controllers\UsersController(),"listUsers"]);
Router::get("test/",[new \controllers\UsersController(),"test"]);
Router::get('error',function (){
    view('404',false);
});
//for statistiques page
Router::get('statistiques/',[new \controllers\StatistquesController(),'view']);
//for classes crud
Router::get('classes',[new \controllers\ClassesController(),'getAll']);
Router::get('classes/delete/{id}',[new \controllers\ClassesController(),'delete']);
Router::get('classes/edit/{id}',[new \controllers\ClassesController(),'editForm']);
Router::post('classes/edit',[new \controllers\ClassesController(),'editSubmit']);
Router::get('classes/add',[new \controllers\ClassesController(),'addForm']);
Router::post('classes/add',[new \controllers\ClassesController(),'addSubmit']);

//admin auth
Router::get('admin/login',[new \controllers\AdminController(),'initLogin']);
Router::post('admin/login',[new \controllers\AdminController(),'verifyLogin']);
//admin crud
Router::get('admin/crud',[new \controllers\AdminController(),'initCrud']);
Router::post('admin/crud/add',[new \controllers\AdminController(),'crud']);
//Router::post('admin/crud/delete',[new \controllers\AdminController(),'delete']);
//Router::post('admin/crud/patch',[new \controllers\AdminController(),'patch']);