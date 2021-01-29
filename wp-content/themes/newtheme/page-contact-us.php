<?php get_header(); ?>

<div class="main container">

    <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
            }
        }
    ?>

    <div class="contact-container-1">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>



</div>

<div class="contact-container-2">
    <div class="contact-form">

    </div>
</div>

<?php get_footer(); ?>