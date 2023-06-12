<?php get_header(); ?>
<main>
<?php if( have_rows('flex_content') ):?>
	<?php while (have_rows('flex_content') ): the_row();?>

	<!-- START BANNER -->
	<?php if (get_row_layout() == 'banner'): ?>
	<section class="hero-banner d-flex justify-content-center align-items-center" style="background:url(<?php echo get_sub_field('image')['url']; ?>);">
		<?php
			$padding_bottom = get_sub_field('padding_bottom');

			switch ($padding_bottom) {
			    case '0':
		        $padding_bottom = 'pb-0';
		        break;
					case '1':
		        $padding_bottom = 'pb-1';
		        break;
					case '2':
		        $padding_bottom = 'pb-2';
		        break;
					case '3':
		        $padding_bottom = 'pb-3';
		        break;
					case '4':
		        $padding_bottom = 'pb-4';
		        break;
					case '5':
		        $padding_bottom = 'pb-5';
		        break;
					case 'Default':
						$padding_bottom = '';
						break;
			}
		?>
		<div class="container <?php echo $padding_bottom;?>">


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
	<?php endif;?>
	<!-- END BANNNER -->

	<!-- START BLUE BANNER -->
	<?php if (get_row_layout() == 'blue_banner'): ?>
	<section class="blue-banner <?php echo (get_sub_field('padding_top') == 'Default' ? '' : 'pt-'); ?><?php echo (get_sub_field('padding_top') ? ''.get_sub_field('padding_top') : '0'); ?> <?php echo (get_sub_field('padding_bottom') == 'Default' ? '' : 'pb-'); ?><?php echo (get_sub_field('padding_bottom')); ?> <?php echo (get_sub_field('add_absolute_vector_background') ? 'white-bg-vector-absolute' : ''); ?> <?php echo (get_sub_field('blue_background_section') ? 'blue-bg' : ''); ?>">
        <div class="content-container container">
            <div class="section-title">
                <h2><?php the_sub_field('title'); ?></h2>
            </div>
            <div class="btn-wrapper">
                <?php if( get_sub_field('button_left') ): ?>
									<a href="<?php echo esc_url(get_sub_field('button_left')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button_left')['target']); ?>" class="btn btn-solid py-2"><?php echo esc_html(get_sub_field('button_left')['title']); ?></a>
								<?php endif;?>
                <?php if( get_sub_field('button_right') ): ?>
									<a href="<?php echo esc_url(get_sub_field('button_right')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button_right')['target']); ?>" class="btn btn-border py-2"><?php echo esc_html(get_sub_field('button_right')['title']); ?></a>
									<!-- if blank it will not appear -->
								<?php endif;?>
            </div>
        </div>
    </section>
	<?php endif;?>
	<!-- END BLUE BANNNER -->

	<!-- START FULL WIDTH TEXT -->
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
					<?php if( get_sub_field('image') ): ?><img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" /><?php endif;?>
				<?php endif; ?>
				<?php if(get_sub_field("add_button")):?>
					<div class="btn-wrapper py-3">
						<?php if( get_sub_field('button_link') ): ?><a href="<?php echo esc_url(get_sub_field('button_link')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button_link')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('button_link')['title']); ?></a><?php endif;?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
	<!-- END FULL WIDTH TEXT -->

	<!-- START BOARD MEMBERS -->
	<?php if (get_row_layout() == 'board_members'): ?>
		<section class="board-members pt-5 <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
			<div class="container">
				<h2 class="underline-left center-mobile"><span><?php the_sub_field('title'); ?></span></h2>
				<?php if( have_rows('board_member_repeater') ): ?>
					<?php while( have_rows('board_member_repeater') ): the_row(); ?>
						<div class="content-container pb-2 <?php echo (get_sub_field('border_bottom') ? 'border-bottom' : ''); ?>">
							<div class="image-container">
								<img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>">
							</div>
							<div class="text-container">
								<h3><?php the_sub_field('name'); ?></h3>
								<h6><?php the_sub_field('position'); ?></h6>
								<div class="button-container pb-2">
									<?php if( have_rows('socials_repeater') ): ?>
										 <?php while( have_rows('socials_repeater') ): the_row(); ?>
										 <a href="<?php echo esc_url(get_sub_field('image_url')['url']); ?>">
											 <img src="<?php echo esc_url(get_sub_field('social_icon')['url']); ?>" target="<?php echo esc_attr(get_sub_field('social_icon')['target']); ?>" alt="<?php echo esc_attr(get_sub_field('social_icon')['alt']); ?>" />
										 </a>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
								<p><?php the_sub_field('content'); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
	<!-- END BOARD MEMBERS -->

	<!-- START HR/SEPARATOR -->
	<?php if (get_row_layout() == 'separator'): ?>
		<section class="separator <?php echo (get_sub_field('padding_top') == '0' ? 'pt-0' : ''); ?> <?php echo (get_sub_field('padding_top') == '1' ? 'pt-1' : ''); ?> <?php echo (get_sub_field('padding_top') == '2' ? 'pt-2' : ''); ?> <?php echo (get_sub_field('padding_top') == '3' ? 'pt-3' : ''); ?> <?php echo (get_sub_field('padding_top') == '4' ? 'pt-4' : ''); ?> <?php echo (get_sub_field('padding_top') == '5' ? 'pt-5' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '0' ? 'pb-0' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '1' ? 'pb-1' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '2' ? 'pb-2' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '3' ? 'pb-3' : ''); ?><?php echo (get_sub_field('padding_bottom') == '4' ? 'pb-4' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '5' ? 'pb-5' : ''); ?><?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
		  <div class="container">
			<hr style="position: relative; height: 2px; margin: 0;" class="<?php if( get_sub_field('blue_line') ): ?> blue-line <?php endif; ?>">
		  </div>
		</section>
	<?php endif; ?>
	<!-- END HR/SEPARATOR -->

	<!-- START PARTNERSHIPS -->
	<?php if (get_row_layout() == 'partnerships'): ?>
		<section class="partnerships py-5">
			<div class="container">
			  <h2 class="underline-left center-mobile"><span><?php the_sub_field('heading'); ?></span></h2>
			  <?php if( have_rows('partnership_repeater') ): ?>
					<?php while( have_rows('partnership_repeater') ): the_row(); ?>
					  <div class="content-container <?php echo (get_sub_field('border_bottom') ? 'border-bottom' : ''); ?>">
						  <div class="text-container">
							  <h4 class="title"><?php the_sub_field('title'); ?></h4>
							  <p class="text-content">
								  <?php the_sub_field('description'); ?>
							  </p>
						  </div>
						  <div class="image-container">
							 <?php if( have_rows('logo_repeater') ): ?>
								<?php while( have_rows('logo_repeater') ): the_row(); ?>
									 <div class="image-container">
										 <a href="<?php echo esc_url(get_sub_field('logo_link')['url']); ?>">
											 <img src="<?php echo esc_url(get_sub_field('logo_image')['url']); ?>" target="<?php echo esc_attr(get_sub_field('logo_image')['target']); ?>" alt="<?php echo esc_attr(get_sub_field('logo_image')['alt']); ?>" />
										 </a>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						  </div>
					  </div>
				<?php endwhile; ?>
			 <?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
	<!-- END PARTNERSHIPS -->

	<!-- START TWO COLUMN TEXT -->
	<?php if (get_row_layout() == 'two_column_text'): ?>

	<section class="two-column-text <?php echo (get_sub_field('padding_top') == '0' ? 'pt-0' : ''); ?> <?php echo (get_sub_field('padding_top') == '1' ? 'pt-1' : ''); ?> <?php echo (get_sub_field('padding_top') == '2' ? 'pt-2' : ''); ?> <?php echo (get_sub_field('padding_top') == '3' ? 'pt-3' : ''); ?> <?php echo (get_sub_field('padding_top') == '4' ? 'pt-4' : ''); ?> <?php echo (get_sub_field('padding_top') == '5' ? 'pt-5' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '0' ? 'pb-0' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '1' ? 'pb-1' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '2' ? 'pb-2' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '3' ? 'pb-3' : ''); ?><?php echo (get_sub_field('padding_bottom') == '4' ? 'pb-4' : ''); ?> <?php echo (get_sub_field('padding_bottom') == '5' ? 'pb-5' : ''); ?><?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
        <div class="container">
			<h2 class="underline-left"><span><?php the_sub_field('title'); ?></span></h2>
            <div class="column-wrapper">
                <div class="left-col">
                    <div class="text-container text-content">
                        <?php the_sub_field('left_column_content'); ?>
                    </div>
                </div>
                <div class="right-col">
                    <div class="text-container text-content">
                        <?php the_sub_field('right_column_content'); ?>
                    </div>
                </div>
            </div>
			<?php if( get_sub_field('button_link') ): ?><div class="btn-wrapper">
				<a href="<?php echo esc_url(get_sub_field('button_link')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button_link')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('button_link')['title']); ?></a>
			</div><?php endif;?>
        </div>
    </section>

	<?php endif; ?>
	<!-- END TWO COLUMN TEXT -->

	<!-- START PROFILE CAROUSEL -->
	<?php if (get_row_layout() == 'profile_carousel'): ?>
		<section class="profile-carousel <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
		  <div class="profile-container container">
			  <div class="section-title-container">
				  <?php
						$link = get_sub_field('button');
						if( $link ){
							$link_url = esc_url($link['url']);
							$link_title = esc_attr($link['title']);
							$link_target = esc_html($link['target'] ? $link['target'] : '_self');
						}?>

							<div class="section-title">
								<h2 class="underline-left"><span><?php echo  get_sub_field('heading')?></span></h2>
								<div><a href="<?php echo $link_url?>" target="<?php echo $link_target ?>" class="btn btn-solid"><?php echo $link_title?></a></div>
							</div>
							<div class="section-description px-2"><?php echo get_sub_field('sub_heading')?></div>
			  </div>

			  <div class="profile-row profile-slider">

				  <?php


						if (have_rows('profile_repeater')) {
							while (have_rows('profile_repeater')) {
								the_row();
								?>
									<div class="profile-container column hover-overlay-orange">
										<div class="profile-wrapper">
											<img src="<?php echo esc_url(get_sub_field('profile_image')['url'])?>" alt="<?php echo esc_attr(get_sub_field('profile_image')['alt'])?>"/>
											<div class="content">
												<h2><?php echo get_sub_field('name')?></h2>
												<span><?php echo get_sub_field('position') ?></span>

												<?php
												$profilelink = get_sub_field('link');
												if( $profilelink ){
													$profilelink_url = esc_url($profilelink['url']);
													$profilelink_title = esc_attr($profilelink['title']);
													$profilelink_target = esc_html($profilelink['target'] ? $profilelink['target'] : '_self');?>
															<a href="<?php echo esc_url(get_sub_field('link')['url']) ?>" target="<?php echo esc_attr(get_sub_field('link')['target']) ?>" class="link-arrow"><?php echo esc_html(get_sub_field('link')['title'])?></a>
												<?php
												}?>







											</div>
										</div>
									</div>
									<?php
							}
						}

				  ?>
			  </div>
		  </div>
		</section>
	<?php endif; ?>
	<!-- END PROFILE CAROUSEL -->


	<!-- END TWO COLUMN WYSIWYG -->
	<?php if (get_row_layout() == 'two_column_wysiwyg'): ?>

<section class="two-column-text">
    <div class="container">
        <div class="column-wrapper">
            <div class="left-col">
                <h2 class="underline-left">
                    <span><?php the_sub_field('left_column_title'); ?></span>
                </h2>
                <div class="text-container text-content">
                    <?php the_sub_field('left_column_content'); ?>
                </div>
            </div>
            <div class="right-col">
                <div class="column-title">
                    <?php the_sub_field('right_column_title'); ?>
                </div>
                <div class="text-container text-content">
                    <?php the_sub_field('right_column_content'); ?>
                </div>
            </div>
        </div>
				<?php if( get_sub_field('bottom_image') ): ?>
					<div class="img-wrapper">
							<img src="<?php echo esc_url(get_sub_field('bottom_image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('bottom_image')['alt']); ?>"/>
					</div>
				<?php endif;?>
		</div>
</section>

<?php endif; ?>
<!-- END TWO COLUMN WYSIWYG -->


<!-- START LATEST JOBS -->
<?php if (get_row_layout() == 'latest_jobs'): ?>
	<section class="lastest-jobs-section" style=" background-image: url('<?php echo esc_url(get_sub_field('background_image')['url']); ?>');">
			<div class="jobs-container container">
					<div class="section-title-container">
						<?php if( get_sub_field('section_title') ): ?>
							<div class="section-title">
								<h2 class="underline-left"><span><?php the_sub_field('section_title');?></span></h2>

							</div>
						<?php endif;?>
						<?php if( get_sub_field('button_link') ): ?>

							<div><a href="<?php echo esc_url(get_sub_field('button_link')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button_link')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('button_link')['title']); ?></a></div>
						<?php endif;?>
					</div>
				
				
				<div id="list-jobs-response"></div>
				
				
				
				
					<div class="jobs-row">
							<div class="">
									<div class="job-card">
									<div class="job-category">IT General1</div>
									<div class="job-title">IT Service Desk Analyst</div>

									<div class="job-details">
											<div class="d-flex justify-content-between  mb-4">
													<div class="location">
															<div class="label">LOCATION</div>
															<div class="value">Western Australia</div>
													</div>
													<div class="jobtype">
															<div class="label">JOB TYPE</div>
															<div class="value">Contract</div>
													</div>

											</div>

											<div class="salary">
													<div class="label">SALARAY</div>
													<div class="value">Negotiable</div>
											</div>
									</div>

											<a href="/" class="btn btn-solid">Apply Now</a>

									</div>
							</div>
							<div class="">
									<div class="job-card">
									<div class="job-category">IT General2</div>
									<div class="job-title">IT Service Desk Analyst</div>

									<div class="job-details">
											<div class="d-flex justify-content-between  mb-4">
													<div class="location">
															<div class="label">LOCATION</div>
															<div class="value">Western Australia</div>
													</div>
													<div class="jobtype">
															<div class="label">JOB TYPE</div>
															<div class="value">Contract</div>
													</div>

											</div>

											<div class="salary">
													<div class="label">SALARAY</div>
													<div class="value">Negotiable</div>
											</div>
									</div>

											<a href="/" class="btn btn-solid">Apply Now</a>

									</div>
							</div>
							<div class="">
									<div class="job-card">
									<div class="job-category">IT General3</div>
									<div class="job-title">IT Service Desk Analyst</div>

									<div class="job-details">
											<div class="d-flex justify-content-between  mb-4">
													<div class="location">
															<div class="label">LOCATION</div>
															<div class="value">Western Australia</div>
													</div>
													<div class="jobtype">
															<div class="label">JOB TYPE</div>
															<div class="value">Contract</div>
													</div>

											</div>

											<div class="salary">
													<div class="label">SALARAY</div>
													<div class="value">Negotiable</div>
											</div>
									</div>

											<a href="/" class="btn btn-solid">Apply Now</a>

									</div>
							</div>
							<div class="">
									<div class="job-card">
									<div class="job-category">IT General4</div>
									<div class="job-title">IT Service Desk Analyst</div>

									<div class="job-details">
											<div class="d-flex justify-content-between  mb-4">
													<div class="location">
															<div class="label">LOCATION</div>
															<div class="value">Western Australia</div>
													</div>
													<div class="jobtype">
															<div class="label">JOB TYPE</div>
															<div class="value">Contract</div>
													</div>

											</div>

											<div class="salary">
													<div class="label">SALARAY</div>
													<div class="value">Negotiable</div>
											</div>
									</div>

											<a href="/" class="btn btn-solid">Apply Now</a>

									</div>
							</div>
							<div class="">
									<div class="job-card">
									<div class="job-category">IT General5</div>
									<div class="job-title">IT Service Desk Analyst</div>

									<div class="job-details">
											<div class="d-flex justify-content-between  mb-4">
													<div class="location">
															<div class="label">LOCATION</div>
															<div class="value">Western Australia</div>
													</div>
													<div class="jobtype">
															<div class="label">JOB TYPE</div>
															<div class="value">Contract</div>
													</div>

											</div>

											<div class="salary">
													<div class="label">SALARAY</div>
													<div class="value">Negotiable</div>
											</div>
									</div>

											<a href="/" class="btn btn-solid">Apply Now</a>

									</div>
							</div>
							<div class="">
									<div class="job-card">
									<div class="job-category">IT General6</div>
									<div class="job-title">IT Service Desk Analyst</div>

									<div class="job-details">
											<div class="d-flex justify-content-between  mb-4">
													<div class="location">
															<div class="label">LOCATION</div>
															<div class="value">Western Australia</div>
													</div>
													<div class="jobtype">
															<div class="label">JOB TYPE</div>
															<div class="value">Contract</div>
													</div>

											</div>

											<div class="salary">
													<div class="label">SALARAY</div>
													<div class="value">Negotiable</div>
											</div>
									</div>

											<a href="/" class="btn btn-solid">Apply Now</a>

									</div>
							</div>

					</div>
					<div class="pagination-wrapper">
							<div class="page-location">
									<div class="dot-container"></div>
									<div id="index" class="pagetext"></div>
									<div class="pagetext"> | </div>
									<div id="num-items" class="pagetext"></div>
							</div>

							<div class="pagination-container"></div>
					</div>
			</div>
	</section>
<?php endif; ?>
<!-- END LATEST JOBS -->
<!-- START Fullwidth-card -->
<?php if (get_row_layout() == 'fullwidth_card'): ?>
	<section class="Fullwidth-card" style=" background-image: url('<?php echo esc_url(get_sub_field('background_image')['url']); ?>');">
		<div class="Fullwidth-card-container container">
				<div class="row">
						<div class="Fullwidth-card-column col-lg-6 col-12 ">
								<div class="Fullwidth-card-body">
									<?php if( get_sub_field('card_title') ): ?>
										<div class="card-title">
												<h2 class="underline-left"><span><?php the_sub_field('card_title');?></span></h2>
										</div>
									<?php endif;?>

										<div class="card-text">
											<?php

											if( have_rows('text_repeater') ):
													// Loop through rows.
													while( have_rows('text_repeater') ) : the_row();
															// Load sub field value.
															?>
															<div class="value-container">
																	<h3><?php echo get_sub_field('title') ? get_sub_field('title') : ''; ?></h3>
																	<p><?php echo get_sub_field('text') ? get_sub_field('text') : ''; ?></p>
															</div>
															<?php
													// End loop.
													endwhile;
											endif;?>

										</div>

								</div>
						</div>

				</div>
		</div>
</section>
<?php endif; ?>
<!-- END Fullwidth-card -->


	<!-- START CONTACT US -->
	<?php if (get_row_layout() == 'contact_us'): ?>
		<section class="contact-us pt-0">
		  <h2 class="text-center my-5"><?php the_sub_field('heading'); ?></h2>
		  <div class="container wrapper">
			<div class="row">
			  <div class="container tab-wrapper box-shadow">
				<!-- Tabs Start -->
				<div class="container tabs">
				  <ul class="list-inline tab-list">
					<li id="select-1" class="active">
					  <h3><?php the_sub_field('left_tab_name'); ?></h3>
					</li>
					<li id="select-2" class="">
					  <h3><?php the_sub_field('right_tab_name'); ?></h3>
					</li>
				  </ul>
				</div>
				<!-- Tabs End -->

				<!-- Tabs Content Start -->
				<div class="container body-content">
				  <div class="tabs-content active" id="content-select-1">
					<div class="form-container">
					  <?php the_sub_field('left_form_shortcode'); ?>
					</div>
				  </div>

				  <div class="tabs-content no-spacing" id="content-select-2">
					<div class="submit-cv">

					  <div class="container p-0">
						<div class="multi-level-form w-100">

						  <div class="form-layout">
							<div class="form-header no-background-img">
							  Step 1: Choose file
							</div>
							<div class="form-body">
							  <div class="form-row">
								<div class="form-group col-6">
								  <div class="upload-file">
									<input type="file" id="real-file" hidden="hidden" />
									<div id="upload-dummy" class="btn-pload">Upload Your Resume</div>
									<!-- <span id="custom-text">No file chosen, yet.</span> -->
								  </div>
								</div>
								<div class="form-group col-md-6">
								</div>
							  </div>
							</div>
							<div class="form-header no-background-img">
							  Step 2: Contact Information
							</div>
							<div class="form-body">

							  <div class="form-row">
								<div class="form-group col-6">
								  <input type="text" class="form-control no-border" placeholder="First Name*">
								</div>
								<div class="form-group col-md-6">
								  <input type="text" class="form-control no-border" placeholder="Last Name*">
								</div>
							  </div>

							  <div class="form-row">
								<div class="form-group col-6">
								  <input type="email" class="form-control no-border" placeholder="Email Address*">
								</div>
								<div class="form-group col-md-6">
								  <input type="text" class="form-control no-border" placeholder="Phone Number*">
								</div>
							  </div>

							  <div class="form-row">
								<div class="form-group col-6">
								  <select class="form-control no-border">
									<option selected>Available from</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								  </select>
								</div>
								<div class="form-group col-md-6">
								  <select class="form-control no-border">
									<option selected>Specialisation</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								  </select>
								</div>
							  </div>

							  <div class="form-row">
								<div class="form-group col-6">
								  <select class="form-control no-border">
									<option selected>Job Type</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								  </select>
								</div>
								<div class="form-group col-md-6">
								  <select class="form-control no-border">
									<option selected>Office near you</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								  </select>
								</div>
							  </div>

							  <div class="form-row">
								<div class="form-group col-6">
								  <input type="text" class="form-control no-border" placeholder="Postcode">
								</div>
								<div class="form-group col-md-6">
								</div>
							  </div>

							  <div class="wpcf7-form-control wpcf7-checkbox v2">
								<span class="wpcf7-list-item">
								  <label>
									<input type="checkbox" name="" value="">
									<span class="wpcf7-list-item-label">I have read and accept the <strong><a href="/" class="underlined">terms of use</a></strong> and the processing of my personal information in accordance with the <strong><a href="/" class="underlined">Ignite privacy notice</a></strong>. This privacy notice also contains details about how you can contact us about our use of your personal information, including how to access or correct it.</span>
								  </label>
								</span>
							  </div>

							  <div class="wpcf7-form-control wpcf7-checkbox v2">
								<span class="wpcf7-list-item">
								  <label>
									<input type="checkbox" name="" value="">
									<span class="wpcf7-list-item-label">Sign up to receive AI matched job recommendation emails, career advice and the latest salary data.</span>
								  </label>
								</span>
							  </div>

							  <div class="submit-btn">
								<button type="submit" class="btn btn-solid">Submit your resume</button>
							  </div>

							</div>
						  </div>


						</div>

					  </div>

					</div>
				  </div>
				</div>
				<!-- Tabs Content End -->
			  </div>
			</div>
		  </div>
		</section>
	<?php endif; ?>
	<!-- END CONTACT US -->

	<!-- START COLLAPSING TEXT -->
	<?php if (get_row_layout() == 'collapsing_text'): ?>
		<section class="collapsing-text <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
		  <div class="container">
				<?php if(get_sub_field("heading")):?>
						<h2 class="text-center"><span><?php the_sub_field('heading'); ?></span></h2>
				<?php endif; ?>
				<?php if(get_sub_field('heading_image')['url']):?>
					<img class="tracer" src="<?php echo esc_url(get_sub_field('heading_image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('heading_image')['alt']); ?>" />
				<?php endif; ?>
			<div class="card-container">
				<?php if( have_rows('collapsing_repeater') ): ?>
					<?php while( have_rows('collapsing_repeater') ): the_row(); ?>
					  <div class="box box-shadow">
						<h2><?php the_sub_field('title'); ?></h2>
						<div class="text-wrapper text-content">
							<?php the_sub_field('content'); ?>
						</div>
						<a href="javascript:void;" class="btn readmore-btn p-0">Read More +</a>
					  </div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		  </div>
		</section>
	<?php endif; ?>
	<!-- END COLLAPSING TEXT -->

	<!-- START CARD CAROUSEL -->
	<?php if (get_row_layout() == 'card_carousel'): ?>
		<section class="card-carousel <?php echo (get_sub_field('padding_top') == 'Default' ? '' : 'pt-'); ?><?php echo (get_sub_field('padding_top') ? ''.get_sub_field('padding_top') : '0'); ?> <?php echo (get_sub_field('padding_bottom') == 'Default' ? '' : 'pb-'); ?><?php echo (get_sub_field('padding_bottom')); ?> <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'White Vector' ? 'white-top-bg-vector' : ''); ?>">
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
								<?php if( get_sub_field('card_link') ): ?><a href="<?php echo esc_url(get_sub_field('card_link')['url']); ?>" class="btn btn-arrow pl-0 py-0">Learn More</a><?php endif;?>
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
	<!-- END CARD CAROUSEL -->

	<!-- START TWO COLUMN TEXT IMAGE -->
		<?php if (get_row_layout() == 'two_column_text_image'): ?>
		<section class="two-column-text-image <?php if( get_sub_field('remove_title') ): ?>without-title<?php endif;?> <?php if( get_sub_field('remove_button') ): ?>without-button<?php endif;?> <?php if( get_sub_field('equal_columns_width') ): ?>equal-width<?php endif;?> <?php if( get_sub_field('reverse') ): ?>reverse<?php endif;?> <?php echo (get_sub_field('section_padding_top') == '0' ? 'pt-0' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '1' ? 'pt-1' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '2' ? 'pt-2' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '3' ? 'pt-3' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '4' ? 'pt-4' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '5' ? 'pt-5' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '0' ? 'pb-0' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '1' ? 'pb-1' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '2' ? 'pb-2' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '3' ? 'pb-3' : ''); ?><?php echo (get_sub_field('section_padding_bottom') == '4' ? 'pb-4' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '5' ? 'pb-5' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
			<div class="container">
				<?php if( get_sub_field('image') ): ?>
				<div class="image-wrapper">
					<img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_url(get_sub_field('image')['alt']); ?>" <?php if( get_sub_field('contain_image') ): ?>style="object-fit: contain; width: auto;"<?php endif;?>>
				</div>
				<?php endif;?>
				<div class="text-wrapper">
					<h2 class="underline-left"><span><?php the_sub_field('title'); ?></span></h2>
					<div class="text-content"><?php the_sub_field('content'); ?></div>
					<?php if( get_sub_field('button') ): ?>
					<div class="button-wrapper">
						<a href="<?php echo esc_url(get_sub_field('button')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('button')['title']); ?></a>
					</div>
					<?php endif;?>
				</div>
			</div>
		</section>
		<?php endif;?>
		<!-- END TWO COLUMN TEXT IMAGE -->

		<!-- START FAQ -->
		<?php if (get_row_layout() == 'faqs_accordion'): ?>
		<section class="faq-accordion-section grey-bg">
		  <div class="container">
			<div class="accordion-outer-wrapper">
			  <?php if( get_sub_field('accordion_section_title') ): ?><div class="title text-center mb-5">
				<h2><span><?php the_sub_field('accordion_section_title'); ?></span></h2>
			  </div><?php endif;?>
			  <?php if(have_rows('accordion_list')):
              while(have_rows('accordion_list')): the_row(); ?>
			  <div class="accordion">
				<div class="content-wrapper">
				  <p class="accordion-title"><?php the_sub_field('accordion_title'); ?></p>
				  <div class="panel">
					<?php the_sub_field('accordion_content'); ?>
				  </div>
				</div>
			  </div>
			  <?php endwhile; ?>
              <?php endif; ?>
			</div>
		  </div>
		</section>
		<?php endif;?>
		<!-- END FAQ -->

		<!-- START SIDE TABS CORPORATE INFORMATION -->
		<?php if (get_row_layout() == 'two_column_side_tabs_accordion'): ?>
		<section class="two-column-side-tabs-accordion blue-bg-vector">
		  <div class="container">
			<div class="title text-center mb-5">
			  <h2><span><?php the_sub_field('title'); ?></span></h2>
			</div>
		  </div>
		  <div class="container">
			<div class="accordion-container">
			  <?php if(have_rows('tabs')):
              while(have_rows('tabs')): the_row(); ?>
			  <div class="accordion-header"><?php the_sub_field('tab_title'); ?></div>
			  <div class="accordion-content option-absolute">
				<div class="content-wrapper box-shadow">
				  <h3 class="text-center font-weight-bold"><?php the_sub_field('content_title'); ?></h3>
				  <?php if( get_sub_field('content_sub_heading') ): ?><p class="text-center"><?php the_sub_field('content_sub_heading'); ?></p><?php endif; ?>
				  <?php if( get_sub_field('reportspdf') ): ?><div class="reports-wrapper">
					<?php if(have_rows('reportspdf_list')):
              		while(have_rows('reportspdf_list')): the_row(); ?>
					<div class="reports">
					  <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_url(get_sub_field('image')['alt']); ?>">
					  <a href="<?php echo esc_url(get_sub_field('link')['url']); ?>" target="<?php echo esc_attr(get_sub_field('link')['target']); ?>"><?php echo esc_html(get_sub_field('link')['title']); ?></a>
					</div>
					<?php endwhile; ?>
              		<?php endif; ?>
				  </div><?php endif; ?>
				  <?php if( get_sub_field('content_only') ): ?>
					<?php the_sub_field('content'); ?>
				  <?php endif; ?>
				</div>
			  </div>
			  <?php endwhile; ?>
              <?php endif; ?>
			</div>
		  </div>
		</section>
		<?php endif;?>
	<!-- END SIDE TABS CORPORATE INFORMATION -->

	<!-- START THREE COLUMN CARD -->
	  <?php if (get_row_layout() == 'three_column_card'): ?>
	  <section class="three-column-card <?php if( get_sub_field('big_image') ): ?>big-image<?php endif; ?> <?php if( get_sub_field('no_excerpt') ): ?>no-excerpt<?php endif; ?> <?php if( get_sub_field('one_line_title') ): ?>one-line-title<?php endif; ?>">
        <div class="container card-container">

		  <?php if(have_rows('card_list')):
          while(have_rows('card_list')): the_row(); ?>
          <div class="card-column box-shadow">
            <div class="image-wrapper">
              <a href=""><img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_url(get_sub_field('image')['alt']); ?>"></a>
            </div>
            <div class="content-wrapper">
              <div class="title-wrapper">
                <a href=""><h4><?php the_sub_field('title'); ?></h4></a>
              </div>
			  <?php if( get_sub_field('excerpt') ): ?><p><?php the_sub_field('excerpt'); ?></p><?php endif; ?>
              <a href="<?php echo esc_url(get_sub_field('link')['url']); ?>" target="<?php echo esc_attr(get_sub_field('link')['target']); ?>" class="link-arrow"><?php echo esc_html(get_sub_field('link')['title']); ?></a>
            </div>
          </div>
		  <?php endwhile; ?>
          <?php endif; ?>

        </div>
   	  </section>
	  <?php endif;?>
	<!-- END THREE COLUMN CARD -->

	<!-- START THREE COLUMN CARD w/ SEARCH FILTER -->
	<?php if (get_row_layout() == 'three_column_w_search_filter'): ?>
	<section class="three-column-card post-filter insights">
        <div class="container mb-5">
            <div class="row-container">
              <div class="filter-container box-shadow">
                <div class="search-field">
                  <input type="text" placeholder="Search by keyword" id="search-box">
                  <button id="search-btn" class="btn btn-solid green"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search-white.png" alt="search icon"></button>
                </div>
                <!-- <div class="dropdown">
                  <select class="js-select2" id="filter-dropdown-category" multiple="multiple">
                    <option value="O1" data-badge="">Option1</option>
                    <option value="O2" data-badge="">Option2</option>
                    <option value="O3" data-badge="">Option3</option>
                    <option value="O4" data-badge="">Option4</option>
                    <option value="O5" data-badge="">Option5</option>
                    <option value="O6" data-badge="">Option6</option>
                    <option value="O7" data-badge="">Option7</option>
                    <option value="O8" data-badge="">Option8</option>
                    <option value="O9" data-badge="">Option9</option>
                    <option value="O10" data-badge="">Option10</option>
                    <option value="O11" data-badge="">Option11</option>
                    <option value="O12" data-badge="">Option12</option>
                    <option value="O13" data-badge="">Option13</option>
                  </select>
                </div> -->
              </div>
            </div>
        </div>
		<?php
		if(get_sub_field('tags') == 'Career Advice' ? $result = 'career-advice' : '');
		if(get_sub_field('tags') == 'Employer Insights' ? $result = 'employer' : '');
		?>
		<input type="text" class="tag_search" value="<?php echo $result; ?>" hidden>
        <div class="container card-container">
		  <?php
			$posts = get_posts(array(
				'post_type' => 'Insights',
				'post_status' => 'publish',
				'posts_per_page' => 9,
				'orderby' => 'date',
				'order' => 'DESC',
				'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'tags_insights',
					'field'    => 'slug',
					'terms'    => $result,
				),
				),
			));?>
			<?php if($posts):
			foreach($posts as $post):
			setup_postdata( $post );?>
          <div class="card-column">
            <div class="image-wrapper">
			  <?php $featured_image_id = get_post_thumbnail_id(get_the_ID());
			  $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
			  $image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0]; ?>
              <a href=""><img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>"></a>
            </div>
            <div class="content-wrapper">
              <div class="title-wrapper">
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              </div>
              <p><?php echo wp_strip_all_tags(get_the_content()); ?></p>
              <a href="<?php the_permalink(); ?>" class="link-arrow">Read More</a>
            </div>
          </div>
		  <?php endforeach; ?>
		  <?php endif; ?>
        </div>
        <div class="container pb-5 pt-5">
            <div class="load-more-wrapper text-center">
                <a href="/" class="load-more link-arrow-down">Load More</a>
            </div>
        </div>
    </section>
	<?php endif;?>
	<!-- END THREE COLUMN CARD w/ SEARCH FILTER -->

	<!-- START OFFICE LOCATIONS -->
	<?php if (get_row_layout() == 'office_locations_section'): ?>
		<section class="office-locations-section <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
		  <div class="profile-container container">
			  <div class="section-title-container">
				  <div class="section-description text-center">
					<h2 class="px-3"><span><?php the_sub_field('heading'); ?></span></h2>
					<p><?php the_sub_field('sub_heading'); ?></p>
				  </div>

			  </div>

			  <div class="profile-row office-locations">
					<?php if( have_rows('office_locations_repeater') ): ?>
						<?php while( have_rows('office_locations_repeater') ): the_row(); ?>
						  <div class="profile-container column ">
							  <div class="profile-wrapper">
								  <a href="<?php echo esc_url(get_sub_field('name_and_link')['url']); ?>" class="hover-overlay-orange"><img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" /></a>
								  <div class="content">
									<?php if( get_sub_field('name_and_link') ): ?><a href="<?php echo esc_url(get_sub_field('name_and_link')['url']); ?>" target="<?php echo esc_attr(get_sub_field('name_and_link')['target']); ?>" class="btn btn-arrow"><?php echo esc_html(get_sub_field('name_and_link')['title']); ?></a><?php endif;?>
								  </div>
							  </div>
						  </div>
				  		<?php endwhile; ?>
					<?php endif; ?>

			  </div>
		  </div>
		</section>
	<?php endif; ?>
	<!-- END OFFICE LOCATIONS -->

	<!-- find-job -->
	<?php if (get_row_layout() == 'find_job'): ?>
			<section class="find-job <?php echo (get_sub_field('offset')) ? 'offset' : ''; ?> pt-0">
			<div class="container">
					<div class="box-row">
							<div class="box-columns content-wrapper search-box">
									<h2 class="pb-4 text-center">Find your next job</h2>

									<div class="search-row">
											<div class="find-job-field">
													<input type="text" class="form-control find-job" placeholder="Job Title, skills or keywords">
											</div>

											<div class="find-job-location">
													<select class="form-control find-job-location">
															<option value="" disabled="" selected="" hidden="">Select a location</option>
															<option>Philippines</option>
															<option>Japan</option>
															<option>Iceland</option>
															<option>Antartica</option>
													</select>
											</div>
											<button class="btn btn-search btn-solid"><span class="fa fa-search"></span></button>
									 </div>

							</div>
							<div class="box-columns content-wrapper request-box">
									<div class="column-title text-center pb-3">
											<h2>Hire exceptional talent</h2>
									</div>
									<div class="line-container text-center" >
											<a href="/" class="btn btn-solid">Request Staff</a>
									</div>
							</div>
					</div>
			</div>
		</section>
	<?php endif; ?>
	<!--End find-job -->
	<!-- two_column_round_image -->
	<?php if (get_row_layout() == 'two_column_round_image'): ?>
		<section class="two-column-round-image">
			<div class="column-container container">
					<?php if( get_sub_field('section_title') ): ?>
						<div class="section-title">
								<h2><span><?php the_sub_field('section_title');?></span></h2>
						</div>
					<?php endif;?>
				<div class="column-wrapper row">
						<div class="column-content col-lg-4 col-md-6 col-12">
								<div class="column-image">
									<?php
										$image_left = get_sub_field('image_left');
										$image_url = isset($image_left['url']) ? esc_url($image_left['url']) : '';
										$image_alt = isset($image_left['alt']) ? esc_attr($image_left['alt']) : '';
									?>
									<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
								</div>
								<div class="column-text-wrapper">
										<?php if( get_sub_field('left_column_title') ): ?>
											<div class="column-title">
												<?php the_sub_field('left_column_title'); ?>
											</div>
										<?php endif;?>
										<?php if( get_sub_field('left_column_text') ): ?>
											<div class="column-text">
													<?php the_sub_field('left_column_text'); ?>
											</div>
										<?php endif;?>
								</div>
						</div>
						<div class="column-content col-lg-4 col-md-6 col-12">
									<div class="column-image">
										<?php
											$image_right = get_sub_field('image_right');
											$image_url = isset($image_right['url']) ? esc_url($image_right['url']) : '';
											$image_alt = isset($image_right['alt']) ? esc_attr($image_right['alt']) : '';
										?>
										<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
									</div>
									<div class="column-text-wrapper">
											<?php if( get_sub_field('right_column_title') ): ?>
												<div class="column-title">
													<?php the_sub_field('right_column_title'); ?>
												</div>
											<?php endif;?>
											<?php if( get_sub_field('right_column_text') ): ?>
												<div class="column-text">
														<?php the_sub_field('right_column_text'); ?>
												</div>
											<?php endif;?>
									</div>
						</div>
				</div>
		</div>
		</section>
	<?php endif; ?>
	<!--End two_column_round_image -->
	<!-- START LOGO CAROUSE -->
	<?php if (get_row_layout() == 'logo_carousel'): ?>
		<section class="logo-carousel">
			<div class="carousel-container container">

						<?php if( get_sub_field('section_title') ): ?>
							<div class="section-title">
									<h2><?php the_sub_field('section_title');?></h2>
							</div>
						<?php endif;?>

						<div class="logo-row one-row">
							<?php

							if( have_rows('logos') ):
									// Loop through rows.
									while( have_rows('logos') ) : the_row();
											// Load sub field value.
											?>
												<div class="logo-container">
														<?php echo get_sub_field('logo_link') ? "<a href='". get_sub_field('logo_link')."'>" : ''; ?>
																	<img src="<?php echo get_sub_field('logo')['url']?>" alt="<?php echo get_sub_field('logo')['alt']?>"/>
														<?php echo get_sub_field('logo_link') ? "</a>" : ''; ?>
													</div>
											<?php
									// End loop.
									endwhile;
							endif;?>
						</div>
				</div>
		</section>
	<?php endif; ?>
	<!-- END LOGO CAROUSE -->


	<!-- START TESTIMONIAL SLIDER -->
	<?php if (get_row_layout() == 'testimonial_slider'): ?>

		<section class="testimonial-slider">
        <div class="testimonial-container container">
					<?php if( get_sub_field('section_title') ): ?>
						<div class="section-title">
								<h2><?php the_sub_field('section_title');?></h2>
						</div>
					<?php endif;?>

            <div class="testimonial-row">
							<?php
							if( have_rows('testimonial_cards') ):
									// Loop through rows.
									while( have_rows('testimonial_cards') ) : the_row();
											// Load sub field value.
											?>
											<div class="testimonial-cards">
			                    <div class="testimonial-card-inner">

			                        <div class="testimony-wrapper">
			                            <div class="testimonial-text"><?php echo get_sub_field('testimonial_text') ? get_sub_field('testimonial_text') : ''; ?></div>
			                            <div class="reviewer-details">
			                                <div class="reviewer-name"></div>
			                                <div class="reviewer-position">Senior Recruitment Consultant IT & Digital (VIC)</div>
			                            </div>
			                        </div>
			                    </div>

			                </div>

											<?php
									// End loop.
									endwhile;
							endif;?>

                <div class="testimonial-cards">
                    <div class="testimonial-card-inner">
                        <div class="testimony-wrapper">
                            <div class="testimonial-text">“I have been working in the On Demand team for over a year. On Demand provides us with a conducive and employee-friendly work environment, which enables me to provide high quality service to our candidates and clients. All individuals are well supported and I have a very healthy relationship with my manager. Working with the Resource On Demand team has been a great experience, a complete package within itself!”</div>
                            <div class="reviewer-details">
                                <div class="reviewer-name"></div>
                                <div class="reviewer-position">Resources On Demand Consultant – On Demand (NSW)</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="testimonial-cards">
                    <div class="testimonial-card-inner">

                    <div class="testimony-wrapper">
                        <div class="testimonial-text">“Ignite is a supportive and flexible environment, with a strong collaborative team. We have the opportunity to work with federal government which provides challenging learning opportunities. The People Services team is focused on providing excellent outcomes for clients across varied and interesting projects!”</div>
                        <div class="reviewer-details">
                            <div class="reviewer-name"></div>
                            <div class="reviewer-position">Client Solutions Consultant – Talent Solutions (ACT)</div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

	<?php endif; ?>
	<!-- END TESTIMONIAL SLIDER -->




	<!-- icons_section -->
	<?php if (get_row_layout() == 'icons_section'): ?>
		<section class="icons-section" style=" background-image: url('<?php echo esc_url(get_sub_field('background_image')['url']); ?>');">

			<div class="icons-container container">
					<?php if( get_sub_field('title') ): ?>
						<div class="section-title">
								<div class="section-title">
										<h2><span><?php the_sub_field('title');?></span></h2>
										<!-- <h2><span>Our Specialisation</span></h2> -->
								</div>
						</div>
					<?php endif;?>
					<?php if( get_sub_field('description') ): ?>
						<div class="section-title">
								<div class="section-title">
										<div class="section-description"><?php the_sub_field('description');?></div>
								</div>
						</div>
					<?php endif;?>

					<?php $col_count = get_sub_field('column_count');

					switch ($col_count) {
						case "5":
							$col_val = "column-5";
							break;
						case "4":
							$col_val = "column-4";
							break;
						case "Less than 3":
							$col_val = "threeb";
							break;
					}
					?>
				<div class="icons-row <?php echo $col_val?>"><!--add condition to select howmany columns column-5,column-4,threeb(less than 4) -->
					<?php
						if( have_rows('items') ):
								// Loop through rows.
								while( have_rows('items') ) : the_row();
										?>
											<div class="item">
												<a href="<?php echo get_sub_field('icon-link')?>" class="icon-box-wrapper">
														<img src="<?php echo get_sub_field('icon-image')['url']?>" alt="<?php echo get_sub_field('icon-image')['alt']?>"/>
														<div class="icon-title"><?php echo get_sub_field('icon_title')?></div>
												</a>
											</div>
										<?php
								endwhile;
						endif;
					?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!--End icons_section -->
	<!-- START THREE COLUMN INFO-->
	<?php if (get_row_layout() == 'three_column_info'): ?>
		<section class="three-column-info">
				<div class="three-column-info-container container">
					<?php if( get_sub_field('title') ): ?>
						<div class="section-title">
								<div class="section-title">
										<h2><span><?php the_sub_field('title');?></span></h2>
								</div>
						</div>
					<?php endif;?>
					<?php if( get_sub_field('description') ): ?>
						<div class="section-title">
								<div class="section-description">
										<?php the_sub_field('description');?>
								</div>
						</div>
					<?php endif;?>

						<div class="three-column-info-stats-row">
							<?php
								if( have_rows('column-container') ):
										// Loop through rows.
										while( have_rows('column-container') ) : the_row();
												?>
													<div class="column-container">
															<div class="column-inner-container">
																	<div class="column-top-row">
																		<?php $column_number = get_sub_field('column-number');
																					$column_number_sub = get_sub_field('column-number-sub');
																		?>

																		<?php if ($column_number) {?>
																				<div class="column-number">
																					<?php echo get_sub_field('column-number');?>
																				</div>
																		<?php }?>
																		<?php if ($column_number_sub) {?>
																			<div class="column-sub-title">
																				<?php echo get_sub_field('column-number-sub');?>
																			</div>
																		<?php }?>


																		<?php if ($column_number == '' && $column_number_sub == '') {?>
																						<img src="<?php echo get_sub_field('column-image')['url']?>" alt="<?php echo get_sub_field('column-image')['alt']?>"/>
																		<?php }?>

																	</div>

																	<div class="column-text">
																		<?php echo (get_sub_field('column-text')) ? get_sub_field('column-text') : ''; ?>
																	</div>
															</div>


													</div>
												<?php
										endwhile;
								endif;
							?>
						<?php if( get_sub_field('bottom_text') ): ?>
							<div class="wysiwyg-wrapper">
								<?php echo get_sub_field('bottom_text')?>
							</div>
						<?php endif; ?>
				</div>

		</section>
	<?php endif; ?>
	<!--END THREE COLUMN INFO -->
			
	<!-- START FOUR COLUMN CARD-->
	<?php if (get_row_layout() == 'four_column_card'): ?>
	  <section class="four-column-card title-description-center <?php echo (get_sub_field('section_padding_top') == '0' ? 'pt-0' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '1' ? 'pt-1' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '2' ? 'pt-2' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '3' ? 'pt-3' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '4' ? 'pt-4' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '5' ? 'pt-5' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '0' ? 'pb-0' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '1' ? 'pb-1' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '2' ? 'pb-2' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '3' ? 'pb-3' : ''); ?><?php echo (get_sub_field('section_padding_bottom') == '4' ? 'pb-4' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '5' ? 'pb-5' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
        <div class="container">
            <div class="title-wrapper">
                <h2><span><?php echo get_sub_field('title')?></span></h2>
                <?php echo get_sub_field('description')?>
            </div>
            <div class="flex-box">
				<?php if(have_rows('card_list')):
          		while(have_rows('card_list')): the_row(); ?>
                <div class="column">
                    <h6><?php echo get_sub_field('title')?></h6>
                    <?php echo get_sub_field('content')?>
                </div>
				<?php endwhile; ?>
				<?php endif; ?>
            <div class="content-wrapper">
                <p><?php echo get_sub_field('bottom_description')?></p>
            </div>
		  </div>
        </div>
      </section>
	<?php endif; ?>
	<!-- END FOUR COLUMN CARD-->
			
			
	<!-- START FORM EMBED-->
	<?php if (get_row_layout() == 'form_embed'): ?>
			
			
	<section class="request-staff <?php if(get_sub_field('add_banner')) : ?>pb-0<?php endif; ?> blue-bg" <?php if(!get_sub_field('add_background_image')) : ?>style="background-image: none;"<?php endif; ?>>
      <div class="container">
		  
		<?php if( get_sub_field('title') ) { ?>
 			<div class="title-wrapper pb-4">
			  <h2 class="text-center underline-center"><span><?php echo get_sub_field('title')?></span></h2>
				<?php if(get_sub_field('description')) : ?>
				  <div class="pt-4 pb-2 text-center">
					  <p><?php echo get_sub_field('description')?></p>
				  </div>
				<?php endif; ?>
		    </div>
		<?php } ?>
		 
		<?php echo do_shortcode(get_sub_field('embed_form')); ?>
       
      </div>
	
	<?php if(get_sub_field('add_banner')) : ?>
      <div class="blue-banner"><!-- no-padding class is an option for acf -->
        <div class="content-container container">
            
            <div class="section-title">
                <h2><?php the_sub_field('banner_text');?></h2>
            </div>
            <div class="btn-wrapper">
                <a href="<?php echo esc_url(get_sub_field('banner_button')['url']); ?>" target="<?php echo esc_attr(get_sub_field('banner_button')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('banner_button')['title']); ?></a>
            </div>
            
        </div>
      </div>
	<?php endif;?>
		
    </section>
			
			
			
	<?php endif; ?>
	<!-- END FORM EMBED-->

	<?php endwhile;?>
<?php endif;?>







</main>
<?php get_footer();  ?>
