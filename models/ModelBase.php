<?php
namespace models;
require_once '../autoloader.php';
use core\DBManager;
/**
 * this class is used to perform crud operation for any model
 *
 */
abstract class ModelBase
{
    const ID_KEY='id';
    protected int $id=-1;
    protected  static string $tableName='';
    protected static $db_manager;
    public function __construct()
    {
        self::$db_manager=DBManager::getInstance();
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    /**
     * updates the current object to the database adds it if it does not already exist
     * @return void
     */
    public abstract function update();
    public function delete(){
        return self::$db_manager->getConnection()->query("DELETE FROM ".static::$tableName." WHERE ".ModelBase::ID_KEY."='$this->id';");
    }
    public function save(){
        if($this->id==-1){
            $this->add();
        }
        else $this->update();
    }
    protected abstract function add();
    public static function getAll(){
        $array=self::queryAll(static::$tableName);
        foreach ($array as $key=>$value){
            $array[$key]=static::parseEntity($value);
        }
        return $array;
    }
    public static function getById($id){
        $res=self::queryBy(self::ID_KEY,$id,self::$tableName);
        if($res) {
            return static::parseEntity($res[0]);
        }else
            false;
    }
    protected static function queryAll($tableName){
        self::$db_manager=DBManager::getInstance();
        $sql="SELECT * FROM ".$tableName;;
        $res=self::$db_manager->getConnection()->query($sql);
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    protected static function queryBy($proprety,$value)
    {
        self::$db_manager = DBManager::getInstance();
        $sql = "SELECT * FROM ".static::$tableName." WHERE $proprety=?;";
        $statement = self::$db_manager->getConnection()->prepare($sql);
        $statement->bind_param('s', $value);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    protected abstract static function parseEntity(array $data);
}