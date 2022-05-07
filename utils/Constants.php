<?php
namespace utils;
require_once '../configs/config.php';
use models\BaseModel;
class Constants
{

    /**
     * for users table
     */
    const Users_TableName='users';
    const Users_Col_Id=BaseModel::ID_KEY;
    const Users_Col_UserName='name';
    const Users_Col_PasswordHash='pass_hash';
    const Users_Col_RegisterDate='register_date';
    const Users_Password='pass';
    //not stored
    const Users_Password2='pass2';
    // for classes table
    const Classes_Col_Id='id';
    const Classes_Col_Name='name';
    const Classes_Col_Description='description';
    /**
     * for remember me option
     */
    const Session_RememberMe='rememberme';
    const Session_RememberMe_Email='rememberme_email';
    const Session_RememberMe_Pass='rememberme_pass';
}