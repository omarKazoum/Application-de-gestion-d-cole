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
    if (isset($Prof->Matricule) || empty($Prof->Matricule) || isset($Prof->MatrNom_completicule) || empty($Prof->Nom_complet) || isset($Prof->Genre) || empty($Prof->Genre) || isset($Prof->Class_id) || empty($Prof->Class_id) || isset($Prof->Matiere) || empty($Prof->Matiere) || isset($Prof->Phone) || empty($Prof->Phone)) {
      $errors .= '<li>Check Form </li>';
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
    if (isset($prof->Matricule) || empty($prof->Matricule) || isset($prof->MatrNom_complet) || empty($prof->Nom_complet) || isset($prof->Genre) || empty($prof->Genre) || isset($prof->Class_id) || empty($prof->Class_id) || isset($prof->Matiere) || empty($prof->Matiere) || isset($prof->Phone) || empty($prof->Phone)) {
      $errors .= '<li>Check Form </li>';
    }
    if (!$errors) {
      $prof->save();
      redirect('Professeurs?msg=proffessur Updated!');
    } else {

      view('FormUpdateProfesseur', true, ['error' => $errors]);
    }
  }
}