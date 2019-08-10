<?php
define("IMG_DIR", get_template_directory_uri() . '/images');

function body_attributes()
{
    $default = array();
    $attributes = apply_filters('body_attributes', $default);

    foreach ($attributes as $key => $value) {
        echo " {$key}=\"$value\"";
    }
}



function get_theme_option($section, $key) {
    $settins = get_field($section, 'option');
    return $settins[$key];
}

function get_recaptcha($type){
    $api = get_theme_option('google_api', 'captcha_key');

    return $api[$type];
}