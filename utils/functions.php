<?php
/**
 * requires a view by its name <b color="red">please do not use the file extension e</b>
 * @param $viewName
 * @param ...$args the params to pas to the view in form of ['key'=>'value']
 * @return void
 */function view($viewName,...$args){
    foreach ($args as $arg){
        foreach ($arg as $key =>$value)
            $$key=$value;
   }
    require_once '..'.DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR.$viewName.'.php';
}
