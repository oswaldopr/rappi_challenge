<?php
final class Index extends Template {

    public function __construct() {
        parent::__construct("index");
    }

    public function loadController($controller) {
        $file = Utilities::getPath("controls", $controller . CONTROL_EXTENSION);
        $require = $file != "" ? $file : "notfound.php";
        $this->assign("require", $require);
    }
}
?>