<?php

$dirs = glob(dirname(__FILE__) . '/*', GLOB_ONLYDIR);

foreach ($dirs as $dir) {
    if (file_exists($dir . DIRECTORY_SEPARATOR . basename($dir) . ".php")) {
        $files = glob($dir . DIRECTORY_SEPARATOR . basename($dir) . '-*.php');
        foreach ($files as $file) {
            require_once($file);
        }
        require($dir . DIRECTORY_SEPARATOR . basename($dir) . ".php");
    }
}
