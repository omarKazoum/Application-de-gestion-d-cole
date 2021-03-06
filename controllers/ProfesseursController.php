<?php

namespace controllers;

use models\Professeur;

class ProfesseursController
{
  public function ListProfesseur()
  {
    $list_professeurs = NULL;
    if (isset($_GET['word'])) {
      $list_professeurs = Professeur::search($_GET['word']);
    } else {
      $list_professeurs = Professeur::getAll();
    }
    view('ListProfesseurs', true, ['ListProf' => $list_professeurs]);
  }
  public function AddProfesseur()
  {
    view('AddProfesseur', true);
  }
  public function AddProfesseurSave()
  {
    $Prof = new Professeur();

    $Prof->Matricule = self::Checkinput($_POST['Matricule']);
    $Prof->Nom_complet = self::Checkinput($_POST['Nom_complet']);
    $Prof->Genre = self::Checkinput($_POST['Genre']);
    $Prof->Class_id  = self::Checkinput($_POST['Class_id']);
    $Prof->Matiere = self::Checkinput($_POST['Matiere']);
    $Prof->Phone = self::Checkinput($_POST['Phone']);
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
    $prof->Matricule = self::Checkinput($_POST['Matricule']);
    $prof->Nom_complet = self::Checkinput($_POST['Nom_complet']);
    $prof->Genre = self::Checkinput($_POST['Genre']);
    $prof->Class_id  = self::Checkinput($_POST['Class_id']);
    $prof->Matiere = self::Checkinput($_POST['Matiere']);
    $prof->Phone = self::Checkinput($_POST['Phone']);
    $errors = false;
    if ($prof->Matricule == "" || $prof->Matricule == NULL) {
      $errors .= '<li>Check Matricule </li>';
    } else if ($prof->Nom_complet == "" || $prof->Nom_complet == NULL) {
      $errors .= '<li>Check Nom complet </li>';
    } else if ($prof->Genre == "" || $prof->Genre == NULL) {
      $errors .= '<li>Check Genre </li>';
    } else if ($prof->Class_id == "" || $prof->Class_id == NULL) {
      $errors .= '<li>Check Class id </li>';
    } else if ($prof->Matiere == "" || $prof->Matiere == NULL) {
      $errors .= '<li>Check Matriere </li>';
    } else if ($prof->Phone == "" || $prof->Phone == NULL) {
      $errors .= '<li>Check Phone </li>';
    }
    if (!$errors) {
      $prof->save();
      redirect('Professeurs?msg=proffessur Updated!');
    } else {

      view('FormUpdateProfesseur', true, ['error' => $errors, 'prof' => $prof]);
    }
  }

  public static function Checkinput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}