<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : 
	define('SITE_ROOT', 'C:'.DS.'xampp'.DS.'htdocs'.DS.'finalproject');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
defined('APP_PATH') ? null : define('APP_PATH', SITE_ROOT.DS.'Apriori');

// load config file first
//require_once(LIB_PATH.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'function.php');

// load core objects
//require_once(LIB_PATH.DS.'function.php');
require_once(LIB_PATH.DS.'db_connection.php');
require_once(LIB_PATH.DS.'functions.php');
require_once(APP_PATH.DS.'apriori.php');
//require_once(LIB_PATH.DS."phpMailer".DS."class.phpmailer.php");
//require_once(LIB_PATH.DS."phpMailer".DS."class.smtp.php");
//require_once(LIB_PATH.DS."phpMailer".DS."language".DS."phpmailer.lang-en.php");

// load database-related classes
//require_once(LIB_PATH.DS.'user.php');
//require_once(LIB_PATH.DS.'photograph.php');
//require_once(LIB_PATH.DS.'comment.php');


?>