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
        header("ContentType:appication/json");
        $a=array("name"=>"omar"/*,"lastName"=>"kazoum"*/);
        echo json_encode($a);
    }



}