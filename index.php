<?php
session_start();
require 'config.php';
require 'util/Helper.php';
require 'util/Auth.php';
require 'util/User.php';
require 'util/Alert.php';

// Also spl_autoload_register (Take a look at it if you like)
function __autoload($class) {
    require LIBS . $class .".php";
}
//Set language

require 'lang/index.php';
if (!isset($_SESSION["lang"])) {
	Lang::setLang(DEF_LANG);
} else {
	Lang::loadLang($_SESSION["lang"]);
}

// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();