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
Router::get('classes',[new \controllers\ClassesController(),'getAll'],'classes');
Router::get('classes/delete/{id}',[new \controllers\ClassesController(),'delete'],'classes');
Router::get('classes/edit/{id}',[new \controllers\ClassesController(),'editForm'],'classes');
Router::post('classes/edit',[new \controllers\ClassesController(),'editSubmit'],'classes');
Router::get('classes/add',[new \controllers\ClassesController(),'addForm'],'classes');
Router::post('classes/add',[new \controllers\ClassesController(),'addSubmit'],'classes');
//admin
Router::get('admin/login',[new \controllers\AdminController(),'initLogin']);
Router::post('admin/login',[new \controllers\AdminController(),'verifyLogin']);

// parente
Router::get('formaddparente',[new ParentsController,'addForm']);
Router::post('formaddparente',[new ParentsController,'addSave']);

Router::get('parentdelete/{id}',[new ParentsController,'delete']);
Router::get('parentupdate',[new ParentsController,'update']);



//professeurs
Router::get('Professeurs', [new ProfesseursController(), 'ListProfesseur']);
Router::get('Professeurs/delete/{id}', [new ProfesseursController(), 'DeleteProfesseur']);
Router::get('Professeurs/edit/{id}', [new ProfesseursController(), 'EditProfesseur']);
Router::post('Professeurs/edit', [new ProfesseursController(), 'EditProfesseurSubmit']);
Router::get('Professeurs/add', [new ProfesseursController(), 'AddProfesseur']);
Router::post('Professeurs/add', [new ProfesseursController(), 'AddProfesseurSubmit']);
