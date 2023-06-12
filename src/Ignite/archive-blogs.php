<?php get_header(); ?>

<main>
	
<?php $flexible_content = get_field('flex_content_blogs', 'option', 'blogs-post-type-options');

if ($flexible_content) {
    foreach ($flexible_content as $field) { ?>
	
	<!-- START BANNER -->
	<?php if ($field['acf_fc_layout'] == 'banner') : ?>
	<section class="hero-banner d-flex justify-content-center align-items-center" style="background: linear-gradient(0deg, rgba(0, 40, 144, 0.54), rgba(0, 40, 144, 0.54)), linear-gradient(90.09deg, #FFFFFF -5.41%, rgba(255, 255, 255, 0) 2.91%, rgba(255, 255, 255, 0) 11.41%, #FFFFFF 50vw), url('<?php echo esc_url($field['image']['url']); ?>');">  
        <div class="container">
            <div class="text-center <?php if( $field['add_content'] && $field['add_button'] ): ?>bottom-padding<?php endif;?>"><!-- if values for hero-desc and link for the button doesnt have value  add class "bottom-padding"-->
                <div class="hero-sub-title">
                    <h2><?php echo $field['sub_title']; ?></h2>
                </div>
                <div class="hero-title">
                    <h1><?php echo $field['title']; ?></h1>
                </div>
                <?php if( $field['add_content'] ): ?><div class="hero-desc mx-auto my-4">
                    <?php echo $field['content']; ?>
                </div><?php endif;?>
                <?php if( $field['add_button'] ): ?><div class="btn-wrapper d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <?php if( $field['button'] ): ?><a href="<?php echo esc_url($field['button']['url']); ?>" target="<?php echo esc_attr($field['button']['target']); ?>" class="btn btn-solid"><?php echo esc_html($field['button']['title']); ?></a><?php endif;?>
                </div><?php endif;?>
            </div>
        </div>
    </section>
	<?php endif;?>
	<!-- END BANNNER -->

    <section class="full-width-text blue-bg pb-5">
        <div class="container">
            <h2><span>Get an edge with our resources</span></h2>
            <p>At Ignite, we understand that the job market in Australia is constantly evolving, and it can be challenging to stay competitive, both as an employee and employer.</p>
            <p>But you can stay ahead of the game by being informed with leading-edge findings and content.</p>
            <p>Whether you're looking for resources, information or tips from an employer or organisation's perspective, or as someone who is looking for jobs in Australia or up levelling your career, you can find helpful guidance through our regularly updated blog.</p>
            <p>Browse through our in-depth articles and blog posts about industry news, career advice, job tips, and so much more.</p>
            <div class="button-wrapper">
              <a href="/" class="btn btn-solid">Choose a category</a>
            </div>
        </div>
    </section>

    <section class="post-filter-side-bar">
      <div class="container">
        <div class="side-bar-accordion">
          <div class="tab-content">
            <div id="categories" class="active-tab">
              <div class="accordion active">
                <div class="content-wrapper">
                  <p class="accordion-title">Categories</p>
                  <div class="panel select">
					<?php 
					$args = array(
						'taxonomy'   => array( 'category_blogs', 'category_insights' ),
						'hide_empty' => false,
						'order'      => 'asc'
					);

					$categories = get_categories($args);?>
					<?php if( $categories ): foreach( $categories as $category ):?>
                    <label>
                      <input type="checkbox" name="position_of_interest" value="<?php echo $category->name; ?>">
                      <span class="label"><?php echo $category->name; ?></span>
                    </label>
					<?php endforeach; ?> <?php endif; ?>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="post-filter">
          <div class="row-container">
            <div class="filter-container">
              <div class="dropdown">
                <select class="js-select2" id="filter-dropdown-category" multiple="multiple">
                  <option value="O1" data-badge="">attracting and recruiting talent</option>
                  <option value="O2" data-badge="">diversity and inclusion</option>
                  <option value="O3" data-badge="">emerging workforce trends</option>
                  <option value="O4" data-badge="">employee engagement</option>
                  <option value="O5" data-badge="">employee retention</option>
                  <option value="O6" data-badge="">employee value proposition</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row-container mb-3">
            <div class="filter-container search-field box-shadow">
              <div class="search-field">
                <input type="text" placeholder="Search by keyword" id="search-box">
                <button id="search-btn" class="btn btn-search btn-solid"><span class="fa fa-search"></span></button>
              </div>
            </div>
          </div>
			<?php 
				$posts = get_posts(array(
					'post_type' => array( 'blogs', 'insights' ),
					'post_status' => 'publish',
					'posts_per_page' => 6,
					'orderby' => 'date',
					'order' => 'DESC'
				));
			if($posts): ?>
			<?php $i=0; foreach($posts as $post): $i++;?> <?php endforeach; ?>
          <h3 class="found-article">Found <?php echo $i; ?> Articles</h3>
          <div class="post-list column-2">
			  <?php foreach($posts as $post): 
			  setup_postdata( $post ); $i++;?>
			<div class="post">
              <div class="image-wrapper">
				<?php $featured_image_id = get_post_thumbnail_id(get_the_ID());
				$alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
				$image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0]; ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>"></a>
              </div>
              <div class="content-wrapper">
                <a href="<?php the_permalink(); ?>"><h4 class="post-title"><?php the_title(); ?></h4></a>
                <p><?php echo wp_strip_all_tags(get_the_content()); ?></p>
                <a href="<?php the_permalink(); ?>" class="link-arrow">Read More</a>
              </div>
			 </div>
			  <?php endforeach; ?>
          </div>
		  <?php endif; ?>
			<?php wp_reset_postdata(); ?>
          <div class="pagination mt-3">
            <span class="current-page">01</span> | <span class="total-page">03</span> <span class="prev-page cursor-pointer"><i class="fa fa-chevron-left" aria-hidden="true"></i></span><span class="next-page cursor-pointer"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </section>

    <section class="text-and-button">
      <div class="container">
          <div class="text-container short-gap">
              <h2>For more information</h2>
          </div>
          <div class="button-container">
            <a href="/" class="btn btn-solid btn-linkedin">Follow us on</a>
          </div>
      </div>
    </section>
		
<?php }
}
?>
	
</main>

<?php get_footer(); ?>