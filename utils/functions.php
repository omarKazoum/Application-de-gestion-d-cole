<?php
/**
 * requires a view by its name <b color="red">please do not use the file extension</b>
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
        require_once '..' . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . 'templates/template.php';

    }else{
        require_once '..' . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $viewName . '.php';
    }
 }

/**
 * @param $viewName
 * @param ...$args
 */
function viewNoSidebar($viewName,...$args){
    foreach ($args as $arg){
        foreach ($arg as $key =>$value)
            $$key=$value;
    }
        ob_start();
        require_once '..' . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $viewName . '.php';
        $page_content = ob_get_clean();
        require_once '..' . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . 'templates/template_navbar_only.php';
}
 function redirect($endpoint = "/"){
    header('location:'.getUrlFor($endpoint));
    exit();
 }
function getUrlFor($url_relative_to_root):string{
    if ($url_relative_to_root[0] == "/")
        return "http://" . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$url_relative_to_root;
    else
        return "http://" . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/'.$url_relative_to_root;
}
function css($filename){
     return getUrlFor('assets/css/'.$filename);
}
function js($fileName){
    return getUrlFor('assets/js/'.$fileName);
}
function img($imgName){
    return getUrlFor('assets/img/'.$imgName);
}
function requestUrlMatches(...$uris):bool{
    $requestUrl=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    $requestUrl=stripAllSlashes($requestUrl);
    foreach ($uris as $uri){
        if(preg_match(core\Router::createRegexFromUriIndecation(stripAllSlashes($uri)),$requestUrl))
            return true;
    }
    return false;
}
function stripAllSlashes($text){
    $text=preg_replace('#^/#','',$text);
    $text=preg_replace('#/$#','',$text);
    return $text;
}
