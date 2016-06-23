<?php
/**
 * App Configuration File
 * 
 * @package RappiChallenge
 * @author Oswaldo Peña <oswaldopr@gmail.com>
 */

//Name of the application
define("APP_NAME", "Cube Summation");

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