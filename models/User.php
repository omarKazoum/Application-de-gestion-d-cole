<?php
namespace models;
use utils\Constants;

require_once '../autoloader.php';
class User extends ModelBase {
    protected  static string $tableName= 'users';
    private string $userName;
    private string $passwordHash;
    private string $registerDate;
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
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
        $this->passwordHash = password_hash($password,PASSWORD_DEFAULT);
    }

    /**
     * @return string
     */
    public function getRegisterDate(): string
    {
        return $this->registerDate;
    }

    /**
     * @param string $registerDate
     */
    public function setRegisterDate(string $registerDate): void
    {
        $this->registerDate = $registerDate;
    }

    public function update()
    {
        $sql="UPDATE ".self::$tableName." SET "
            .Constants::Users_Col_UserName.'=?,'
            .Constants::Users_Col_PasswordHash."=? ".
            'WHERE '.self::ID_KEY.'=?';
        $stmt =self::$db_manager->getConnection()->prepare($sql);

        $stmt->bind_param( "sss",$this->userName,$this->passwordHash,$this->id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function add()
    {
        $sql="INSERT INTO ".self::$tableName."("
            .Constants::Users_Col_UserName.','
            .Constants::Users_Col_PasswordHash.")"
            ."values(?,?)";
        $stmt =self::$db_manager->getConnection()->prepare($sql);
        $stmt->bind_param( "ss",$this->userName,$this->passwordHash);
        $stmt->execute();
        $this->id=$stmt->insert_id;
        return $stmt->get_result();
    }

    protected static function parseEntity(array $data)
    {
        $user=new User();
        $user->setId($data[Constants::Users_Col_Id]);
        $user->setUserName($data[Constants::Users_Col_UserName]);
        $user->setRegisterDate($data[Constants::Users_Col_RegisterDate]);
        $user->setPasswordHash($data[Constants::Users_Col_PasswordHash]);
        return $user;
    }
    public static function getByName($name){
        $res=self::queryBy(Constants::Users_Col_UserName,$name,self::$tableName);
        if($res) {
            return static::parseEntity($res[0]);
        }else
            false;
    }
}