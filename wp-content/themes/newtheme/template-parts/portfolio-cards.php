<?php 

$data = [
  'post_type' => 'projects',
  'orderby' => 'date',
  'order' => $_GET['sort'] ?? 'ASC',
  'posts_per_page' => $_GET['amount'] ?? $args['amount'] ?? 2,
]; 
$projects = new WP_Query($data);

if ( $projects->have_posts() ) :
?>

<div class="projects-container">
    <div class="projects-title">
        <div>
            <h1><?php echo $projects->query_vars["post_type"] ?? "" ?> </h1>
            <h3><?php echo category_description($args['cat']) ?? "" ?></h3>
        </div>
    </div>
    <form method="GET" class="filters">
        <select onchange="this.form.submit()" name="sort" id="sort">
            <option <?php if($_GET['sort'] == "asc") echo "selected"; ?> value="asc">Ascending</option>
            <option <?php if($_GET['sort'] == "desc") echo "selected"; ?> value="desc">Descending</option>
        </select>
    </form>
    <div class="projects"> 
        <?php while ( $projects->have_posts() ) : $projects->the_post(); ?>

            <a class="project" href="<?php the_permalink() ?>">
                <?php if(has_post_thumbnail()) : ?>
                    <img class="project-img" src="<?php the_post_thumbnail_url('smallest') ?>" />
                <?php endif; ?>
                
                <div class="project-content">
                    <h3><?php the_title() ?></h3>
                    <?php the_excerpt() ?>
                    Project Type: <b><?php the_field('type') ?></b>
                </div>
            </a>

        <?php endwhile; endif; ?>
    </div>
    <?php if(!$args['amount'] ?? !$args['amount'] > 2) : ?>
        <div class="more-projects">
            <a href="<?php echo get_permalink( get_page_by_path('portfolio') ); ?>" class="btn btn-blue">More Projects</a>
        </div>
    <?php endif; ?>
</div>