<?php
/**
 * Function autoloader for app classes
 * 
 * @author  Oswaldo Peña <oswaldopr@gmail.com>
 * @param   string  $class  Name of class to require
 * @return  void
 */
function autoload_app_class($class) {
    autoload("classes", strtolower($class));
}

/**
 * Function autoloader for app models (app components/operations)
 * 
 * @author  Oswaldo Peña <oswaldopr@gmail.com>
 * @param   string  $model  Name of model class to require
 * @return  void
 */
function autoload_app_model($model) {
    autoload("models", strtolower($model));
}

/**
 * Function autoloader for Smarty class
 * 
 * @author  Oswaldo Peña <oswaldopr@gmail.com>
 * @return  void
 */
function autoload_smarty_class() {
    autoload(DIR_SMARTY, "Smarty");
}

/**
 * Function to autoload classes/interfaces; not register with spl_autoload_register()
 * 
 * @author  Oswaldo Peña <oswaldopr@gmail.com>
 * @param   string  $dir        Directory to search the class/interface file to require
 * @param   string  $class      Name of class/interface to require
 * @param   boolean $interface  The class is an interface (true)
 * @return  void
 */
function autoload($dir, $class, $interface = false) {
    $type = !$interface ? ".class.php" : ".iclass.php";
    $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . $type;
    if(file_exists($file))
        require_once $file;
}

/*** Registering Autoload Functions ***/
spl_autoload_register("autoload_app_class");
spl_autoload_register("autoload_app_model");
spl_autoload_register("autoload_smarty_class");
?>