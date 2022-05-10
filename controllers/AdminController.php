<?php

namespace controllers;
use models\Admin;
use utils\SessionManager;
require_once '../autoloader.php';
class AdminController
{
    public function initLogin(){
        view('login',false, array());
    }
    public function verifyLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $bar = Admin::getByEmail($email);
        if ($bar && password_verify($password,$bar->getPasswordHash()))
            redirect("classes");
        view('login',false, array("err" => true));
    }
}