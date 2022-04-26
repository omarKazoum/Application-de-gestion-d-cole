<?php
require_once '../autoloader.php';
use router\Router;
Router::get("users",[new \controllers\UsersController(),"listUsers"]);

