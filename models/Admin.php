<?php

namespace models;

use utils\Constants;

class Admin extends BaseModel
{
    //it's necessary to set the table name
    protected static string $tableName = 'admins';
    private string $email;
    private string $passwordHash;

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->email;
    }

    /**
     * @param string $userName
     */
    public function setEmail(string $userName): void
    {
        $this->email = $userName;
    }

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
    public function getPasswordHash(): string
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
        $sql = "UPDATE " . self::$tableName . " SET "
            . "email" . '=?,'
            . "password" . "=? " .
            'WHERE ' . self::ID_KEY . '=?';
        $stmt = self::$db_manager->getConnection()->prepare($sql);

        $stmt->bind_param("sss", $this->email, $this->passwordHash, $this->id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function add()
    {
        $sql = "INSERT INTO " . self::$tableName . "("
            . "email" . ','
            . "password" . ")"
            . "values(?,?)";
        $stmt = self::$db_manager->getConnection()->prepare($sql);
        $stmt->bind_param("ss", $this->email, $this->passwordHash);
        $stmt->execute();
        $this->id = $stmt->insert_id;
        return $stmt->get_result();
    }

    protected static function parseEntity(array $data)
    {
        $user = new Admin();
        $user->setId($data["id"]);
        $user->setEmail($data["email"]);
        $user->setPasswordHash($data["password"]);
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