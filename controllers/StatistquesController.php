<?php

namespace controllers;

use models\Professeur;
use models\SchoolClass;
use models\Student;

class StatistquesController
{
    function view(){
        //profs bar diagram
        $profsCount=Professeur::getAll()?count(Professeur::getAll()):0;
        //classess bar diagram
        $classesCount=SchoolClass::getAll()?count(SchoolClass::getAll()):0;
        //TODO:: continue this
        //bars diagram
        $classStudentsCounts=array();
        foreach (SchoolClass::getAll() as $c){
            $studentsWithClassId=Student::getBy('id_class',$c->id);
            $classStudentsCounts[]=[$c->name=>$studentsWithClassId?count($studentsWithClassId):0];
        }
        //$classStudentsCounts=['class1'=>12,'class2'=>22];
        $classStudentsJSArrayString='[';
        $classesNamesJSArrayString='[';
        foreach ($classStudentsCounts as $name => $count){
            $classStudentsJSArrayString.="$count,";
            $classesNamesJSArrayString.="'$name',";
        }
        $classesNamesJSArrayString.=']';
        $classStudentsJSArrayString.=']';
        //students with type pie chart
        $studentsFemale=90;
        $studentsMale=21;
        $studentsCount=9;

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