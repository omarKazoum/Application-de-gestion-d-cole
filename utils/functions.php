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
