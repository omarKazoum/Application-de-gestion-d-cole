<?php

namespace controllers;

use models\Professeur;
use models\SchoolClass;
use models\Student;

class StatistquesController
{
    function view(){
        //profs bar diagram
        $proffesseursList=Professeur::getAll();
        $profsCount=count($proffesseursList);
        //classess bar diagram
        $classesList=SchoolClass::getAll();
        $classesCount=count($classesList);
        //students
        $StudentsList=Student::getAll();

        //bars diagram
        $classStudentsCounts=array();
        foreach ($classesList as $c){
            $studentsWithClassId=count(Student::getBy('id_class',$c->id));
            $classStudentsCounts[$c->name]=$studentsWithClassId;
        }
        $classStudentsJSArrayString='[';
        $classesNamesJSArrayString='[';
        foreach ($classStudentsCounts as $name => $count){
                    $classStudentsJSArrayString .= "$count,";
                    $classesNamesJSArrayString .= "'$name',";
        }
        $classesNamesJSArrayString.=']';
        $classStudentsJSArrayString.=']';
        //students with type pie chart
        $studentsList=Student::getAll();
        //make this count males only
        $studentsFemale=0;
        $studentsMale=0;
        foreach ($studentsList as $s){
            if($s->gender=='homme')
                $studentsFemale++;
            else
                $studentsMale++;

        }

        $studentsCount=count($studentsList);

        view('statistiques',true,
            ['studentsCount'=>$studentsCount,
                'studentsMale'=>$studentsMale,
                'studentsFemale'=>$studentsFemale,
                'classesCount'=>$classesCount,
                'profsCount'=>$profsCount,
                'classStudentsCounts'=>$classStudentsJSArrayString,
                'classesNames'=>$classesNamesJSArrayString]);
    }
}