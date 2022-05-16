<?php
namespace controllers;
use models\Persone;

class PersonController
{
    function list_persons(){
        $data=Persone::getAll();
        view('list_persons',true,['data'=>$data]);

    }
    function addForm(){
        view('add_person_form',true,[]);
    }
    function addSubmit(){
        $p=new Persone();
        $p->name=$_POST['name'];
        $p->last_name=$_POST['last_name'];
        $p->age=$_POST['age'];
        $p->save();
        redirect('persons');
     }
     function delete(){
        $p=Persone::getById($_GET['id']);
        $p->delete();
         redirect('persons');
     }
     function updateForm(){
         $p=Persone::getById($_GET['id']);
         view('update_person_form',true,['per'=>$p]);
     }
    function updateSubmit(){
        if(false) {
            $p = Persone::getById($_POST['id']);
            $p->name = $_POST['name'];
            $p->last_name = $_POST['last_name'];
            $p->age = $_POST['age'];
            $p->save();
            redirect('persons');
        }else{
            $errors='<li>some errors</li>';
            $errors.='<li>some errors</li>';
            view('update_person_form',true,['msg'=>$errors]);
        }
    }

}