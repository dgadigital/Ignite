<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php $flexible_content = get_field('flex_content_consultants', 'option', 'consultants-post-type-options');
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

	<!-- START FULL WIDTH TEXT -->
	<?php if ($field['acf_fc_layout'] == 'full_width_text') : ?>
		<section class="full-width-text blue-bg pb-5 pt-5">
		  <div class="container">
			  <h2><span><?php echo $field['title']; ?></span></h2>
			  <div class="text-content">
				  <?php echo $field['content']; ?>
			  </div>
			  <?php if( $field['button'] ): ?>
				  <div class="button-wrapper">
					<a href="<?php echo esc_url($field['button']['url']); ?>" target="<?php echo esc_attr($field['button']['target']); ?>" class="btn btn-solid"><?php echo esc_html($field['button']['title']); ?></a>
				  </div>
			  <?php endif;?>
		  </div>
		</section>
	<?php endif;?>
	<!-- END FULL WIDTH TEXT -->

	
	<!-- START ARCHIVE CONTENT -->
	<?php if ($field['acf_fc_layout'] == 'archive_content') : ?>
	<section class="consultants">
        <div class="container">

          <h2 class="underline-left center-mobile"><span><?php echo $field['title']; ?></span></h2>
	
			<?php 
			$modalLoop = 0;							   
			while ( have_posts() ) : the_post(); ?>

			<div class="consultants-row border-bottom">
            <div class="image-container">
              <div class="image-wrapper">
                  <?php $image = get_field('image');
					if( !empty( $image ) ): 
				  	$url = esc_url($image['url']);
				    $alt = esc_attr($image['alt']);
				  ?>
						<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
					<?php endif; ?>
              </div>
            </div>
            <div class="text-container">
                <h3><?php the_field('name'); ?></h3>
                <h6><?php the_field('position'); ?></h6>
				
				<?php $linkedin = get_field('linked_in');
					if( !empty( $linkedin ) ): ?>
                <div class="button-container">
                    <!-- <a href="#"><img src=".\assets\images\buttons\message-button.png" alt="message"></a> -->
                    <a href="<?php the_field('linked_in'); ?>" target="_blank">
                      <svg width="35" height="35" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6454 34.4554C8.2107 34.4554 0.561523 26.8071 0.561523 17.3724V17.3715C0.561523 7.93686 8.2107 0.288574 17.6454 0.288574C27.0801 0.288574 34.7283 7.93686 34.7283 17.3715V17.3724C34.7283 26.8071 27.0801 34.4554 17.6454 34.4554Z"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.89941 24.9857H13.4354V13.5635H9.89941V24.9857Z" fill="white"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6493 12.0682C12.8046 12.0682 13.74 11.1238 13.74 9.96043C13.74 8.79613 12.8046 7.85266 11.6493 7.85266C10.494 7.85266 9.55859 8.79613 9.55859 9.96043C9.55859 11.1238 10.494 12.0682 11.6493 12.0682Z" fill="white"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0868 18.9901C19.0868 17.3842 19.8256 16.4281 21.2412 16.4281C22.5411 16.4281 23.1659 17.3465 23.1659 18.9901V24.9858H26.6848V17.754C26.6848 14.6947 24.9504 13.2153 22.5294 13.2153C20.1065 13.2153 19.0868 15.1023 19.0868 15.1023V13.5636H15.6953V24.9858H19.0868V18.9901Z" fill="white"/>
                      </svg>
                    </a>
                    <!-- <a href="#" class="btn btn-solid orange">+61 2 1234 5678</a> -->
                </div>
				<?php endif; ?>	
					
                <div class="text-content" style="font-family: Raleway Semi-Bold;">
					<?php the_field('excerpt'); ?>
                </div>
                <a href="#" class="btn btn-arrow" data-toggle="modal" data-target="#consultant<?php echo $modalLoop;?>">Read More</a>

                <!-- Modal -->
              <div class="modal fade" id="consultant<?php echo $modalLoop;?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                      <div class="inner-row">
                        <div class="inner-image">
                          <div class="image-wrapper">
							<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                          </div>
                        </div>
                        <div class="inner-text">
                          <div class="inner-text-container">
                            <h3><?php the_field('name'); ?></h3>
                            <h6><?php the_field('position'); ?></h6>
							  <?php if( !empty( $linkedin ) ): ?>
                            <div class="button-container">
                                <!-- <a href="#"><img src=".\assets\images\buttons\message-button.png" alt="message"></a> -->
                                <a href="<?php the_field('linked_in'); ?>" target="_blank">
                                  <svg width="35" height="35" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6454 34.4554C8.2107 34.4554 0.561523 26.8071 0.561523 17.3724V17.3715C0.561523 7.93686 8.2107 0.288574 17.6454 0.288574C27.0801 0.288574 34.7283 7.93686 34.7283 17.3715V17.3724C34.7283 26.8071 27.0801 34.4554 17.6454 34.4554Z"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M9.89941 24.9857H13.4354V13.5635H9.89941V24.9857Z" fill="white"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6493 12.0682C12.8046 12.0682 13.74 11.1238 13.74 9.96043C13.74 8.79613 12.8046 7.85266 11.6493 7.85266C10.494 7.85266 9.55859 8.79613 9.55859 9.96043C9.55859 11.1238 10.494 12.0682 11.6493 12.0682Z" fill="white"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0868 18.9901C19.0868 17.3842 19.8256 16.4281 21.2412 16.4281C22.5411 16.4281 23.1659 17.3465 23.1659 18.9901V24.9858H26.6848V17.754C26.6848 14.6947 24.9504 13.2153 22.5294 13.2153C20.1065 13.2153 19.0868 15.1023 19.0868 15.1023V13.5636H15.6953V24.9858H19.0868V18.9901Z" fill="white"/>
                                  </svg>
                                </a>
                                <!-- <a href="#" class="btn btn-solid orange">+61 2 1234 5678</a> -->
                            </div>
							<?php endif; ?>	
                            <div class="text-content">
                              <strong><?php the_field('content'); ?></strong>
                            </div>
                            <div class="specialisation-container">
                              <h3>Specialisation</h3>
								
								<?php if( have_rows('specialisation') ): ?>
								
									<?php while( have_rows('specialisation') ): the_row(); ?>
										<a href="<?php the_sub_field('link'); ?>" class="btn btn-solid orange"><?php the_sub_field('specialty'); ?></a>
									<?php endwhile; ?>
								
								<?php endif; ?>
								
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="specialisation-container">
                <h3>Specialisation</h3>
                <?php if( have_rows('specialisation') ): ?>
					<?php while( have_rows('specialisation') ): the_row(); ?>
						<a href="<?php the_sub_field('link'); ?>" class="btn btn-solid orange"><?php the_sub_field('specialty'); ?></a>
					<?php endwhile; ?>
				<?php endif; ?>
            </div>
          </div>
			<?php 
			$modalLoop++;						   
			endwhile; ?>
		</div>
    </section>
<?php endif;?>
<!-- END ARCHIVE CONTENT -->

<!-- START BLUE BANNER -->
<?php if ($field['acf_fc_layout'] == 'blue_banner') : ?>
	<?php 
		$pt = $field['top_padding']; 
		$pb = $field['bottom_padding'];
	?>
	 <section class="blue-banner <?php if($pt !== 'default'):?>pt-<?php echo $pt;?><?php endif;?> <?php if($pb !== 'default'):?>pb-<?php echo $pb;?><?php endif;?>">
      <div class="content-container container">
          <div class="section-title">
              <h2><?php echo $field['title']; ?></h2>
          </div>
          <div class="btn-wrapper">
			  <?php if( $field['button'] ): ?>
              	<a href="<?php echo esc_url($field['button']['url']); ?>" class="btn btn-solid"><?php echo esc_html($field['button']['title']); ?></a>
			  <?php endif;?>
          </div>
      </div>
    </section>
<?php endif;?>
<!-- END BLUE BANNER -->
	


 
<?php }
}
?>

<?php endif; ?>
<?php get_footer(); ?>
