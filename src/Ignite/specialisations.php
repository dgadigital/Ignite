<?php

/**
 * 	Template Name: Specialisations
*/


get_header(); ?>
<main>

<?php if( have_rows('flex_content') ):?>
	<?php while (have_rows('flex_content') ): the_row();?>
		<!-- Start Banner -->
		<?php if (get_row_layout() == 'banner'): ?>
		<section class="hero-banner d-flex justify-content-center align-items-center" style="background-image: url('<?php echo esc_url(get_sub_field('image')['url']); ?>');">
			<div class="container">
				<div class="text-center <?php if( get_sub_field('add_content') && get_sub_field('add_button') ): ?>bottom-padding<?php endif;?>"><!-- if values for hero-desc and link for the button doesnt have value  add class "bottom-padding"-->
					<div class="hero-sub-title">
						<h2><?php the_sub_field('sub_title'); ?></h2>
					</div>
					<div class="hero-title">
						<h1><?php the_sub_field('title'); ?></h1>
					</div>
					<?php if( get_sub_field('add_content') ): ?><div class="hero-desc mx-auto my-4">
						<?php the_sub_field('content'); ?>
					</div><?php endif;?>
					<?php if( get_sub_field('add_button') ): ?><div class="btn-wrapper d-grid gap-2 d-sm-flex justify-content-sm-center">
						<?php if( get_sub_field('button') ): ?><a href="<?php echo esc_url(get_sub_field('button')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('button')['title']); ?></a><?php endif;?>
					</div><?php endif;?>
				</div>
			</div>
		</section>
		<section class="page-breadcrumbs p-4">
			<div class="container">
				<?php if( function_exists( 'aioseo_breadcrumbs' ) ) aioseo_breadcrumbs(); ?>
			</div>
		</section>
		<?php endif;?>
		<!-- End Banner -->

		<!-- Start Two Column Text and Roles -->
		<?php if (get_row_layout() == 'two_column_text_and_roles'): ?>
			<section class="two-column-text-sidebar pb-5 grey-bg">
				<div class="container">
					<div class="text-container">
						<?php if( have_rows('content_repeater') ): ?>
				  			<?php while( have_rows('content_repeater') ): the_row(); ?>
								<div class="content text-content">
									<h2 class="underline-left"><span><?php the_sub_field('content_title'); ?></span></h2>
									<p class="text-content"><?php the_sub_field('content'); ?></p>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="roles-container">
						<h2 class="underline-left"><span><?php the_sub_field('roles_title'); ?></span></h2>
						<?php if(get_sub_field("add_sub_title")):?>
							<p><?php the_sub_field('sub_title'); ?></p>
						<?php endif; ?>
						<div class="roles">
							<?php if(get_sub_field("link_roles")):?>
								<?php if( have_rows('link_roles_repeater') ): ?>
				  					<?php while( have_rows('link_roles_repeater') ): the_row(); ?>
										<p class="desc"><a href="/find-a-job/?keyword=<?php echo esc_html(get_sub_field('role')['title']); ?>" target="<?php echo esc_attr(get_sub_field('role')['target']); ?>" ><?php echo esc_html(get_sub_field('role')['title']); ?></a></p>
									<?php endwhile; ?>
								<?php endif; ?>
							<?php endif; ?>

							<?php if(get_sub_field("accordion_roles")):?>
								<div class="faq-accordion-section specialisation-accordion pb-3">
								  <div class="container px-0">
									<div class="accordion-outer-wrapper">
										<?php if( have_rows('accordion_roles_repeater') ): ?>
											<?php while( have_rows('accordion_roles_repeater') ): the_row(); ?>
											  <div class="accordion">
												<div class="content-wrapper">
												  <p class="accordion-title"><?php the_sub_field('accordion_title'); ?></p>
												  <div class="panel orange-ul black-font">
													<p><?php the_sub_field('panel'); ?></p>
												  </div>
												</div>
											  </div>
											<?php endwhile; ?>
										<?php endif; ?>
									</div>
								  </div>
								</div>
							<?php endif; ?>
						</div>
						<div class="button-container">
							<?php if( get_sub_field('button') ): ?><a href="<?php echo esc_url(get_sub_field('button')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('button')['title']); ?></a><?php endif;?>
						</div>

					</div>
				</div>
			</section>
		<?php endif; ?>
		<!-- End of Two Column Text and Role -->

		<!-- Start Fullwidth -->
		<?php if (get_row_layout() == 'full_width_text'): ?>
			<section class="full-width-text <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?> <?php echo (get_sub_field('text_center') ? 'text-center' : 'text-left'); ?> <?php echo (get_sub_field('padding_top') == 'Default' ? '' : 'pt-'); ?><?php echo (get_sub_field('padding_top') ? ''.get_sub_field('padding_top') : '0'); ?> <?php echo (get_sub_field('padding_bottom') == 'Default' ? '' : 'pb-'); ?><?php echo (get_sub_field('padding_bottom')); ?>" style="background-image: url('<?php the_sub_field('background_image'); ?>')">
				<div class="container orange-ul">

					<?php if(get_sub_field("text_center")):?>
						<?php if(get_sub_field("title")):?>
							<h2><span><?php the_sub_field('title'); ?></span></h2>
						<?php endif; ?>
					<?php else: ?>
						<?php if(get_sub_field("title")):?>
							<h2 class="underline-left"><span><?php the_sub_field('title'); ?></span></h2>
						<?php endif; ?>
					<?php endif; ?>

					<div class="text-content"><?php the_sub_field('content'); ?></div>
					<?php if(get_sub_field("add_image")):?>
						<img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" />
					<?php endif; ?>
					<?php if(get_sub_field("add_button")):?>
						<div class="btn-wrapper">
							<a href="<?php echo esc_url(get_sub_field('button_link')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button_link')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('button_link')['title']); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
		<!-- End of Fullwidth -->

		<!-- Start Card Carousel -->
		<?php if (get_row_layout() == 'card_carousel'): ?>
			<section class="card-carousel <?php echo (get_sub_field('padding_top') == 'Default' ? '' : 'pt-'); ?><?php echo (get_sub_field('padding_top') ? ''.get_sub_field('padding_top') : '0'); ?> <?php echo (get_sub_field('padding_bottom') == 'Default' ? '' : 'pb-'); ?><?php echo (get_sub_field('padding_bottom')); ?> <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'White Vector' ? 'white-top-bg-vector' : ''); ?>">
				 <div style="height: 7px; margin-bottom: 70px; background-color: #fff; box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.122132);"></div>
				<div class="container">
					<h2 class="text-center"><span><?php the_sub_field('heading'); ?></span></h2>
					<?php if(get_sub_field("add_text")):?>
					<div class="top-text-wrapper px-2 text-center">
						<p style="color: #000"><?php the_sub_field('top_text'); ?><p>
					</div>
					<?php endif; ?>
					<div class="card-carousel-container">
						<?php if( have_rows('card_repeater') ): ?>
							<?php while( have_rows('card_repeater') ): the_row(); ?>
							<div class="card">
								<div class="card-img">
									<a href="<?php echo esc_url(get_sub_field('card_link')['url']); ?>">
										<img src="<?php echo esc_url(get_sub_field('card_image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('card_image')['alt']); ?>"/>
									</a>
								</div>
								<div class="card-body">
									<a href="<?php echo esc_url(get_sub_field('card_link')['url']); ?>"><h2><?php the_sub_field('card_title'); ?></h2></a>
									<?php if( get_sub_field('card_link') ): ?><a href="<?php echo esc_url(get_sub_field('card_link')['url']); ?>" class="btn btn-arrow pl-0 py-0"><?php echo esc_html(get_sub_field('card_link')['title']); ?></a><?php endif;?>
								</div>
							</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<?php if(get_sub_field("add_text")):?>
					<div class="bottom-text-wrapper px-2 text-center">
						<p style="color: #000"><?php the_sub_field('bottom_text'); ?><p>
					</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
		<!-- End Card Carousel -->

		<!-- Start Blue Banner -->
		<?php if (get_row_layout() == 'blue_banner'): ?>
		<section class="blue-banner <?php echo (get_sub_field('padding_top') == 'Default' ? '' : 'pt-'); ?><?php echo (get_sub_field('padding_top') ? ''.get_sub_field('padding_top') : '0'); ?> <?php echo (get_sub_field('padding_bottom') == 'Default' ? '' : 'pb-'); ?><?php echo (get_sub_field('padding_bottom')); ?> <?php echo (get_sub_field('add_absolute_vector_background') ? 'white-bg-vector-absolute' : ''); ?>">
			<div class="content-container container">
				<div class="section-title">
					<h2><?php the_sub_field('title'); ?></h2>
				</div>
				<div class="btn-wrapper">
					<?php if( get_sub_field('button_left') ): ?><a href="<?php echo esc_url(get_sub_field('button_left')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button_left')['target']); ?>" class="btn btn-solid py-2"><?php echo esc_html(get_sub_field('button_left')['title']); ?></a><?php endif;?>
					<?php if( get_sub_field('button_right') ): ?><a href="<?php echo esc_url(get_sub_field('button_right')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button_right')['target']); ?>" class="btn btn-border py-2"><?php echo esc_html(get_sub_field('button_right')['title']); ?></a> --><!-- if blank it will not appear --><?php endif;?>
				</div>
			</div>
		</section>
		<?php endif;?>
		<!-- End Blue Banner -->

		<!-- Start Logo Carousel -->
		<?php if (get_row_layout() == 'logo_carousel'): ?>
		<section class="logo-carousel">
			<div class="carousel-container container">
				<div class="section-title text-center">
					<h2><?php the_sub_field('title'); ?></h2>
				</div>
				<div class="logo-row <?php echo (get_sub_field('two_rows') ? 'two-rows' : 'one-row'); ?>">
					<?php if( have_rows('logo_repeater') ): ?>
						<?php while( have_rows('logo_repeater') ): the_row(); ?>
							<?php if( get_sub_field('logo_link') ): ?>
								<a href="<?php echo esc_url(get_sub_field('logo_link')['url']); ?>" target="<?php echo esc_attr(get_sub_field('logo_link')['target']); ?>" >
									<div class="logo-container"><img src="<?php echo esc_url(get_sub_field('logo')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('logo')['alt']); ?>"/></div>
								</a>
							<?php endif;?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<?php endif;?>
		<!-- End Logo Carousel -->

		<!-- Start Forms -->
		<?php if (get_row_layout() == 'section_form'): ?>
		<section class="blue-bg" id="contact_form">
		  <div class="container px-lg-5">
			<h2 class="text-center mb-5 px-lg-5"><span><?php the_sub_field('title'); ?></span></h2>
			<div class="multi-level-form box-shadow">
				<?php the_sub_field('form_shortcode'); ?>
			</div>
		  </div>
		</section>
		<?php endif;?>
		<!-- End Forms -->


	<?php endwhile;?>
<?php endif;?>





</main>
<?php get_footer();  ?>
