<?php
spl_autoload_register('load_class');
function load_class($className){
    $classPath=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.str_replace('\\',DIRECTORY_SEPARATOR,$className).'.php';
    if(is_readable($classPath)){
        require_once $classPath;
    }
}
require_once 'configs/config.php';
require_once 'utils/functions.php';