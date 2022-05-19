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
        $bar = Admin::getBy('email', $email);
        var_dump($bar);
        if ($bar && password_verify($password, password_hash($bar[0]->passwordHash, PASSWORD_DEFAULT))){
            $_SESSION['admin_obs'] = $bar;
            redirect("admin/crud");
        }
        view('login',false, array("err" => true));
    }
    public function initCrud(){
        $foo = Admin::getAll();
        view('adminCrud',true, array("admins" => $foo));
    }
    public function add(){
        $foo = new Admin();
        $foo->nom = $_POST['nom'];
        $foo->prenom = $_POST['prenom'];
        $foo->email = $_POST['email'];
        $foo->password = $_POST['password'];
        $foo->role = $_POST['role'];
        $foo->add();
        redirect("admin/crud");
    }
    public function delete(){
        $foo = new Admin();
        $foo->id = $_POST['admin-id'];
        $foo->delete();
        redirect("admin/crud");
    }
    public function update(){
        $foo = new Admin();
        $foo->id = $_POST['id'];
        $foo->nom = $_POST['nom'];
        $foo->prenom = $_POST['prenom'];
        $foo->email = $_POST['email'];
        $foo->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $foo->role = $_POST['role'];
        $foo->update();
        redirect("admin/crud");
    }
}