<?php
require_once '../autoloader.php';

use controllers\ParentsController;
use controllers\ProfesseursController;
use core\Router;


//declare here your endpoints and their corresponding controller method
Router::get('error',function () {
    view('404', false);
});
Router::get('/', function () {
    redirect('login');
});
//for statistiques page
Router::get('statistiques/', [new \controllers\StatistquesController(), 'view'], 'stats');

//admin auth
Router::get('login',[new \controllers\AdminController(),'initLogin']);
Router::post('login',[new \controllers\AdminController(),'verifyLogin']);
//admin crud
Router::get('admin',[new \controllers\AdminController(),'initCrud']);
Router::post('admin/add',[new \controllers\AdminController(),'add']);
Router::post('admin/delete',[new \controllers\AdminController(),'delete']);
Router::post('admin/update',[new \controllers\AdminController(),'update']);
//Router::post('admin/crud/delete',[new \controllers\AdminController(),'delete']);
//Router::post('admin/crud/patch',[new \controllers\AdminController(),'patch']);
Router::get('classes', [new \controllers\ClassesController(), 'getAll'], 'classes');
Router::get('classes/delete/{id}', [new \controllers\ClassesController(), 'delete'], 'classes');
Router::get('classes/edit/{id}', [new \controllers\ClassesController(), 'editForm'], 'classes');
Router::post('classes/edit', [new \controllers\ClassesController(), 'editSubmit'], 'classes');
Router::get('classes/add', [new \controllers\ClassesController(), 'addForm'], 'classes');
Router::post('classes/add', [new \controllers\ClassesController(), 'addSubmit'], 'classes');
//admin
Router::get('admin/login', [new \controllers\AdminController(), 'initLogin'],'auth');
Router::post('admin/login', [new \controllers\AdminController(), 'verifyLogin'],'auth');

// parente
Router::get('parents',[new ParentsController,'listParents']);
Router::get('formaddparente',[new ParentsController,'addFormParent']);
Router::post('formsaveparente',[new ParentsController,'addParentSave']);
Router::get('parentdelete',[new ParentsController,'delete']);
Router::get('parentupdate',[new ParentsController,'formEdit']);
Router::post('parentsubmitupdate',[new ParentsController,'update']);



//professeurs
Router::get('Professeurs', [new ProfesseursController(), 'ListProfesseur'], 'professeur');
Router::get('AddProfesseur', [new ProfesseursController(), 'AddProfesseur'], 'professeur');
Router::post('Professeurs/add', [new ProfesseursController(), 'AddProfesseurSave'], 'professeur');
Router::get('Professeurs/add', [new ProfesseursController(), 'AddProfesseurForm'], 'professeur');
Router::get('Professeurs/edit/{id}', [new ProfesseursController(), 'EditProfesseur'], 'professeur');
Router::post('Professeurs/edit', [new ProfesseursController(), 'EditProfesseurSubmit'], 'professeur');
//Etudiant
Router::get('student', [new  \controllers\StudentController, 'studentList']);
Router::get('formaddstudent', [new \controllers\StudentController, 'addStudentForm']);
Router::post('savestudents', [new \controllers\StudentController, 'SaveStudent']);
Router::get('studentdelete', [new \controllers\StudentController, 'delete']);
Router::get('studentupdate', [new \controllers\StudentController, 'formEdit']);
Router::post('studentupdatesubmit', [new \controllers\StudentController, 'update']);