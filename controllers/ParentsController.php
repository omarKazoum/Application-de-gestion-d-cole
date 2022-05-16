<?php
namespace controllers;

use models\Parente;

class ParentsController{
    function getParents(){
    }
    function delete($id){
        $d=Parente::getById($id);
        if($d)
        $d->delete();
        else echo 'parente not existe';
    }
    public function addForm()
    {
       view('formaddparente',true);
    }

    public function addSave(){
        $p1 = new Parente();
        $p1->matricule=5000;
        $p1->nom_complet='omar';
        $p1->genre='maroc';
        $p1->job='formateur';
        $p1->adresse='qu el qods';
        $p1->phone="0620107920";
        $p1->save();
        print_r($_POST);
    }
    public function update(){
        $p=Parente::getById(3);
        $p->matricule=900;
        $p->save();
    }



}