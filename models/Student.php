<?php
namespace models;
class Student extends BaseModel{
   protected static string $tableName= 'students';
   public $matricule;
   public $nomcomplet;
    
   public function update()
    {
        $sql="UPDATE ".self::$tableName." SET "
            .'matricule=?,'
            .Constants::Classes_Col_Description."=? ".
            'WHERE '.self::ID_KEY.'=?';
        $stmt =self::$db_manager->getConnection()->prepare($sql);
        $stmt->bind_param( "ssssssssss",$this->name,$this->description,$this->id);
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
   protected static function parseEntity(array $data){
    $student=new Student();
    $student->setId($data["id"]);
    $student->matricule=$data[Constants::Classes_Col_Name];
    $student->nomcomplet=$data[Constants::Classes_Col_Description];
    return $student;
   }

}