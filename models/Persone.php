<?php

namespace models;

class Persone extends EasyBaseModel
{
    //must override
    protected  static string $tableName='persones';
    protected static array $columns=['name','last_name','age'];
    protected static string $idColumnName='id';


}