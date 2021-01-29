<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- wp_head is a hook that plugins can plug in to
    to add their javascript scripts to the head -->
    <?php wp_head(); ?>
</head>
<!-- body_class allows wordpress to add 
their own classes to the body -->
<body <?php body_class(); ?>>
    
<header class="bg-red">
    <?php 
        wp_nav_menu([
            'theme_location' => 'top-menu',
            'menu_class' => 'navigation container'
        ])
    ?>
</header>