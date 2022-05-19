<?php

namespace models;

use utils\Constants;

class SchoolClass extends EasyBaseModel
{
    protected static string $tableName = 'class';
    protected static array $columns=['name','description'];
    protected static string $idColumnName='id';
}