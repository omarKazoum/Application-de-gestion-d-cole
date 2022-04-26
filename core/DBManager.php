<?php
namespace core;
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
            echo $e->getMessage();
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
     * create the required tables
     * @return bool
     */
    private function createTables(){
        //TODO:: remove the email form the user attributes
            $users_table_query='CREATE TABLE '.Constants::Users_TableName.'('
                    .Constants::Users_Col_Id.' INT AUTO_INCREMENT PRIMARY KEY,'
                    .Constants::Users_Col_UserName.' VARCHAR(30),'
                    .Constants::Users_Col_PasswordHash.' TEXT,'
                    .Constants::Users_Col_RegisterDate.' DATETIME default CURRENT_TIMESTAMP'

                .')';
            $contacts_table_query='CREATE TABLE '.Constants::Contacts_TableName.'('
                .Constants::Contacts_Col_Id.' INT AUTO_INCREMENT PRIMARY KEY,'
                .Constants::Contacts_Col_Phone.' VARCHAR(30),'
                .Constants::Contacts_Col_Email.' VARCHAR(100),'
                .Constants::Contacts_Col_Name.' VARCHAR(30),'
                .Constants::Contacts_Col_UserId.' INT,'
                .Constants::Contacts_Col_Address.' TEXT,'
                .'CONSTRAINT FOREIGN KEY('.Constants::Contacts_Col_UserId.') REFERENCES '
                .Constants::Users_TableName.'('.Constants::Users_Col_Id.')'
                .');';
            //echo 'contacts table query:'.$contacts_table_query.'<br>';
            //echo 'users table query:'.$users_table_query.'<br>';
            $r2=$this->db_connection->query($users_table_query);
            $r1=$this->db_connection->query($contacts_table_query);

            return $r1 && $r2;
        }

    /**
     * should only be called once in the lifetime of the app at first use
     * create the database and all the required tables
     * @return void
     */
    public function install(){
        $this->connectToDb();
        DBManager::$instance->createTables();
    }

    /**
     * @param int $userId the user id in users table to be found if exists
     * @return false|User returns an object of type user or false if none is found
     */
    public function getUserById($userId)
    {
        //TODO change the query to fit the new data structure
        $sql='SELECT * FROM '.Constants::Users_TableName.' WHERE '.Constants::Users_Col_Id.'='.$userId;
        $res=$this->db_connection->query($sql)->fetch_assoc();
        if($res) {
            $user = new User();
            $user->setId($userId);
            $user->setEmail($res[Constants::Users_Col_Email]);
            $user->setPasswordHash($res[Constants::Users_Col_PasswordHash]);
            $user->setUserName($res[Constants::Users_Col_UserName]);
            return $user;
        }else{
            return null;
        }
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