<?php

namespace models;

require('../autoloader.php');

class Professeur extends BaseModel
{
  public $matricule;
  public $nom_complet;
  public $genre;
  public $class_id;
  public $matière;
  public $phone;
  public $table_name = "	professeurs	";

  function AddProfesseurs()
  {
  }
}