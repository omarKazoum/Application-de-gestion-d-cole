<?php
namespace controllers;

use models\Student;

class StudentController{

    public function studentList(){
        if (isset($_GET['word'])) {
            view('student_list', true, ['data' => student::search($_GET['word'])]);
        }else{
            $data=student::getAll();
            view('student_list',true,['data'=>$data]);
        }
    }
  
    public function addStudentForm()
    {
       view('studentaddform',true);
    }

    public function SaveStudent(){
        $s1 = new Student();
        $s1->matricule=$_POST['matricule'];
        $s1->name=$_POST['name'];
        $s1->gender=$_POST['gender'];
        $s1->id_class=$_POST['id_class'];
        $s1->id_parents=$_POST['id_parents'];
        $s1->adresse=$_POST['adresse'];
        $s1->birthday=$_POST['birthday'];
        $s1->email=$_POST['email'];
        $s1->parent_name=$_POST['parent_name'];
        $s1->save();
        redirect('student');
        
    }

    public function delete(){
        $d=student::getById($_GET['id']);
        if($d){
            $d->delete();
            redirect('student');
        }else 
            echo 'student not existe';
    }

    public function formEdit(){
        $obj=student::getById($_GET['id']);
        view('updateformstudent',true,['stud'=>$obj]);
    }

     public function update(){
        $s1=student::getById($_POST['id']);
        $s1->matricule=$_POST['matricule'];
        $s1->name=$_POST['name'];
        $s1->gender=$_POST['gender'];
        $s1->id_class=$_POST['id_class'];
        $s1->id_parents=$_POST['id_parents'];
        $s1->adresse=$_POST['adresse'];
        $s1->birthday=$_POST['birthday'];
        $s1->email=$_POST['email'];
        $s1->parent_name=$_POST['parent_name'];
        $s1->save();
        redirect('student');
     }
    


}