<?php
namespace models;
class Parent extends BaseModel{ 
    protected  static string $tableName='parents';
    public $nom_complet;
    public $matricul;
    public $genre;
    public $adresse;
    public $phone;
    public function update(){
        $sql="UPDATE ".self::$tableName." SET nom_complet=?, matricule=?, genre=?, job=? ,adresse=?, phone=? WHERE id=?";
        $stmt =self::$db_manager->getConnection()->prepare($sql);

        $stmt->bind_param( "sssssss",$this->nom_complet,$this->matricul,$this->genre,$this->job,$this->adresse,$this->phone,$this->id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
    protected function add(){

    }
    protected static function parseEntity(array $data){
            $parent=new Parent();
            $parent->setId($data['id']);

            return $parent;
    }




}