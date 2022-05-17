<?php
namespace core;
use mysqli;
require_once '../configs/config.php';
    ini_set('display_errors', json_encode(!PRODUCTION));
    ini_set('display_startup_errors',json_encode(!PRODUCTION));
    error_reporting(!PRODUCTION ?E_ALL:E_ERROR);
class DBManager
{
    private static ?DBManager $instance=null;
    private  ?mysqli $db_connection=null;

    private function __construct()
    {

    }
    public static function getInstance(){
         if(!DBManager::$instance){
            DBManager::$instance=new DBManager();
         }
        try{

            //DBManager::$instance->install();
            DBManager::$instance->connectToDb();
        }catch (Exception $e){
            echo var_dump($e);
        }
        return DBManager::$instance;
    }
    /**
     * connect to database and stores a link object in $this->db_connection
     * @return void
     */
    private function connectToDb(){
        $this->db_connection = new mysqli(DB_HOST_NAME ,
            DB_USER_NAME,
            DB_PASSWORD,
            DB_NAME
        );
        if($this->db_connection->connect_error)
            die($this->db_connection->connect_error);
    }

    /**
     * close all connections when they are no longer needed
     */
    public function __destruct()
    {
           mysqli_close($this->db_connection);

    }
    public function getConnection(){
        return $this->db_connection;
    }


}