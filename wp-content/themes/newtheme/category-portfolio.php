<?php get_header() ?>
    <div class="main container">
        <h1><?php single_cat_title() ?></h1>

        <?php 
            if(have_posts()) : 
        ?>
        <div class="posts">
            <?php 
                while(have_posts()) : the_post()
            ?>
                <a class="post" href="<?php the_permalink() ?>">
                    <?php if(has_post_thumbnail()) : ?>
                        <img class="post-img" src="<?php the_post_thumbnail_url('smallest') ?>" />
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <h3><?php the_title() ?></h3>
                        <?php the_excerpt() ?>
                    </div>
                </a>
            <?php
                endwhile;
            ?>
        </div>
        <?php
            endif;  
        ?>

    </div>
<?php get_footer(); ?>