<?php get_header(); ?>

<?php $background_image = get_field('background_image'); ?>
<div style="background-image: url('<?php echo $background_image['url'] ?>')" class="home-section-1">
    <div class="container"> 
        <div>
            <h1 class="title"><?php the_field('title') ?></h1>
            <h2 class="subtitle"><?php the_field('subtitle') ?></h2>
            <?php
                $button = get_field('button');
            ?>
            <a class="btn btn-white" href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"><?php echo $button['title'] ?></a>
        </div>
    </div>
</div>

<?php
    if(have_posts()) {
        while(have_posts()) {
            the_post();
        }
    }
?>

<div class="home-section-2">
    <div class="container grid">
        <div>
            <?php the_content(); ?>
        </div>

        <?php if(has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('largest') ?>" />
        <?php endif; ?>
    </div>
</div>

<div class="home-section-3">
    <div class="container">
        <?php get_template_part( 'template-parts/features' ); ?>
    </div>
</div>

<div class="home-section-4">
    <div class="container">
        <?php get_template_part( 'template-parts/portfolio-cards' ); ?>
    </div>
</div>

<?php get_footer(); ?>