<?php  

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '1');
ini_set('error_log', 1);
error_reporting(E_ALL);

error_reporting(0);
ini_set('display_errors', 0);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);
date_default_timezone_set("America/Argentina/Buenos_Aires");
define('AHORA', date("Y-m-d h:i:s"));


//URL
define ('_PATH_FRONT', "/Applications/MAMP/htdocs/lion/metrogas/firmas/");
define ('_PATH', "/Applications/MAMP/htdocs/lion/metrogas/firmas/");
define ('_PUBLIC', _PATH."public/");
define ('_URL', "http://localhost:8888/lion/metrogas/firmas/");
define ('_URL_ADMIN', _URL);
define ('_CSS', _URL_ADMIN."public/css/");
define ('_JS', _URL_ADMIN."public/js/");
define ('_IMG', _URL_ADMIN."public/img/");
define ('_IMG_FRONT', _URL."img/");
define ('_FONTS', _URL_ADMIN."public/fonts/");
define ('_FILES', _URL_ADMIN."_files/");
define ('_FILES_PATH', _PATH."/_files/");
define ('_LIBRARY', _URL_ADMIN."/library/");
define ('_LIBRARY_PATH', _PATH."library/");
define ('_VIEWS', _PATH."application/views/");

define("URL_FRONT", _URL);
define("URL2", _URL);
define("URL_FILES", _URL_ADMIN."_files/");
//URL




//DATABASE
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', "root");
define('DB_NAME', "lion_firmas");
define('DB_DISPLAY_DEBUG', true);
define('DB_TYPE', "mysqli" );
//DATABASE






?>