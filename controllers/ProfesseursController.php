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
    if ($this->chekckInput($Prof->Matricule)) {
      $errors .= '<li>Check Matricule </li>';
    } else if ($this->chekckInput($Prof->Nom_complet)) {
      $errors .= '<li>Check Nom complet </li>';
    } else if ($this->chekckInput($Prof->Genre)) {
      $errors .= '<li>Check Genre </li>';
    } else if ($this->chekckInput($Prof->Class_id)) {
      $errors .= '<li>Check Class id </li>';
    } else if ($this->chekckInput($Prof->Matriere)) {
      $errors .= '<li>Check Matriere </li>';
    } else if ($this->chekckInput($Prof->Phone)) {
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
  public function DeleteProfesseur($id)
  {
    $Dp = Professeur::getById($id);
    if ($Dp) {
      $Dp->delete();
      redirect('Professeurs');
    }
  }
  public function UpdateProfesseur($id)
  {
    $Prof = Professeur::getById($id);
    if ($Prof) {
      view('FormUpdateProfesseur', true, ['prof' => $Prof]);
    } else {
      view('404');
    }
  }
  public function UpdateProfSave($id)
  {
    $prof = Professeur::getById($id);
    $prof->Matricule = $_POST['Matricule'];
    $prof->Nom_complet = $_POST['Nom_complet'];
    $prof->Genre = $_POST['Genre'];
    $prof->Class_id  = $_POST['Class_id'];
    $prof->Matiere = $_POST['Matiere'];
    $prof->Phone = $_POST['Phone'];
    $errors = false;
    if ($this->chekckInput($prof->Matricule)) {
      $errors .= '<li>Check Matricule </li>';
    } else if ($this->chekckInput($prof->Nom_complet)) {
      $errors .= '<li>Check Nom complet </li>';
    } else if ($this->chekckInput($prof->Genre)) {
      $errors .= '<li>Check Genre </li>';
    } else if ($this->chekckInput($prof->Class_id)) {
      $errors .= '<li>Check Class id </li>';
    } else if ($this->chekckInput($prof->Matriere)) {
      $errors .= '<li>Check Matriere </li>';
    } else if ($this->chekckInput($prof->Phone)) {
      $errors .= '<li>Check Phone </li>';
    }
    if (!$errors) {
      $prof->save();
      redirect('Professeurs?msg=proffessur Updated!');
    } else {

      view('FormUpdateProfesseur', true, ['error' => $errors]);
    }
  }
  function chekckInput($value): bool
  {
    return isset($value) or $value != " " or $value != NULL;
  }
}