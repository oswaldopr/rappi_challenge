<?php
/**
 * Model for App Index
 * 
 * @author  Oswaldo Pe�a <oswaldopr@gmail.com>
 */
final class Index extends Template {

    /**
     * Constructor of class
     * 
     * @return  void
     */
    public function __construct() {
        parent::__construct("index");
    }

    /**
     * Loads a controller
     * 
     * @param   string  $controller Name of controller to load
     * @return  void
     */
    public function loadController($controller) {
        $file = Utilities::getPath("controls", $controller . CONTROL_EXTENSION);
        $require = $file != "" ? $file : "notfound.php";
        $this->assign("require", $require);
    }
}
?>