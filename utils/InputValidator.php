<?php
namespace utils;
require_once $_SERVER['DOCUMENT_ROOT']."/../autoloader.php";
class InputValidator
{
    const CLASS_NAME_PATTERN = '^([a-zA-Z0-9]{3,}\s?)([a-zA-Z0-9]{1,}\s?)*$/';
    public static $errorsArray = [];
    //public  const INPUT_VALIDATOR_ERRORS='errors';
    public  const PASSWORD_PATTERN='/^.{6,100}$/';
    public  const EMAIL_PATTERN='/^\w+@\w+(\.\w+)+$/';
    public  const PHONE_PATTERN='/^\+{0,1}(212)|0[658]\d{8}$/';
    public  const NAME_PATTERN='/^([a-zA-Z0-9]{3,}\s?)+$/';

    public static function flushErrors(){
            self::$errorsArray=[];
    }
    /**
     * validates the password against this criteria:
     * <ul>
     *  <li>contain at least 6 characters </li>
     * </ul>
     * @param  $password
     * @return bool
     */
    public static function validatePassword( $password,$key):bool{
        $res=preg_match(self::PASSWORD_PATTERN,$password);
        if(!$res){
            self::appendError($key,"Password must be at least 8 characters long");
        }
        return $res;
    }
    /**
     * validates the password against this criteria:
     * <ul>
     *  <li>must be a valide email adress</li>
     * </ul>
     * <b>Regex used <code>^([\w]{1,30})@([\w]{1,20})\.([\w]{1,20})$</code></b>
     * @param  $email
     * @return bool
     */
    public static function validateEmail($email,$key):bool{
        $res=preg_match(self::EMAIL_PATTERN,$email);
        if(!$res){
            self::appendError($key,'Invalid email address');
        }
        return $res;
    }
    public static function validatePasswordsMatch( $password1, $password2,$key){
        $isPasswordValid=self::validatePassword($password1,$key);
        $isPasswordsMatch=$password1==$password2 ;
        if(!$isPasswordsMatch){
           self::appendError($key,"Passwords must match");
        }
        return $isPasswordsMatch AND $isPasswordValid;
    }
    public static function validatePhone($phoneNbr,$key){
        $isPhoneValid=preg_match(self::PHONE_PATTERN,$phoneNbr);;
        if(!$isPhoneValid)
            self::appendError($key,"Invalid phone number:must start with 212 or 0 and then 6,5 or 8 followed by 8 numbers");
        return $isPhoneValid;
    }
    public static function validateUserNameDoesNotExist( $userName,$key)
    {
        $exists=User::getByName($userName);
        if($exists)
            self::appendError($key,"User name already taken");
        return !$exists;
    }
    static function areAllFieldsSet(array $fields, $method,array $fieldsCustomNames=[]) :bool{
        $isAllSet=true;
        foreach ($fields as $key=> $field){
            if(($method =='GET' and !isset($_GET[$field])) or ($method =='POST' and !isset($_POST[$field]) )) {
                $isAllSet = false;
                self::appendError($field, ($fieldsCustomNames[$key] ?? $field) . ' is required');
            }
        }
        return $isAllSet;
    }
    public static function validateUserName($userName, $key)
    {
        $valid=preg_match(self::NAME_PATTERN,$userName);
        if(!$valid)
            self::$errorsArray[$key]="User name must be 3 letters long and contain only alphanumeric characters";
        return $valid;
    }
    public static function validateClassName($className, $key)
    {
        $valid=preg_match(self::CLASS_NAME_PATTERN,$className);
        if(!$valid)
            self::$errorsArray[$key]="Class name must be 3 letters long and contain only alphanumeric characters";
        return $valid;
    }
     static function appendError($key,$message){
        if(!isset(self::$errorsArray[$key]))
            self::$errorsArray[$key]="$message";
        else
            self::$errorsArray[$key].="\<br\>$message";
    }

    /**
     * checks if there is an error corresponding to the given key and returns it or false otherwise
     * @param $key
     * @return false|mixed
     */
    static function error($key){
        if(isset(self::$errorsArray[$key])){
            return self::$errorsArray[$key];
        }else
            return false;
    }


}