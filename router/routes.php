<?php
require_once '../autoloader.php';

use controllers\ProfesseursController;
use core\Router;
//declare here your endpoints and their corresponding controller method

Router::get("users/", [new \controllers\UsersController(), "listUsers"]);
Router::get("test/", [new \controllers\UsersController(), "test"]);
Router::get('error', function () {
    view('404', false);
});
//for statistiques page
Router::get('statistiques/', [new \controllers\StatistquesController(), 'view']);
//for classes crud
Router::get('classes', [new \controllers\ClassesController(), 'getAll']);
Router::get('classes/delete/{id}', [new \controllers\ClassesController(), 'delete']);
Router::get('classes/edit/{id}', [new \controllers\ClassesController(), 'editForm']);
Router::post('classes/edit', [new \controllers\ClassesController(), 'editSubmit']);
Router::get('classes/add', [new \controllers\ClassesController(), 'addForm']);
Router::post('classes/add', [new \controllers\ClassesController(), 'addSubmit']);
//admin
Router::get('admin/login', [new \controllers\AdminController(), 'initLogin']);
Router::post('admin/login', [new \controllers\AdminController(), 'verifyLogin']);
//professeurs
Router::get('Professeurs', [new ProfesseursController(), 'ListProfesseur']);
Router::get('Professeurs/delete/{id}', [new ProfesseursController(), 'DeleteProfesseur']);
Router::get('Professeurs/edit/{id}', [new ProfesseursController(), 'EditProfesseur']);
Router::post('Professeurs/edit', [new ProfesseursController(), 'EditProfesseurSubmit']);
Router::get('Professeurs/add', [new ProfesseursController(), 'AddProfesseur']);
Router::post('Professeurs/add', [new ProfesseursController(), 'AddProfesseurSubmit']);