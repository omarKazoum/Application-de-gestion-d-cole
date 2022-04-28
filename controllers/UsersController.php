<?php

namespace controllers;
use core\DBManager;
use models\User;
use utils\SessionManager;
require_once '../autoloader.php';
use models;
class UsersController
{
    public function listUsers(){

        view('listUsersView');
    }



}