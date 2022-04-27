<?php

namespace controllers;
use core\DBManager;
use models\User;
use utils\SessionManager;
require_once '../autoloader.php';
use models;
class UsersController
{
    public function listUsers($id){
        $a=new azzedine();
        SessionManager::getInstance()->login(23);
        $id=SessionManager::getInstance()->getLoggedInUserId();
        $user=User::getById($id);
        view('listUsersView',['id'=>$id,"user"=>$user]);
    }



}