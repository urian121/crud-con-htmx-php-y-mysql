<?php
// DEBUG ACTIVADO
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de zona horaria
date_default_timezone_set('America/Bogota');


// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'crud_htmx_php');
define('DB_USER', 'root');
define('DB_PASSWORD', '4825');


// DEFINIR RUTAS ABSOLUTAS
$projectPath = str_replace('\\', '/', __DIR__);
$projectPath = str_replace('settings', '', $projectPath);
define('BASE_PATH_HOME', $projectPath);
define('BASE_PATH_COMPONENTS', BASE_PATH_HOME . 'components');
define('BASE_PATH_MIDDLEWARE', BASE_PATH_HOME . 'middlewares');
define('CONTROLLER_PATH', BASE_PATH_HOME . 'controllers');
define('SETTINGS_BD', BASE_PATH_HOME . 'settings/settingBD.php');
define('FUNCTIONS_PATH', BASE_PATH_HOME . 'functions/');
define('ACTION_LOGIN', 'login.php');
define('ACTION_LOGOUT', 'auth/logout.php');
