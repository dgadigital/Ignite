<?php
/**
 * 	Template Name: Dev Arlon
*/
get_header(); ?>

<main>

<?php if( have_rows('flex_content') ):?>
	<?php while (have_rows('flex_content') ): the_row();?>
		<!-- Hero Banner -->
		<?php if (get_row_layout() == 'hero_banner'): ?>
			<section class="hero-banner d-flex justify-content-center align-items-center" style=" background-image: url('<?php echo esc_url(get_sub_field('image')['url']); ?>');">
				<div class="container">
					<div class="text-center "><!-- if values for hero-desc and link for the button doesnt have value  add class "bottom-padding"-->
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
		<!-- logo_carousel -->
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
													<div class="logo-container"><img src="<?php echo get_sub_field('logo')['url']?>" alt="<?php echo get_sub_field('logo')['alt']?>"/></div>
												<?php
								    // End loop.
								    endwhile;
								endif;?>
							</div>
					</div>
			</section>
		<?php endif; ?>
		<!--End logo_carousel -->
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
		<!-- three_column_info -->
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
									<div class="section-title">
											<div class="section-description"><?php the_sub_field('description');?></div>
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
		<!--End three_column_info -->



		<!-- lastest_jobs_section -->
		<?php if (get_row_layout() == 'lastest_jobs_section'): ?>
			<section class="lastest-jobs-section" style="background-image: url('./assets/images/bg.png');">
	        <div class="jobs-container container">
	            <div class="section-title-container">
	                <div class="section-title">
	                    <h2 class="underline-left"><span>Latest Jobs</span></h2>
	                </div>
	                <div><a href="/" class="btn btn-solid">Book a Call</a></div>

	            </div>

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
		<!--End lastest_jobs_section -->
		<!-- blue_banner -->
		<?php if (get_row_layout() == 'blue_banner'): ?>
			<section class="blue-banner pt-0"><!-- no-padding class is an option for acf -->
	        <div class="content-container container">

	            <div class="section-title">
	                <h2>Connect with our expert consultants today.</h2>
	            </div>
	            <div class="btn-wrapper">
	                <a href="/" class="btn btn-solid">Contact Us</a>
	                <!-- <a href="/" class="btn btn-border">Request Staff</a> --><!-- if blank it will not appear -->
	            </div>

	        </div>
	    </section>
		<?php endif; ?>
		<!--End blue_banner -->




	<?php endwhile;?>
<?php endif;?>

</main>


<?php get_footer(); ?>
