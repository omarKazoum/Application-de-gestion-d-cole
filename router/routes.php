<?php
require_once '../autoloader.php';
require_once '../autoloader.php';
use core\Router;
use \controllers\PersonController;

Router::get('persons',[new PersonController(),'list_persons']);
Router::get('personAdd',[new PersonController(),'addForm']);
Router::post('personAddSubmit',[new PersonController(),'addSubmit']);
Router::get('deletePer',[new PersonController(),'delete']);
Router::get('editPer',[new PersonController(),'updateForm']);
Router::post('personUpdateSubmit',[new PersonController(),'updateSubmit']);




