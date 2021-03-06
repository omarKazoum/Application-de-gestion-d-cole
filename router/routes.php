<?php
require_once '../autoloader.php';

use controllers\ParentsController;
use controllers\ProfesseursController;
use utils\SessionManager;
use core\Router;


//declare here your endpoints and their corresponding controller method
Router::get('error', function () {
    view('404', false);
});
Router::get('/', function () {
    viewNoSidebar('landing');
});
//for statistiques page
Router::get('statistiques/', [new \controllers\StatistquesController(), 'view'], 'stats');
Router::setAuthenticationRequired('stats');
//admin auth
Router::get('login', [new \controllers\AdminController(), 'initLogin']);
Router::post('login', [new \controllers\AdminController(), 'verifyLogin']);
//admin crud
Router::get('admin',[new \controllers\AdminController(),'initCrud'], 'admin');
Router::post('admin/add',[new \controllers\AdminController(),'add'], 'admin');
Router::post('admin/delete',[new \controllers\AdminController(),'delete'], 'admin');
Router::post('admin/update',[new \controllers\AdminController(),'update'], 'admin');
Router::setAuthenticationRequired("admin");
//Router::post('admin/crud/delete',[new \controllers\AdminController(),'delete']);
//Router::post('admin/crud/patch',[new \controllers\AdminController(),'patch']);
Router::get('classes', [new \controllers\ClassesController(), 'getAll'], 'classes');
Router::get('classes/delete/{id}', [new \controllers\ClassesController(), 'delete'], 'classes');
Router::get('classes/edit/{id}', [new \controllers\ClassesController(), 'editForm'], 'classes');
Router::post('classes/edit', [new \controllers\ClassesController(), 'editSubmit'], 'classes');
Router::get('classes/add', [new \controllers\ClassesController(), 'addForm'], 'classes');
Router::post('classes/add', [new \controllers\ClassesController(), 'addSubmit'], 'classes');
Router::setAuthenticationRequired("classes");
// parente

Router::get('parents', [new ParentsController, 'listParents'], 'parents');
Router::get('formaddparente', [new ParentsController, 'addFormParent'], 'parents');
Router::post('formsaveparente', [new ParentsController, 'addParentSave'], 'parents');
Router::get('parentdelete', [new ParentsController, 'delete'], 'parents');
Router::get('parentupdate', [new ParentsController, 'formEdit'], 'parents');
Router::post('parentsubmitupdate', [new ParentsController, 'update'], 'parents');
Router::setAuthenticationRequired("parents");
//professeurs
Router::get('Professeurs', [new ProfesseursController(), 'ListProfesseur'], 'professeur');
Router::get('AddProfesseur', [new ProfesseursController(), 'AddProfesseur'], 'professeur');
Router::post('Professeurs/add', [new ProfesseursController(), 'AddProfesseurSave'], 'professeur');
Router::get('Professeurs/add', [new ProfesseursController(), 'AddProfesseurForm'], 'professeur');
Router::post('Professeurs/edit/{id}', [new ProfesseursController(), 'UpdateProfSave'], 'professeur');
Router::get('Professeurs/edit/{id}', [new ProfesseursController(), 'UpdateProfesseur'], 'professeur');
Router::get('Professeurs/delete/{id}', [new ProfesseursController(), 'DeleteProfesseur'], 'professeur');
Router::setAuthenticationRequired("professeur");
//Etudiant
Router::get('student', [new  \controllers\StudentController, 'studentList'],'student');
Router::get('formaddstudent', [new \controllers\StudentController, 'addStudentForm'],'student');
Router::post('savestudents', [new \controllers\StudentController, 'SaveStudent'],'student');
Router::get('studentdelete', [new \controllers\StudentController, 'delete'],'student');
Router::get('studentupdate', [new \controllers\StudentController, 'formEdit'],'student');
Router::post('studentupdatesubmit', [new \controllers\StudentController, 'update'],'student');
Router::setAuthenticationRequired("student");

//logout
Router::get('logout', function(){
    SessionManager::getInstance()->logOut();
    redirect("login");
});
