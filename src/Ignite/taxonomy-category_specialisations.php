<?php get_header(); ?>

<?php 
	$term = strtolower(str_replace(" ", "-", get_queried_object()->name));
	$term_url = get_queried_object()->slug;
	$taxonomy = get_queried_object()->taxonomy;
	$post_type = get_post_type();
	$post_type_url = get_post_type_archive_link($post_type);

?>

<?php 
$posts = get_posts(array(
	'post_type'         => $post_type,
	'post_status' 		=> 'publish',
	'posts_per_page'    => -1,
	'orderby'         	=> 'date',
	'order'            	=> 'DESC',
	'paged' => $paged,
	'tax_query' => array( 
	'relation' => 'AND',
	array(
		'taxonomy' => $taxonomy,
		'field'    => 'slug',
		'terms'    => $term,
		'operator' => 'IN'
	),
	),
));

	$args = array(
		'taxonomy'   => 
		'category_'.$post_type,
		'hide_empty' => false,
		'order'      => 'asc'
	);

	$categories = get_categories($args);

	$args2 = array(
		'taxonomy'   => 'tags_'.$post_type,
		'hide_empty' => false,
		'order'      => 'asc'
	);

	$tags = get_terms($args2);
?>

<section class="single-post-banner blue-bg">
  <div class="container">
    <div class="breadcrumbs"><a href="/specialisations"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Specialisations</a></div>
    <div class="title">
      <h1>Category: <?php echo get_queried_object()->name; ?></h1>
    </div>
  </div>
</section>

<section class="three-column-card">
    <div class="container card-container">
	  <?php if( $posts ): foreach( $posts as $post ): setup_postdata( $post );?>
      <div class="card-column box-shadow">
        <div class="image-wrapper">
		  <?php $featured_image_id = get_post_thumbnail_id(get_the_ID());
		  $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
		  $image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0]; ?>
          <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>"></a>
        </div>
        <div class="content-wrapper">
          <div class="title-wrapper">
			 <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
          </div>
          <p><?php echo wp_strip_all_tags(get_the_content()); ?></p>
          <a href="<?php the_permalink(); ?>" class="link-arrow">Read More</a>
        </div>
      </div>
	  <?php endforeach; wp_reset_postdata(); endif; ?>
    </div>
</section>

<?php get_footer(); ?>