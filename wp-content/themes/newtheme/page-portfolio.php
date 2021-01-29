<?php get_header(); ?>

<div class="main container">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php get_template_part( 'template-parts/portfolio-cards', null, [
        'amount' => 6
    ]); ?>
    <button id="portfolio-posts-btn">Load portfolio related blog posts</button>
    <div id="portfolio-posts-container"></div>
</div>

<?php get_footer(); ?>