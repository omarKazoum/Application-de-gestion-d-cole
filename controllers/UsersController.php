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
        echo css('test');
        //view('listUsersView');
    }
    public function test(){
        $t=new models\TestModel();
        $t->name='omarrrr';
        $t->email='sqd';
        $t->setId(1);
        $t->save();
    }



}