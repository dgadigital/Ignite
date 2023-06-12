<?php 
/**
 * 	Template Name: Search Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); ?>

<main class="white-top-bg-vector">
	<div class="container">
        <div class="search-form-container my-5">
            <?php get_template_part( 'searchform' )?>
        </div>

        <?php if(!empty($_GET['s'])): ?>
        <div class="page-header mb-5">
            <h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ignite' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
        </div>
        <?php endif; ?>
    </div>
	<?php if(!empty($_GET['s'])): ?>
	<div class="three-column-card pt-0">
        <div id="post-container" class="container card-container">
			<?php 
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                's' => get_search_query(),
                'post_type' => array('insights', 'blogs'),
                'posts_per_page' => 9,
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $search_query = new WP_Query( $args ); 

            if ( $search_query->have_posts() ) : ?>
			<?php while ( $search_query->have_posts() ) : $search_query->the_post(); ?>
			<div class="card-column box-shadow" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="image-wrapper">
				  <?php $featured_image_id = get_post_thumbnail_id(get_the_ID());
			  $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
			  $image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0]; ?>
              <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>"></a>
				</div>
				<div class="content-wrapper" style="background-color:#fff;">
				  <div class="title-wrapper">
					<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
				  </div>
				  <p><?php echo wp_strip_all_tags(get_the_content()); ?></p>
				  <a href="<?php the_permalink(); ?>" class="link-arrow">Read More</a>
				</div>
			  </div>
			<?php endwhile; ?>
			
			
		</div>
			<div class="container pb-5 pt-5">
				<div class="load-more-wrapper text-center">
					<a href="#" id="search-all" class="load-more link-arrow-down" data-page="2">Load More</a>
				</div>
			</div>
		<?php else : ?>
             <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'your-theme' ); ?></p>
         <?php endif; 
         wp_reset_postdata(); ?>
	</div>
	
	<?php endif; ?>
	
	
</main>

<?php get_footer(); ?>
