<?php

namespace controllers;

class StatistquesController
{
    function view(){
        //profs bar diagram
        $profsCount=10;
        //classess bar diagram
        $classesCount=80;
        //bars diagram
        $classStudentsCounts=['class1'=>12,'class2'=>22];
        $classStudents='[';
        $classesNames='[';
        foreach ($classStudentsCounts as $name => $count){
            $classStudents.="$count,";
            $classesNames.="'$name',";
        }
        $classesNames.=']';
        $classStudents.=']';
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
                'classStudentsCounts'=>$classStudents,
                'classesNames'=>$classesNames]);
    }
}