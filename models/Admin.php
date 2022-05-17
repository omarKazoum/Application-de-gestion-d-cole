<?php

namespace models;

use utils\Constants;

class Admin extends EasyBaseModel
{
    //it's necessary to set the table name
    protected static string $tableName = "admins";
    protected static array $columns = ['nom','prenom','role','password','email'];
    protected static string $idColumnName='id';
    public $id;
    public $nom;
    public $prenom;
    public $role;
    public string $email;
    public string $passwordHash;

    /**
     * @param string $passwordHash
     */
    public function setPasswordHash(string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return string
     */
    public function PasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * this function will hash the given password and store it (you can get it's hash later with {$this->getPasswordHash()})
     * @param string $password unhashed password
     */
    public function setPassword(string $password): void
    {
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    protected static function parseEntity(array $data)
    {
        $user = new Admin();
        $user->id=$data["id"];
        $user->email =$data["email"];
        $user->setPasswordHash($data["password"]);
        $user->nom = $data["nom"];
        $user->prenom = $data["prenom"];
        $user->role = $data["role"];
        return $user;
    }
}