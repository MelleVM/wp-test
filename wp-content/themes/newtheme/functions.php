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


    function create_posttype() {
    
        register_post_type( 'projects',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Projects' ),
                    'singular_name' => __( 'Project' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'projects'),
                'show_in_rest' => true,
    
            )
        );
    }
    // Hooking up our function to theme setup
    add_action( 'init', 'create_posttype' );


    /*
    * Creating a function to create our CPT
    */
    
    function custom_post_type() {
    
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Projects', 'Post Type General Name', 'twentytwenty' ),
            'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'twentytwenty' ),
            'menu_name'           => __( 'Projects', 'twentytwenty' ),
            'parent_item_colon'   => __( 'Parent Project', 'twentytwenty' ),
            'all_items'           => __( 'All Projects', 'twentytwenty' ),
            'view_item'           => __( 'View Project', 'twentytwenty' ),
            'add_new_item'        => __( 'Add New Project', 'twentytwenty' ),
            'add_new'             => __( 'Add New', 'twentytwenty' ),
            'edit_item'           => __( 'Edit Project', 'twentytwenty' ),
            'update_item'         => __( 'Update Project', 'twentytwenty' ),
            'search_items'        => __( 'Search Project', 'twentytwenty' ),
            'not_found'           => __( 'Not Found', 'twentytwenty' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
        );
        
    // Set other options for Custom Post Type
        
        $args = array(
            'label'               => __( 'projects', 'twentytwenty' ),
            'description'         => __( 'Project news and reviews', 'twentytwenty' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
    
        );
        
        // Registering your Custom Post Type
        register_post_type( 'projects', $args );
    
    }
    
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
    
    add_action( 'init', 'custom_post_type', 0 );

    require 'inc/rest-api.php';
?>