<?php
/**
 * App Configuration File
 * 
 * @author  Oswaldo Peña <oswaldopr@gmail.com>
 */

/*** ABOUT THE APP ***/
//Name of application
define("APP_NAME", "Cube Summation");

//Project of application
define("APP_PROJECT", "RappiChallenge");

/*** APP DIRECTORIES ***/
//Libraries directory
define("DIR_LIBS", "libs" . DIRECTORY_SEPARATOR);

//Smarty directory
define("DIR_SMARTY", DIR_LIBS . "smarty_2_6_28" . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR);

//Server libraries directory
define("DIR_LIBS_SERVER", DIR_LIBS . "server" . DIRECTORY_SEPARATOR);

//Client libraries directory
define("DIR_LIBS_CLIENT", DIR_LIBS . "client" . DIRECTORY_SEPARATOR);

/*** SMARTY TEMPLATES DIRECTORIES ***/
//Smarty templates
define("SMARTY_TEMPLATES", "templates" . DIRECTORY_SEPARATOR);

//Smarty compilations
define("SMARTY_COMPILATIONS", SMARTY_TEMPLATES . "smarty" . DIRECTORY_SEPARATOR);

//Smarty compiled templates
define("SMARTY_TEMPLATES_C", SMARTY_COMPILATIONS . "templates_c" . DIRECTORY_SEPARATOR);

//Smarty configs
define("SMARTY_CONFIGS", SMARTY_COMPILATIONS . "configs" . DIRECTORY_SEPARATOR);

//Smarty cache
define("SMARTY_CACHE", SMARTY_COMPILATIONS . "cache" . DIRECTORY_SEPARATOR);

/*** CONSTRAINTS FOR EXECUTION ***/
//Maximum number of test-cases
define("MAX_TEST_CASES", 50);

//Maximum dimensions for matrix
define("MAX_DIMENSIONS_MATRIX", 100);

//Maximum number of operations
define("MAX_OPERATIONS", 1000);

//Range of valid values for cells in matrix
define("MIN_VALUE_ELEMENT", pow(10, 9) * -1);
define("MAX_VALUE_ELEMENT", pow(10, 9));
?>