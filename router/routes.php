<?php
require_once '../autoloader.php';
use core\Router;
//declare here your endpoints and their corresponding controller method

Router::get("users",[new \controllers\UsersController(),"listUsers"]);

