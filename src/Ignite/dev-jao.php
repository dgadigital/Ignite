<?php 
/**
 * 	Template Name: Dev Jao
*/
get_header(); ?>

<main>

<?php if( have_rows('flex_content') ):?>
	<?php while (have_rows('flex_content') ): the_row();?>
	
		<!-- START TWO COLUMN TEXT IMAGE -->
		<?php if (get_row_layout() == 'two_column_text_image'): ?>
		<section class="two-column-text-image <?php if( get_sub_field('remove_title') ): ?>without-title<?php endif;?> <?php if( get_sub_field('remove_button') ): ?>without-button<?php endif;?> <?php if( get_sub_field('equal_columns_width') ): ?>equal-width<?php endif;?> <?php if( get_sub_field('reverse') ): ?>reverse<?php endif;?> <?php echo (get_sub_field('section_padding_top') == '0' ? 'pt-0' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '1' ? 'pt-1' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '2' ? 'pt-2' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '3' ? 'pt-3' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '4' ? 'pt-4' : ''); ?> <?php echo (get_sub_field('section_padding_top') == '5' ? 'pt-5' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '0' ? 'pb-0' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '1' ? 'pb-1' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '2' ? 'pb-2' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '3' ? 'pb-3' : ''); ?><?php echo (get_sub_field('section_padding_bottom') == '4' ? 'pb-4' : ''); ?> <?php echo (get_sub_field('section_padding_bottom') == '5' ? 'pb-5' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue' ? 'blue-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Grey' ? 'grey-bg' : ''); ?> <?php echo (get_sub_field('background_color') == 'Blue Vector' ? 'blue-bg-vector' : ''); ?>">
			<div class="container">
				<?php if( get_sub_field('image') ): ?>
				<div class="image-wrapper">
					<img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_url(get_sub_field('image')['alt']); ?>">
				</div>
				<?php endif;?>
				<div class="text-wrapper">
					<h2 class="underline-left"><span><?php the_sub_field('title'); ?></span></h2>
					<?php the_sub_field('content'); ?>
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
			  <div class="title text-center mb-5">
				<?php if( get_sub_field('accordion_title') ): ?><h2><span><?php the_sub_field('accordion_title'); ?></span></h2><?php endif;?>
			  </div>
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
		<?php if (get_row_layout() == 'two-column-side-tabs-accordion'): ?>
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
	
	<?php endwhile;?>
<?php endif;?>
	
</main>


<?php get_footer(); ?>