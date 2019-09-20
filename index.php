<?php
session_start();
//echo getcwd();die();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

/*** include the init.php file ***/
include 'includes/config.php';
include 'includes/init.php';

$registry->router = new router($registry);
$registry->router->setPath (_PATH . '/application/controller');
$registry->template = new template($registry);
$registry->router->loader();

?>
