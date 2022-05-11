<?php
require_once "../autoloader.php";
use core\Router;
require_once '../router/routes.php';
Router::processIncomingRequest();
\utils\InputValidator::flushErrors();
?>