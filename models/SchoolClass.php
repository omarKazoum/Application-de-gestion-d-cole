<?php

namespace models;

use utils\Constants;

class SchoolClass extends BaseModel {
    protected static string $tableName='class';
    private $name;
    private $description;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    public function update()
    {
        $sql="UPDATE ".self::$tableName." SET "
            .Constants::Classes_Col_Name.'=?,'
            .Constants::Classes_Col_Description."=? ".
            'WHERE '.self::ID_KEY.'=?';
        $stmt =self::$db_manager->getConnection()->prepare($sql);
        $stmt->bind_param( "sss",$this->name,$this->description,$this->id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    protected function add()
    {
        $sql="INSERT INTO ".self::$tableName."("
        .Constants::Classes_Col_Name.','
        .Constants::Classes_Col_Description.")"
        ."values(?,?)";
        $stmt =self::$db_manager->getConnection()->prepare($sql);
        $stmt->bind_param( "ss",$this->name,$this->description);
        $stmt->execute();
        $this->id=$stmt->insert_id;
        return $stmt->get_result();
    }

    protected static function parseEntity(array $data)
    {  $schoolClass=new SchoolClass();
        $schoolClass->setId($data[Constants::Classes_Col_Id]);
        $schoolClass->setName($data[Constants::Classes_Col_Name]);
        $schoolClass->setDescription($data[Constants::Classes_Col_Description]);
        return $schoolClass;
    }
}