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
        $p1->save();
        redirect('parents');
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

    // public function update(){
    //     $p=Parente::getById($_POST['id']);

    //     $p->save();
    // }



}