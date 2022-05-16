<?php

namespace models;

class Persone extends EasyBaseModel
{
    //must override
    //table name
    protected  static string $tableName='persones';
    //column names except primary key
    protected static array $columns=['name','last_name','age'];
    // table primary key value
    protected static string $idColumnName='id';


}