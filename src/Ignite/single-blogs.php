<?php get_header(); ?>
<?php $current_id = get_the_ID(); ?>
<main>
	<section class="single-post-banner blue-bg pb-0">
      <div class="container">
        <div class="breadcrumbs"><a href="/blogs/">&lt; Back to Blogs</a></div>
        <div class="title">
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="sub-title">
          <h2><?php echo date('d F Y', strtotime(get_the_date('j F Y'))); ?></h2>
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
					$posts = get_posts(array(
						'post_type' => 'blogs',
						'post_status' => 'publish',
						'posts_per_page' => 3,
						'orderby' => 'date',
						'order' => 'DESC'
					));

					if($posts): ?>
		        <div class="post-wrapper">
				  <?php foreach($posts as $post):
				  setup_postdata( $post ); ?>
		          <a href="<?php the_permalink(); ?>" class="links"><p><?php the_title(); ?></p></a>
				  <?php endforeach; ?>
		        </div>
				  <?php endif; ?>
				  <?php wp_reset_postdata(); ?>
		      </div>
			  <div class="more-topics">
		        <p class="title">More on these topics</p>
				<?php
					$post = get_tags(array(
						'taxonomy'   => array( 'tags_blogs' ),
						'hide_empty' => false,
						'order'      => 'asc'
					)); ?>

		        <div class="post-wrapper">
				  <?php
				  if( $post ): foreach( $post as $pos ): setup_postdata( $pos );?>
		          <a href="<?php echo get_tag_link($pos->term_id); ?>" class="links"><p><?php echo $pos->name ?><i class="fa fa-chevron-right ml-2" aria-hidden="true"></i></p></a>
				  <?php endforeach; ?> <?php endif; ?>
		        </div>
				  <?php wp_reset_postdata(); ?>
		      </div>
		    </div>
		    <div class="content-wrapper">
		      <?php
				$posts = get_posts(array(
						'post_type' => 'blogs',
						'post_status' => 'publish',
						'posts_per_page' => 1,
						'orderby' => 'rand',
						'order' => 'DESC',
						'post__not_in' => array($current_id)
					));

				if($posts):
				$featured_image_id = get_post_thumbnail_id(get_the_ID());
				$alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
				$image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0];
			  ?>
			  <img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>">
		      <?php the_content(); ?>
		      <div class="next-article">
				<?php
				$next_post = get_adjacent_post(false, '', false);
				if ($next_post) : setup_postdata($next_post);
					$featured_image_id = get_post_thumbnail_id(get_the_ID());
					$alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
					$image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0];
				?>
				<div class="post">
					<div class="image-wrapper">
						<a href="<?php echo get_permalink($next_post); ?>"><?php echo get_the_post_thumbnail($next_post); ?></a>
					</div>

					<div class="content-wrapper">
						<p class="title">NEXT ARTICLE</p>
						<div class="image-wrapper mb-3">
							<a href="<?php echo get_permalink($next_post); ?>"><?php echo get_the_post_thumbnail($next_post); ?></a>
						</div>
						<h4 class="post-title"><?php echo get_the_title($next_post); ?></h4>
						<p><?php echo wp_strip_all_tags(substr(get_the_content($next_post), 0, 250) . "..."); ?></p>
						<a href="<?php echo get_permalink($next_post); ?>" class="link-arrow">Read More</a>
					</div>
				</div>
				<?php
					wp_reset_postdata();
				endif;
				?>
		      </div>
			  <?php endif; ?>
			  <div class="buttons-article mt-3">
				<?php echo previous_post_link('%link','<span class="btn-prev float-left"><i class="fa fa-chevron-left mr-2" aria-hidden="true"></i>Previous Article</span>',false); ?>
				<?php echo next_post_link('%link','<span class="btn-next float-right">Next Article<i class="fa fa-chevron-right ml-2" aria-hidden="true"></i></span>',false); ?>
		      </div>
		    </div>
		  </div>
		</section>


</main>
<?php get_footer();  ?>
