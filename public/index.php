<?php
// Define path for Zend 1.11.11 and Doctrine2 libraries
ini_set("include_path", ".:" . realpath(dirname(__FILE__)) .
	"/../Zend/:" . realpath(dirname(__FILE__)) . "/../Doctrine/:" . PEAR_INSTALL_DIR);

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
	APPLICATION_ENV,
	APPLICATION_PATH . '/configs/application.json'
);

$application->bootstrap()
	->run();