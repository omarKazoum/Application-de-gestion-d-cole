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
  public function AddProfesseurSave()
  {
    $Prof = new ProfesseursController();
    $Prof->Matricule = $_POST['Matricule'];
    $Prof->Nom_complet = $_POST['Nom_complet'];
    $Prof->Genre = $_POST['Genre'];
    $Prof->Class_id  = $_POST['Class_id '];
    $Prof->Matiere = $_POST['Matiere'];
    $Prof->Phone = $_POST['Phone'];
    $Prof->save();
    redirect('Professeur');
  }
}