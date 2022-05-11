<?php

namespace models;

class TestModel extends EasyBaseModel
{
    protected static string $tableName='test';
    protected static array $columns=['name','email'];

}