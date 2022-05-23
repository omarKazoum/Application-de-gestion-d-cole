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
        $bar = Admin::getBy('email', $email);
        if (!empty($bar) && password_verify($password, $bar[0]->passwordHash)){
            SessionManager::getInstance()->login($bar[0]->id);
            redirect("/admin");
        }
        view('login',false, array("err" => true));
    }
    public function initCrud(){
        if (isset($_GET['word'])){
            $foo = Admin::search($_GET['word']);
        } else {
            $foo = Admin::getAll();
        }
        view('adminCrud',true, array("admins" => $foo));
    }
    public function add(){
        $foo = new Admin();
        $foo->nom = $_POST['nom'];
        $foo->prenom = $_POST['prenom'];
        $foo->email = $_POST['email'];
        $foo->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $foo->role = $_POST['role'];
        $foo->add();
        redirect("admin");
    }
    public function delete(){
        $foo = new Admin();
        $foo->id = $_POST['admin-id'];
        $foo->delete();
        redirect("admin");
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
        redirect("admin");
    }
}