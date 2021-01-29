<?php 

$args = [
  'post_type' => 'post' ,
  'orderby' => 'date' ,
  'order' => 'DESC' ,
  'posts_per_page' => 3,
  'cat' => '7',
  'paged' => get_query_var('paged'),
  'post_parent' => $parent
]; 
$posts = new WP_Query($args);
if ( $posts->have_posts() ) :
?>

<div class="features-container">
    <div class="features-title">
        <div>
            <h1><?php echo $posts->query_vars["category_name"] ?></h1>
            <h3><?php echo category_description($args['cat']) ?></h3>
        </div>
    </div>
    <div class="features"> 
        <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

            <div class='feature'>
                <h2 class='feature-title'><?php echo the_title() ?></h2>
                <?php the_content() ?>
            </div>

        <?php endwhile; endif; ?>
    </div>
</div>