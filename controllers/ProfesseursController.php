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
    // if ($this->CheckInput($Prof->Matricule) || $this->CheckInput($Prof->Nom_complet) || $this->CheckInput($Prof->Genre) || $this->CheckInput($Prof->Class_id) || $this->CheckInput($Prof->Matiere) || $this->CheckInput($Prof->Phone)) {
    //   $errors .= '<li>Check Form </li>' . $this->data;
    // }
    // if (!$errors) {
    $Prof->save();
    redirect('Professeurs?msg=proffessur added!');
    // } else {

    view('AddProfesseur', true, ['error' => $errors]);
    //}
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
    // if ($this->CheckInput($prof->Matricule) || $this->CheckInput($prof->Nom_complet) || $this->CheckInput($prof->Genre) || $this->CheckInput($prof->Class_id) || $this->CheckInput($prof->Matiere) || $this->CheckInput($prof->Phone)) {
    //   $errors .= '<li> Check </li>' . $this->data;
    // }
    // if (!$errors) {
    $prof->save();
    redirect('Professeurs?msg=proffessur Updated!');
    // } else {

    view('FormUpdateProfesseur', true, ['error' => $errors]);
    // }
  }

  public static function CheckInput($data)
  {
    if ($data == " " || $data == NULL) {
      return false;
    } else return true;
  }
}