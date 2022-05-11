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
    protected int $id=0;
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
        $sql="WHERE ".static::$idColumnName.'=?;';
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
        if($this->id==0){
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
        echo 'sqlis :'.$sql.'<br>';
        $stmt =self::$db_manager->getConnection()->prepare($sql);

        //$stmt->bind_param( $placeIndicators,$values);
        call_user_func_array([$stmt,'bind_param'],array_merge([$placeIndicators],$values));
        $stmt->execute();
        $this->id=$stmt->insert_id;
        return $stmt->get_result();
    }

    /**
     * this method should be overriden by all model classes and is intended to be used only by
     * @return array
     */
    public static function getAll(){
        $array=self::queryAll(static::$tableName);
        $objectArray=[];
        foreach ($array as $key=>$value){
           $objectArray[]=static::parseEntity($value);
        }
        return $objectArray;
    }
    public static function getById($id){
        $res=self::queryBy(static::$idColumnName,$id,self::$tableName);
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
    protected static function parseEntity(array $data){

    }
}