<?php get_header(); ?>

<div class="main container">
    <h1><?php the_title(); ?></h1>

    <?php if(has_post_thumbnail()) : ?>
        <img src="<?php the_post_thumbnail_url('largest') ?>" />
    <?php endif; ?>

    <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
            }
        }
    ?>

    <?php the_content(); ?>
    <?php 
        $weather = get_post_meta($post->ID, 'Weather', true);

        if($weather) {
            echo "Weather: " . $post->Weather;
        }
    ?>
</div>


<?php get_footer(); ?>