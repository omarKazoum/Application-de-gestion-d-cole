<?php

namespace controllers;

use models\Professeur;

class ProfesseursController
{
  public function ListProfesseur()
  {
    $list_professeurs = Professeur::getAll();
    view('ListProfesseurs', true, ['ListProf' => $list_professeurs]);
  }
  public function AddProfesseur()
  {
    view('AddProfesseur', true);
  }
}