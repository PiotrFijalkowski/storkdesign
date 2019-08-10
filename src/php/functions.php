<?php
require_once('classes/theme-module.php');
require_once('classes/theme-options.php');
require_once('classes/theme-setup.php');

require_once( 'modules/autoloader.php' ); 

require_once( 'inc/class-wp-bootstrap-navwalker.php' ); 
require_once( 'inc/helpers-functions.php' );
require_once( 'inc/custom-post-types.php' );
require_once( 'inc/shortcodes.php' );



$theme = new \StorkDesign\ThemeSetup();