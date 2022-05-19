<?php

namespace models;

class Professeur extends EasyBaseModel
{
  protected  static string $tableName = 'professeurs';
  protected static array $columns = ['Matricule', 'Nom_complet', 'Genre', 'Class_id', 'Matiere', 'Phone'];
  protected static string $idColumnName = 'id';
}