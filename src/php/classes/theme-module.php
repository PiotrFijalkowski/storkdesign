<?php
namespace StorkDesign;

abstract class ThemeModule
{

    public $name;
    public $version;


    function __construct()
    {
        add_action('init', array($this, 'init'));
        add_filter('theme/localize/script', array($this, 'localize_script'));
    }

    public function init()
    { }

    public function localize_script($vars)
    {
        return $vars;
    }
}
