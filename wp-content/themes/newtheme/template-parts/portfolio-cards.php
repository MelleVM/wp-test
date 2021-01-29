<?php 

$data = [
  'post_type' => 'post',
  'orderby' => 'date',
  'order' => $_GET['sort'] ?? 'ASC',
  'posts_per_page' => $_GET['amount'] ?? $args['amount'] ?? 2,
  'cat' => '6',
  'paged' => get_query_var('paged'),
  'post_parent' => $parent
]; 
$posts = new WP_Query($data);
if ( $posts->have_posts() ) :
?>

<div class="posts-container">
    <div class="posts-title">
        <div>
            <h1><?php echo $posts->query_vars["category_name"] ?? "" ?> </h1>
            <h3><?php echo category_description($args['catgu']) ?? "" ?></h3>
        </div>
    </div>
    <form method="GET" class="filters">
        <select onchange="this.form.submit()" name="sort" id="sort">
            <option <?php if($_GET['sort'] == "asc") echo "selected"; ?> value="asc">Ascending</option>
            <option <?php if($_GET['sort'] == "desc") echo "selected"; ?> value="desc">Descending</option>
        </select>
    </form>
    <div class="posts"> 
        <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

            <a class="post" href="<?php the_permalink() ?>">
                <?php if(has_post_thumbnail()) : ?>
                    <img class="post-img" src="<?php the_post_thumbnail_url('smallest') ?>" />
                <?php endif; ?>
                
                <div class="post-content">
                    <h3><?php the_title() ?></h3>
                    <?php the_excerpt() ?>
                </div>
            </a>

        <?php endwhile; endif; ?>
    </div>
    <?php if(!$args['amount'] ?? !$args['amount'] > 2) : ?>
        <div class="more-posts">
            <a href="<?php echo get_permalink( get_page_by_path('portfolio') ); ?>" class="btn btn-blue">More Projects</a>
        </div>
    <?php endif; ?>
</div>