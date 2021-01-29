<?php 

    function load_stylesheets() {
        wp_register_style('app', get_template_directory_uri() . '/css/app.css', [], false, 'all');
        wp_enqueue_style('app');

        wp_register_style('style', get_template_directory_uri() . '/style.css', [], false, 'all');
        wp_enqueue_style('style');
    }

    add_action('wp_enqueue_scripts', 'load_stylesheets');

    function loadjs() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', '', false, true);
        wp_enqueue_script('jquery');

        if(is_page('portfolio')) {
            wp_register_script('portfolio', get_template_directory_uri() . '/js/portfolio.js', ['jquery'], false, true);
            wp_localize_script('portfolio', 'WP_DATA', [
                'rest_url' => get_rest_url()
            ]);
            wp_enqueue_script('portfolio');
        }
    }

    add_action('wp_enqueue_scripts', 'loadjs');

    add_theme_support('menus');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'top-menu' => __('Top Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme')
    ]);

    add_image_size('smallest', 300, 300, true);
    add_image_size('largest', 800, 800, true);

    add_filter( 'excerpt_length', function($length) {
        return 35;
    } );
?>