<?php
require_once "../autoloader.php";
use router\Router;
require_once '../router/routes.php';
Router::processIncomingRequest();
?>