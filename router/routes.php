<?php
require_once '../autoloader.php';
use core\Router;
//declare here your endpoints and their corresponding controller method

Router::get("users/",[new \controllers\UsersController(),"listUsers"]);
Router::get("test/",[new \controllers\UsersController(),"test"]);
//for statistiques page
Router::get('statistiques/',[new \controllers\StatistquesController(),'view']);


