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
    $Prof = new Professeur();

    $Prof->Matricule = $_POST['Matricule'];
    $Prof->Nom_complet = $_POST['Nom_complet'];
    $Prof->Genre = $_POST['Genre'];
    $Prof->Class_id  = $_POST['Class_id'];
    $Prof->Matiere = $_POST['Matiere'];
    $Prof->Phone = $_POST['Phone'];
    $errors = false;
    if ($Prof->Matricule == "" || $Prof->Matricule == NULL) {
      $errors .= '<li>Check Matricule </li>';
    } else if ($Prof->Nom_complet == "" || $Prof->Nom_complet == NULL) {
      $errors .= '<li>Check Nom complet </li>';
    } else if ($Prof->Genre == "" || $Prof->Genre == NULL) {
      $errors .= '<li>Check Genre </li>';
    } else if ($Prof->Class_id == "" || $Prof->Class_id == NULL) {
      $errors .= '<li>Check Class id </li>';
    } else if ($Prof->Matiere == "" || $Prof->Matiere == NULL) {
      $errors .= '<li>Check Matriere </li>';
    } else if ($Prof->Phone == "" || $Prof->Phone == NULL) {
      $errors .= '<li>Check Phone </li>';
    }
    if (!$errors) {
      $Prof->save();
      redirect('Professeurs?msg=proffessur added!');
    } else {

      view('AddProfesseur', true, ['error' => $errors]);
    }
  }
  public function AddProfesseurForm()
  {
    view('AddProfesseur');
  }
}