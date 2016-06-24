<?php
final class Utilities {

    static public function getPath($dir, $file, $relative = true) {
        $separator = "/";
        $path = "";
        if(!$relative) {
            $separator = DIRECTORY_SEPARATOR;
            $path = dirname(__file__) . $separator;
        }
        $fullPath = $path . $dir . $separator . $file;
        if(!file_exists($fullPath)) {
            $fullPath = $path . ".." . $separator . $dir . $separator . $file;
            if(!file_exists($fullPath))
                $fullPath = "";
        }
        return $fullPath;
    }
}
?>