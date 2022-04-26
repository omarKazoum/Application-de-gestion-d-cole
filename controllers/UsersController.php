<?php

namespace controllers;
use core\DBManager;
use models\User;

require_once '../autoloader.php';
class UsersController
{
    public function listUsers(){
        $u=User::getById(1);
        $u->setUserName("some other user name");
        $u->setPassword("some pass");
        $u->save();
        view('listUsersView');
    }

}