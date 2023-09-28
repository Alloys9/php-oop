<?php
spl_autoload_register(function ($class_name) {
    $directories = ["forms", "layouts","database"];
    foreach ($directories as $dir) {
        $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class_name . '.php';
        if (file_exists($file_path)) {
            include $file_path;
        }
    }
});
?>
