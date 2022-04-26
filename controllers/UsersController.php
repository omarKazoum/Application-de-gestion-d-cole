<?php

namespace controllers;
require_once '../autoloader.php';
class UsersController
{
    public function listUsers(){

        view('listUsersView');
    }

}