<?php
namespace utils;
require_once '../configs/config.php';
use models\ModelBase;
class Constants
{

    //for users table
    const Users_TableName='users';
    const Users_Col_Id=ModelBase::ID_KEY;
    const Users_Col_UserName='name';
    const Users_Col_PasswordHash='pass_hash';
    const Users_Col_RegisterDate='register_date';
    const Users_Password='pass';
    //not stored
    const Users_Password2='pass2';

    //for remember me option
    const Session_RememberMe='rememberme';
    const Session_RememberMe_Email='rememberme_email';
    const Session_RememberMe_Pass='rememberme_pass';
}