<?php
namespace models;
class Parente extends EasyBaseModel{ 
    protected  static string $tableName='parents';
    protected static array $columns=['matricule','nom_complet','genre','job','adresse','phone'];
    protected static string $idColumnName='id';
}