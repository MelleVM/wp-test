<?php get_header("bg-red"); ?>

<div class="main container">
    <h1><?php the_title(); ?></h1>

    <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
            }
        }
    ?>

    <?php the_content(); ?>
</div>


<?php get_footer(); ?>