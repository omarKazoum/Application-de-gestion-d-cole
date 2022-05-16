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
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $bar = Admin::getByEmail($email);
        if ($bar && password_verify($password,$bar->getPasswordHash())){
            $_SESSION['admin_obs'] = $bar;
            redirect("admin/crud");
        }
        view('login',false, array("err" => true));
    }
    public function initCrud(){
        $foo = Admin::getAll();
        view('adminCrud',false, array("admins" => $foo));
    }
}