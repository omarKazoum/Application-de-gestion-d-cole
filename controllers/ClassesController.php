<?php

namespace controllers;

use models\SchoolClass;
use utils\Constants;
use utils\InputValidator;
use utils\SessionManager;

class ClassesController
{
    function getAll()
    {
        if(SessionManager::getInstance()->isLoggedIn()) {
            if (isset($_GET['word'])) {
                view('classes/list', true, ['classes' => SchoolClass::search($_GET['word']), 'isSearching' => true]);
            } else {
                view('classes/list', true, ['classes' => SchoolClass::getAll()]);
            }
        }else
            redirect('/');
    }
    function editForm($id)
    {        if(SessionManager::getInstance()->isLoggedIn()) {
                 $schollClass = SchoolClass::getById($id);
                if (!$schollClass) {
                    die('no such a class with id ' . $id);
                }
                view('classes/classForm', true, ['edit' => true, 'editClass' => $schollClass]);
            }else
                redirect('/');
    }
    function editSubmit()
    {
        if (
            InputValidator::areAllFieldsSet([Constants::Classes_Col_Name, Constants::Classes_Col_Id], 'POST', ['class name', 'class id'])
            and InputValidator::validateUserName($_POST[Constants::Classes_Col_Name], Constants::Classes_Col_Name)
        ) {
            $c = SchoolClass::getById($_POST[Constants::Classes_Col_Id] ?? -1);
            if (!$c) {
                redirect('error');
                return;
            }
            $c->name = $_POST[Constants::Classes_Col_Name];
            $c->description = $_POST[Constants::Classes_Col_Description] ?? '';
            $c->save();
            redirect('classes?success=class updated successfully !');
        } else {
            view('classes/classForm', true, ['edit' => true]);
        }
    }
    function addForm()
    {
        view('classes/classForm', true);
    }
    function addSubmit()
    {
        if (
            InputValidator::areAllFieldsSet([Constants::Classes_Col_Name], 'POST', ['class name'])
            and InputValidator::validateUserName($_POST[Constants::Classes_Col_Name], Constants::Classes_Col_Name)
        ) {
            $c = new SchoolClass();
            $c->name = $_POST[Constants::Classes_Col_Name];
            $c->description = $_POST[Constants::Classes_Col_Description] ?? '';
            $c->save();
            redirect('classes?success=class added successfully !');
        } else
            view('classes/classForm', true);
    }
    function delete($id)
    {
        $sc = SchoolClass::getById($id);
        if ($sc) {
            $sc->delete();
            redirect('classes?success=class deleted successfully !');
        } else
            die('no class with given id ' . $id);
    }
}