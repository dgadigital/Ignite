<?php

/**
 * 	Template Name: Post style page
*/


get_header(); ?>
<?php $current_id = get_the_ID(); ?>
<main>
	<?php
	$featured_image_id = get_post_thumbnail_id(get_the_ID());
	$alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
	$image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0];
	 ?>


	<section class="single-post-banner blue-bg pb-0" style="background:url(<?php echo $image_url; ?>);">
      <div class="container">
        <div class="breadcrumbs"><?php if( function_exists( 'aioseo_breadcrumbs' ) ) aioseo_breadcrumbs(); ?></div>
				<div>
          <h1 class="title <?php echo $image_url? "text-white":"" ?>"><?php the_title(); ?></h1>
        </div>
        <div class="sub-title">
          <h2 class="<?php echo $image_url? "text-white":"" ?>"><?php echo date('d F Y', strtotime(get_the_date('j F Y'))); ?></h2>
        </div>
        <a href="#post-filter-side-bar" class="mouse-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="54" height="77" viewBox="0 0 54 77" fill="none">
            <g filter="url(#filter0_d_131_3567)">
            <path d="M20.0395 65.3925L13.9481 59.0823C13.7265 58.8682 13.4296 58.7498 13.1215 58.7524C12.8133 58.7551 12.5185 58.8787 12.3006 59.0966C12.0827 59.3145 11.9591 59.6093 11.9565 59.9175C11.9538 60.2256 12.0722 60.5225 12.2863 60.7442L19.3379 67.7959C19.446 67.9046 19.5745 67.9909 19.7161 68.0498C19.8577 68.1087 20.0095 68.1391 20.1629 68.1391C20.3204 68.1391 20.4732 68.1085 20.6165 68.0474C20.759 67.9888 20.8885 67.9025 20.9973 67.7935L28.0489 60.7418C28.263 60.5202 28.3814 60.2233 28.3787 59.9151C28.3761 59.607 28.2525 59.3122 28.0346 59.0943C27.8167 58.8764 27.5219 58.7528 27.2137 58.7501C26.9056 58.7474 26.6087 58.8659 26.3871 59.08L21.3429 64.1266L20.0395 65.3925Z" fill="#F5882B"/>
            <rect x="5.35938" y="2" width="29.6152" height="47.5" rx="14.8076" stroke="#F6892B" stroke-width="2.5">
              <animate
                attributeName="y"
                values="2;4;2"
                dur="3s"
                repeatCount="indefinite"/>
            </rect>
            <rect x="16.916" y="10.1475" width="32.1152" height="50" rx="16.0576" fill="#F6892B" fill-opacity="0.2">
              <animate
                attributeName="x"
                values="16.916;12;16.916"
                dur="3s"
                repeatCount="indefinite"/>
            </rect>
            <rect x="18.166" y="11.3975" width="4.00195" height="7.62285" rx="2.00098" stroke="#F6892B" stroke-width="2.5">
              <animate
                attributeName="y"
                values="11.3975;14.3975;11.3975"
                dur="3s"
                repeatCount="indefinite"/>
            </rect>
            </g>
          </svg>
        </a>
      </div>
    </section>

    <section id="post-filter-side-bar" class="post-filter-side-bar single-post">
      <div class="container flex-row-reverse">
        <div class="side-bar-accordion">
          <div class="recent-post box-shadow">
            <p class="title">Recent Posts</p>
						<?php
						global $post;
						$parent_slug = '';
						$parent_id = $post->post_parent;
						if ($parent_id) {
						    $parent = get_post($parent_id);
						    $parent_slug = $parent->post_name;
						}
						$child_pages = get_posts(array(
						    'post_type' => 'page',
						    'post_status' => 'publish',
						    'posts_per_page' => -1,
						    'post_parent' => $parent_id,
						));?>
						<div class="post-wrapper">
							<?php foreach ($child_pages as $child_page) {
							    		// Exclude current page from the list
									    if ($child_page->ID == $post->ID) {
									        continue;
									    }
									    // Generate link for each child page
									    $child_page_title = $child_page->post_title;
									    $child_page_url = get_permalink($child_page->ID);
											echo '<a class="links" href="' . $child_page_url . '"><p>' . $child_page_title . '</p></a><br>';
								}?>


						</div>
						<?php wp_reset_postdata(); ?>
          </div>


        </div>
        <div class="content-wrapper">
						<?php the_content(); ?>
						
        </div>
	  </div>

    </section>

</main>
<?php get_footer();  ?>
