  <footer>
    <div class="footer-upper">
      <div class="container footer-upper-wrapper">
        <div class="footer-logo">
          <?php 
			$image = get_field('footer_logo', 'option');
			if( !empty( $image ) ): ?>
				<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>
        </div>
        <div class="footer-search">
          <div class="search-job-field">
            <input type="text" class="form-control search-jobs" placeholder="Search Jobs">
          </div>
        </div>
      </div>
    </div>

    <div class="footer-menu">
      <div class="container">
        <div class="menu-row">

          <div class="item row-1">
            <?php wp_nav_menu( array(
					'theme_location'    => 'about'
			)); ?>
          </div>

          <div class="item row-2">
            <?php wp_nav_menu( array(
					'theme_location'    => 'job'
			)); ?>
          </div>
          <div class="item row-3">
            <?php wp_nav_menu( array(
					'theme_location'    => 'employers'
			)); ?>
          </div>
          <div class="item row-4">
			<?php wp_nav_menu( array(
					'theme_location'    => 'specialisations'
			)); ?>
          </div>
          <div class="item row-5">
			<?php wp_nav_menu( array(
					'theme_location'    => 'contractors'
			)); ?>
          </div>

        </div>
      </div>
    </div>
	<?php if( !empty( get_field('ribbon_section', 'option') ) ): ?>
    <div class="footer-misc">
      <div class="container">
        <div class="footer-misc-wrapper">
          <div class="links">
            <div class="item">
              <a href="/search">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/search-icon.png">
                <span>Search</span>
              </a>
            </div>
          </div>
          <div class="buttons">
            <a href="/" class="btn btn-solid btn-linkedin">Follow us on</a>
            <a href="/contact" class="btn btn-solid">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
	<?php endif; ?>
    <div class="footer-copyright">
      <div class="container">
       <?php the_field('copyright', 'option') ?>
      </div>
    </div>
 </footer>

<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/vendors/popper.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/vendors/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/vendors/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/vendors/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/core/base.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/modules/theme-module.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/bootstrapper.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/vendors/select2.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/vendors/xml2json.js"></script>
<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->

<?php wp_footer(); ?>

</body>
</html>