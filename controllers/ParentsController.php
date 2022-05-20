<?php

namespace controllers;

use models\Parente;

class ParentsController
{

    public function listParents()
    {
        $data = Parente::getAll();
        view('parents_list', true, ['data' => $data]);
    }

    public function addFormParent()
    {
        view('formaddparente', true);
    }

    public function addParentSave()
    {

        $p1 = new Parente();
        $p1->matricule = $_POST['matricule'];
        $p1->nom_complet = $_POST['nom_complet'];
        $p1->genre = $_POST['genre'];
        $p1->job = $_POST['job'];
        $p1->adresse = $_POST['adresse'];
        $p1->phone = $_POST['phone'];
        $errors = false;
        if ($p1->matricule == "" || $p1->matricule == NULL) {
            $errors .= '<span>Check Matricule </span>';
        } else if ($p1->nom_complet == "" || $p1->nom_complet == NULL) {
            $errors .= '<span>Check Nom complet </span>';
        } else if ($p1->genre == "" || $p1->genre == NULL) {
            $errors .= '<span>Check Genre </span>';
        } else if ($p1->job == "" || $p1->job == NULL) {
            $errors .= '<span>Check Job </span>';
        } else if ($p1->adresse == "" || $p1->adresse == NULL) {
            $errors .= '<span>Check Adresse </span>';
        } else if ($p1->phone == "" || $p1->phone == NULL) {
            $errors .= '<span>Check Phone </span>';
        }
        if (!$errors) {
            $p1->save();
            redirect('parents?msg=parent added successfully !');
        } else
            view('formaddparente', true, ['errors' => $errors]);
    }

    public function delete()
    {
        $d = Parente::getById($_GET['id']);
        if ($d) {
            $d->delete();
            redirect('parents');
        } else
            echo 'parente not existe';
    }

    public function formEdit()
    {
        $obj = Parente::getById($_GET['id']);
        view('formupdateparent', true, ['par' => $obj]);
    }

    public function update()
    {

        $p = Parente::getById($_POST['id']);
        $p->matricule = $_POST['matricule'];
        $p->nom_complet = $_POST['nom_complet'];
        $p->genre = $_POST['genre'];
        $p->job = $_POST['job'];
        $p->phone = $_POST['phone'];
        $p->adresse = $_POST['adresse'];
        $error = false;
        if ($p->matricule == "" || $p->matricule == NULL) {
            $error .= '<span>Check Matricule </span>';
        } else if ($p->nom_complet == "" || $p->nom_complet == NULL) {
            $error .= '<span>Check Nom complet </span>';
        } else if ($p->genre == "" || $p->genre == NULL) {
            $error .= '<span>Check Genre </span>';
        } else if ($p->job == "" || $p->job == NULL) {
            $error .= '<span>Check Job </span>';
        } else if ($p->adresse == "" || $p->adresse == NULL) {
            $error .= '<span>Check Adresse </span>';
        } else if ($p->phone == "" || $p->phone == NULL) {
            $error .= '<span>Check Phone </span>';
        }
        if (!$error) {
            $p->save();
            redirect('parents?up=parent update successfully !');
        } else
            view('formupdateparent', true, ['error' => $error]);
    }
}