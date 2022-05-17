<?php

namespace models;

class Student extends EasyBaseModel
{
    protected  static string $tableName='student';
    protected static array $columns=['matricule','name','gender','id_class','id_parents','adresse','birthday','email','parent_name'];
    protected static string $idColumnName='id';


}