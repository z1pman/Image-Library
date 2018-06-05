<?php

include_once 'error.php';
include_once '../autoloader.php';
include_once '../const.php';

use App\Controller\MainController;

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

$controller = new MainController($action);
$controller->execute();
