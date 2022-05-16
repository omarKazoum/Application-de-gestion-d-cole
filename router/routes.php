<?php
require_once '../autoloader.php';

use controllers\ParentsController;
use controllers\ProfesseursController;
use core\Router;


//declare here your endpoints and their corresponding controller method
Router::get('error',function (){
    view('404',false);});
Router::get('/',function(){
    redirect('admin/login');
});
//for statistiques page
Router::get('statistiques/',[new \controllers\StatistquesController(),'view'],'stats');
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
Router::post('admin/crud/add',[new \controllers\AdminController(),'add']);
Router::post('admin/crud/delete',[new \controllers\AdminController(),'delete']);
Router::post('admin/crud/update',[new \controllers\AdminController(),'update']);
//Router::post('admin/crud/delete',[new \controllers\AdminController(),'delete']);
//Router::post('admin/crud/patch',[new \controllers\AdminController(),'patch']);
