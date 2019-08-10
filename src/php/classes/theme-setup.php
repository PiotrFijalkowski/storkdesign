<?php
namespace StorkDesign;

class ThemeSetup
{

    public $options = null;
    public static $instance;


    public function __construct()
    {

        $options = get_field('general_options', 'option');
        $this->options = new ThemeOptions($options);

        $this->setup();
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    function setup()
    {

        add_action('after_setup_theme', array($this, 'after_setup_theme'));
        add_action('admin_menu', array($this, 'custom_menu_page_removing'));
        add_action('wp_enqueue_scripts', array($this, 'theme_scripts_styles'));
        add_filter('body_class', array($this, 'body_class'));



        show_admin_bar(false);
    }

    function after_setup_theme()
    {
        load_theme_textdomain('storkdesign', get_template_directory() . '/languages');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        register_nav_menus(array(
            'top'    => __('Top Menu')
        ));
    }



    function body_class( $classes)
    {
        global $post;
        $classes = [];
        if(\is_front_page()) {
            $classes[] = 'home';
        }
        if($post){
            $classes[] = $post->post_type;
            $classes[] = 'page-' . sanitize_title($post->post_title);
        }

       return  $classes;
    }


    function custom_menu_page_removing()
    {

        remove_menu_page('edit-comments.php');
        remove_menu_page('edit.php');
    }

    function theme_scripts_styles()
    {

        $js = get_theme_file_uri('/script.min.js');
        $js_lib = get_theme_file_uri('/script_lib.min.js');

        $vars = array(
            'home_url' => trailingslashit(home_url()),
            'l10n'     => array()
        );


            wp_enqueue_style('lib-style', get_theme_file_uri('/lib.css'), array(), $this->get_file_version('/lib.css'));
            wp_enqueue_style('style', get_theme_file_uri('/style.css'), array(), $this->get_file_version('/style.css'));
            wp_register_script('lib-script', get_theme_file_uri('/lib.js'), array('jquery', 'jquery-ui-widget', 'jquery-ui-mouse'), $this->get_file_version('/lib.js'), true);
            wp_enqueue_script('scripts', get_theme_file_uri('/app.js'), array('lib-script', 'underscore', 'jquery-ui-slider'), $this->get_file_version('/app.js'), true);
            wp_localize_script('scripts', '__jsVars', apply_filters('theme/localize/script', $vars));

    }

    function get_file_version($filename)
    {
        if (!$this->options->isProduction()) {
            return 'dev';
        }

        $file = get_theme_file_path($filename);
        if (file_exists($file)) {
            return filemtime(get_theme_file_path($filename));
        } else {
            return null;
        }
    }
}
