<?php
/**
 * requires a view by its name <b color="red">please do not use the file extension e</b>
 * @param $viewName
 * @param ...$args the params to pas to the view in form of ['key'=>'value']
 * @return void
 */function view($viewName,bool $wrapInTemplate=true,...$args){
    foreach ($args as $arg){
        foreach ($arg as $key =>$value)
            $$key=$value;
   }
    if($wrapInTemplate) {
        ob_start();
        require_once '..' . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $viewName . '.php';
        $page_content = ob_get_clean();
        require_once '..' . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . 'template.php';

    }else{
        require_once '..' . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $viewName . '.php';
    }
 }
 function redirect($endpoint){
    header('location:'.getUrlFor($endpoint));
    exit();
 }
function getUrlFor($url_relative_to_root):string{
    return "http://" . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/'.$url_relative_to_root;
}
function css($filename){
     $path=getUrlFor('assets/css/'.$filename);
     return getUrlFor('assets/css/'.$filename);
}
function js($fileName){
     $a=     getUrlFor('assets/js/'.$fileName);
    return getUrlFor('assets/js/'.$fileName);
}
function img($imgName){
     $b=     getUrlFor('assets/img/'.$imgName);
    return getUrlFor('assets/img/'.$imgName);
}
