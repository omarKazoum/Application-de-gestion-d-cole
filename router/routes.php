<?php
require_once '../autoloader.php';
use core\Router;

//declare here your endpoints and their corresponding controller method
Router::get('error',function (){
    view('404',false);
});
Router::get('/',function(){
    redirect('admin/login');
});
//for statistiques page
Router::get('statistiques/',[new \controllers\StatistquesController(),'view'],'stats');
//for classes crud
Router::get('classes',[new \controllers\ClassesController(),'getAll'],'classes');
Router::get('classes/delete/{id}',[new \controllers\ClassesController(),'delete'],'classes');
Router::get('classes/edit/{id}',[new \controllers\ClassesController(),'editForm'],'classes');
Router::post('classes/edit',[new \controllers\ClassesController(),'editSubmit'],'classes');
Router::get('classes/add',[new \controllers\ClassesController(),'addForm'],'classes');
Router::post('classes/add',[new \controllers\ClassesController(),'addSubmit'],'classes');
//admin
Router::get('admin/login',[new \controllers\AdminController(),'initLogin']);
Router::post('admin/login',[new \controllers\AdminController(),'verifyLogin']);




