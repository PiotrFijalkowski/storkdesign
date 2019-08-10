<?php
$files = glob(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'shortcodes' . DIRECTORY_SEPARATOR . '*.php');

foreach ($files as $file) {
    require_once($file);
}

/*
========================================================
                        SHORTCODES                     
========================================================
*/

/* [inject sc] */
