<?php 
/**
 * 	Template Name: Dev Arvin
*/
get_header(); ?>

<main class="page-submit-cv">
	
<?php if( have_rows('flex_content') ):?>
	<?php while (have_rows('flex_content') ): the_row();?>
		<!-- Hero Banner -->
		<?php if (get_row_layout() == 'hero_banner'): ?>
			<section class="hero-banner d-flex justify-content-center align-items-center" style=" background-image: url('<?php echo esc_url(get_sub_field('background_image')['url']); ?>');">  
				<div class="container">
					<div class="text-center bottom-padding"><!-- if values for hero-desc and link for the button doesnt have value  add class "bottom-padding"-->
						<div class="hero-sub-title">
							<h2><?php the_sub_field('sub_title'); ?></h2>
						</div>
						<div class="hero-title">
							<h1><?php the_sub_field('title'); ?></h1>
						</div>
					</div>           
				</div>
			</section>
		<?php endif; ?>
		<!-- End of Hero Banner -->
	
		<!-- Board Member -->
		<?php if (get_row_layout() == 'board_members'): ?>
			<section class="board-members">
				<div class="container">
					<h2 class="underline-left center-mobile"><span><?php the_sub_field('title'); ?></span></h2>
					<?php if( have_rows('board_member_repeater') ): ?>
						<?php while( have_rows('board_member_repeater') ): the_row(); ?>
							<div class="content-container <?php echo (get_sub_field('border_bottom') ? 'border-bottom' : ''); ?>">
								<div class="image-container">
									<img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>">
								</div>
								<div class="text-container">
									<h3><?php the_sub_field('name'); ?></h3>
									<h6><?php the_sub_field('position'); ?></h6>
									<div class="button-container">
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
		<!-- End of Board Member -->
		
		<!-- Full Width Text -->
		<?php if (get_row_layout() == 'full_width_text'): ?>
			<section class="full-width-text <?php echo (get_sub_field('blue_background') ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('text_center') ? 'text-center' : 'text-left'); ?> <?php echo (get_sub_field('padding') == 'Default' ? '' : 'py-'); ?><?php echo (get_sub_field('padding') ? ''.get_sub_field('padding') : '0'); ?>">
				<div class="container orange-ul">
					<?php if(get_sub_field("text_center")):?>
					<h2><span><?php the_sub_field('title'); ?></span></h2>
					<?php else: ?>
					<h2 class="underline-left"><span><?php the_sub_field('title'); ?></span></h2>
					<?php endif; ?>
					<p><?php the_sub_field('content'); ?></p>
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
		<!-- End of Full Width Text -->
	
		<!-- Partnerships -->
		<?php if (get_row_layout() == 'partnerships'): ?>
			<section class="partnerships">
				<div class="container">
				  <h2 class="underline-left center-mobile"><span><?php the_sub_field('heading'); ?></span></h2>
				  <?php if( have_rows('partnership_repeater') ): ?>
						<?php while( have_rows('partnership_repeater') ): the_row(); ?>
						  <div class="content-container <?php echo (get_sub_field('border_bottom') ? 'border-bottom' : ''); ?>">
							  <div class="text-container">
								  <h4 class="title"><?php the_sub_field('title'); ?></h4>
								  <?php the_sub_field('description'); ?>               
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
		<!-- End of Partnerships -->
	
		<!-- Collapsing Text -->
		<?php if (get_row_layout() == 'collapsing_text'): ?>
			<section class="collapsing-text <?php echo (get_sub_field('blue_background') ? 'blue-bg' : ''); ?>">
			  <div class="container">
				<h2 class="text-center"><span><?php the_sub_field('heading'); ?></span></h2>
				<img class="tracer" src="<?php echo esc_url(get_sub_field('heading_image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('heading_image')['alt']); ?>" />
				<div class="card-container">
					<?php if( have_rows('collapsing_repeater') ): ?>
				  		<?php while( have_rows('collapsing_repeater') ): the_row(); ?>
						  <div class="box box-shadow">
							<h2><?php the_sub_field('title'); ?></h2>
							<div class="text-wrapper">
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
		<!-- End of Collapsing Text -->
	
		<!-- Stay Connected -->
		<?php if (get_row_layout() == 'stay_connected'): ?>
			<section class="text-and-button">
			  <div class="container">
				  <div class="text-container <?php echo (get_sub_field('short_gap') ? 'short-gap' : ''); ?>">
					  <h2><?php the_sub_field('text'); ?></h2>
				  </div>
				  <div class="button-container">
					<?php if(get_sub_field("add_linkedin_button")):?>
					<a href="<?php echo esc_url(get_sub_field('linkedin_button')['url']); ?>" target="<?php echo esc_attr(get_sub_field('linkedin_button')['target']); ?>"class="btn btn-solid btn-linkedin"><?php echo esc_html(get_sub_field('linkedin_button')['title']); ?></a>
					<?php else: ?>
					<a href="<?php echo esc_url(get_sub_field('button')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button')['target']); ?>"class="btn btn-solid"><?php echo esc_html(get_sub_field('button')['title']); ?></a>
					<?php endif; ?>
				  </div>
			  </div>
			</section>
		<?php endif; ?>
		<!-- End of Stay Connected -->
	
		<!-- Card Carousel -->
		<?php if (get_row_layout() == 'card_carousel'): ?>
			<section class="card-carousel white-top-bg-vector">
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
									<a href="<?php echo esc_url(get_sub_field('card_link')['url']); ?>" class="btn btn-arrow pl-0 py-0"><?php echo esc_html(get_sub_field('card_link')['title']); ?></a>
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
		<!-- End of Card Carousel -->
	
		<!-- Two Column Text and Roles -->
		<?php if (get_row_layout() == 'two_column_text_and_roles'): ?>
			<section class="two-column-text-sidebar grey-bg">
				<div class="container">
					<div class="text-container">
						<?php if( have_rows('content_repeater') ): ?>
				  			<?php while( have_rows('content_repeater') ): the_row(); ?>
								<div class="content">
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
										<p class="desc"><a href="<?php echo esc_url(get_sub_field('role')['url']); ?>" target="<?php echo esc_attr(get_sub_field('role')['target']); ?>" ><?php echo esc_html(get_sub_field('role')['title']); ?></a></p>
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
												  <div class="panel">
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
							<a href="<?php echo esc_url(get_sub_field('button')['url']); ?>" target="<?php echo esc_attr(get_sub_field('button')['target']); ?>" class="btn btn-solid"><?php echo esc_html(get_sub_field('button')['title']); ?></a>
						</div>

					</div>
				</div>
			</section>
		<?php endif; ?>
		<!-- End of Two Column Text and Role -->
	
		<!-- Contact Us -->
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
		<!-- End of Contact Us -->
	
		<!-- Profile Carousel -->
		<?php if (get_row_layout() == 'profile_carousel'): ?>
			<section class="profile-carousel <?php echo (get_sub_field('blue_background') ? 'blue-bg' : ''); ?>">
			  <div class="profile-container container">  
				  <div class="section-title-container">
					  <?php
						$style = get_sub_field('select_style');
						if ($style == 'Office Locations') {
							echo '
							  <div class="section-description text-center">
								<h2 class="px-3"><span>' . get_sub_field('heading') . '</span></h2>
								<p>' . get_sub_field('sub_heading') . '</p>
							  </div>
							';
						} else {
							echo '
								<div class="section-title">
									<h2 class="underline-left"><span>' . get_sub_field('heading') . '</span></h2>
									<div><a href="' . esc_url(get_sub_field('button')['url']) . '" target="' . esc_attr(get_sub_field('button')['target']) . '" class="btn btn-solid">' . esc_html(get_sub_field('button')['title']) . '</a></div>
								</div>
								<div class="section-description px-2">' . get_sub_field('sub_heading') . '</div> 
							';
						}
					  ?>
					  
				  </div>

				  <div class="profile-row <?php echo (get_sub_field('select_style') == 'Profile Slider' ? 'profile-slider' : ''); ?> <?php echo (get_sub_field('select_style') == 'Profile Not Slider' ? '' : ''); ?> <?php echo (get_sub_field('select_style') == 'Office Locations' ? 'office-locations' : ''); ?>">
					  
					  <?php
						$style = get_sub_field('select_style');
						if ($style == 'Office Locations') {
							if (have_rows('office_locations_repeater')) {
								while (have_rows('office_locations_repeater')) {
									the_row();
									echo '
										<div class="profile-container column">
											<div class="profile-wrapper">
												<a href="' . esc_url(get_sub_field('name_and_link')['url']) . '" target="' . esc_attr(get_sub_field('name_and_link')['target']) . '" class="hover-overlay-orange"><img src="' . esc_url(get_sub_field('image')['url']) . '" alt="' . esc_attr(get_sub_field('image')['alt']) . '"/></a>
												<div class="content">
													<a href="' . esc_url(get_sub_field('name_and_link')['url']) . '" target="' . esc_attr(get_sub_field('name_and_link')['target']) . '" class="btn btn-arrow">' . esc_html(get_sub_field('name_and_link')['title']) . '</a>
												</div>
											</div>
										</div>
									';
								}
							}
						} else {
							if (have_rows('profile_repeater')) {
								while (have_rows('profile_repeater')) {
									the_row();
									echo '
										<div class="profile-container column hover-overlay-orange">
											<div class="profile-wrapper">
												<img src="' . esc_url(get_sub_field('profile_image')['url']) . '" alt="' . esc_attr(get_sub_field('profile_image')['alt']) . '"/>
												<div class="content">
													<h2>' . get_sub_field('name') . '</h2>
													<span>' . get_sub_field('position') . '</span>
													<a href="' . esc_url(get_sub_field('link')['url']) . '" target="' . esc_attr(get_sub_field('link')['target']) . '" class="link-arrow">' . esc_html(get_sub_field('link')['title']) . '</a>
												</div>
											</div>
										</div>
									';
								}
							}
						}
					  ?>


				  </div> 
			  </div>
			</section>
		<?php endif; ?>
		<!-- End of Profile Carousel -->
	
	
	<?php endwhile;?>
<?php endif;?>
	
</main>


<?php get_footer(); ?>