<?php
/**
 * requires a view by its name <b color="red">please do not use the file extension e</b>
 * @param $viewName
 * @return void
 */
function view($viewName){
    require_once '..'.DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR.$viewName.'.php';
}
