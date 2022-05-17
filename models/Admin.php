<?php

namespace models;

use utils\Constants;

class Admin extends BaseModel
{
    //it's necessary to set the table name
    protected static string $tableName= 'admins';
    public $nom;
    public $prenom;
    public $role;
    public string $email;
    private string $passwordHash;

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
    public function     PasswordHash(): string
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

    public function update()
    {
        $sql="UPDATE ".self::$tableName." SET "
            ."nom".'=?,'
            ."prenom".'=?,'
            ."email".'=?,'
            ."role".'=?,'
            ."password"."=? ".
            'WHERE '.self::ID_KEY.'=?';
        $stmt =self::$db_manager->getConnection()->prepare($sql);

        $stmt->bind_param( "ssssss",$this->nom,$this->prenom,$this->email,$this->role,$this->passwordHash,$this->id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function add()
    {
        $sql="INSERT INTO ".self::$tableName."("
            ."nom".','
            ."prenom".','
            ."role".','
            ."email".','
            ."password".")"
            ."values(?,?,?,?,?)";
        $stmt =self::$db_manager->getConnection()->prepare($sql);
        $stmt->bind_param( "sssss",$this->nom,$this->prenom,$this->role,$this->email,$this->passwordHash);
        $stmt->execute();
        $this->id = $stmt->insert_id;
        return $stmt->get_result();
    }

    protected static function parseEntity(array $data)
    {
        $user = new Admin();
        $user->setId($data["id"]);
        $user->email =$data["email"];
        $user->setPasswordHash($data["password"]);
        $user->nom = $data["nom"];
        $user->prenom = $data["prenom"];
        $user->role = $data["role"];
        return $user;
    }
    public static function getByEmail($name)
    {
        $res = self::queryBy("email", $name, self::$tableName);
        if ($res)
            return static::parseEntity($res[0]);
        return false;
    }
}