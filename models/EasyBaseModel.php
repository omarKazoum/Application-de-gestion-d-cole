<?php
namespace models;
require_once '../autoloader.php';
use core\DBManager;
use utils\Constants;

/**
 * this class is used to perform crud operation for any model
 *
 */
abstract class EasyBaseModel
{
    //must override
    protected  static string $tableName='';
    protected static array $columns=[];
    protected static string $idColumnName='id';
    protected static $db_manager;
    public function __construct()
    {
        self::$db_manager=DBManager::getInstance();
        $idName=static::$idColumnName;
        $this->$idName=0;
    }

    /**
     * must override this method
     * updates the current object in the database
     * @return void
     */
    public function update(){
        $sql="UPDATE ".static::$tableName." SET ";
        for ($i=0;$i<count(static::$columns)-1;$i++){
            $sql.=static::$columns[$i].'=?,';
        }
        $sql.=static::$columns[count(static::$columns)-1].'=? ';
        $sql.="WHERE ".static::$idColumnName.'=?;';
        $placeIndicators='';
        $values=[];
        for ($i=0;$i<count(static::$columns);$i++){
            $placeIndicators.='s';
            $v=static::$columns[$i];
            if(!isset($this->$v))
                throw new \Exception('property with name '.$v.' is required');
            $values[]=&$this->$v;
        }
        $placeIndicators.="s";
        $idName=static::$idColumnName;
        $values[]=&$this->$idName;
        echo 'sqlis :'.$sql.'<br>';
            'WHERE '.static::$idColumnName.'=?';
        $stmt =self::$db_manager->getConnection()->prepare($sql);
        call_user_func_array([$stmt,'bind_param'],array_merge([$placeIndicators],$values));
        $stmt->execute();
        return $stmt->affected_rows;

    }
    public function delete(){
        return self::$db_manager->getConnection()->query("DELETE FROM ".static::$tableName." WHERE ".static::$idColumnName."='$this->id';");
    }

    /**
     * adds this model to the corresponding table in the database if it does not have an id or update it if it already exist
     * @return void
     */
    public function save(){
        $idName=static::$idColumnName;
        if($this->$idName==0){
            $this->add();
        }
        else $this->update();
    }
    /**
     * each model that extends this class must define this method to store this object to the corresponding table in the database
     * @return mixed
     */
    protected function add(){
        $sql="INSERT INTO ".static::$tableName."(";
        for ($i=0;$i<count(static::$columns)-1;$i++){
            $sql.=static::$columns[$i].',';
        }
        $sql.=static::$columns[count(static::$columns)-1].')';
        $sql.=" values(";
        for ($i=0;$i<count(static::$columns)-1;$i++){
            $sql.='?,';
        }
        $sql.="?);";
        $placeIndicators='';
        $values=[];
        for ($i=0;$i<count(static::$columns);$i++){
            $placeIndicators.='s';
            $v=static::$columns[$i];
            if(!isset($this->$v))
                throw new \Exception('property with name '.$v.' is required');
            $values[]=&$this->$v;
        }
        $stmt =self::$db_manager->getConnection()->prepare($sql);
        call_user_func_array([$stmt,'bind_param'],array_merge([$placeIndicators],$values));
        $stmt->execute();
        $idName=static::$idColumnName;
        $this->$idName=$stmt->insert_id;
        return $stmt->get_result();
    }

    /**
     * this method should be overriden by all model classes and is intended to be used only by
     * @return array
     */
    public static function getAll(){
        return self::queryAll();
    }

    /**
     * @param $id
     * @return mixed|false
     */
    public static function getById($id){
        return self::queryBy(static::$idColumnName,$id);
    }
    public static function getBy($columnName,$value){
        return   self::queryBy($columnName,$value);
    }
    /**
     * @param $tableName
     * @return mixed
     */
    private static function queryAll(){
        self::$db_manager=DBManager::getInstance();
        $sql="SELECT * FROM ".static::$tableName;;
        $res=self::$db_manager->getConnection()->query($sql);
        return array_map('static::parseEntity',$res->fetch_all(MYSQLI_ASSOC));
    }

    /**
     * @param $columnName
     * @param $value
     * @return mixed
     */
    public static function queryBy($columnName, $value)
    {
        self::$db_manager = DBManager::getInstance();
        $sql = "SELECT * FROM ".static::$tableName." WHERE $columnName=?;";
        $statement = self::$db_manager->getConnection()->prepare($sql);
        $statement->bind_param('s', $value);
        $statement->execute();
        $entries= array_map('static::parseEntity',$statement->get_result()->fetch_all(MYSQLI_ASSOC));
        if(!$entries)
            return false;
        return $entries;
    }

    protected static function parseEntity(array $data){
        $className=get_called_class();
        $entity=new $className();
        foreach ($data as $colName => $colValue){
            $entity->$colName=$colValue;
        }
        return $entity;
    }
    public function __set($name, $value)
    {
        if(!$this->hasColumn($name)){
            throw new \Exception('Error: column with the name "'.$name.'" not found in table '.static::$tableName.'!');
        }else
            $this->$name=$value;
    }
    public function __get($name)
    {
        if(!$this->hasColumn($name)){
            throw new \Exception('Error: column with the name "'.$name.'" not found in table '.static::$tableName.'!');
        }else
            return $this->$name;
    }
    private function hasColumn($columnName):bool{
        return in_array($columnName,static::$columns) OR $columnName==static::$idColumnName;
    }

}
