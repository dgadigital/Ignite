<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="format-detection" content="telephone=no">
<title>
	<?php bloginfo('name'); ?> |
	<?php is_front_page() ? bloginfo('description') : wp_title('');  ?>
</title>

	<link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/images/Ignite-Favicon.ico">
	<!-- <link rel="preload" as="font"> -->
 	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/styles/main.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/styles/slick.css">
	<!--[if lte IE 9]>
	<link href="stylesheets/non-responsive.css" rel="stylesheet" />
	<![endif]-->

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/vendors/jquery.min.js"></script>
	<script type="text/javascript">var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";</script>
	<script type="text/javascript">var $ = jQuery;</script>
	<script>if (window.location.pathname === '/services/' || window.location.pathname === '/specialisations/' || window.location.pathname === '/locations/') {window.location.replace('/');}</script>

</head>

<body <?php body_class(); ?>>

	<div class="sticky-side-widgets">
		<?php if( get_field('show_widget1', 'option') ): ?>
			<?php if( get_field('link1', 'option') ): ?><a href="<?php echo esc_url(get_field('link1', 'option')['url']); ?>" class="widget"><?php the_field('title1', 'option'); ?></a><?php endif;?>
		<?php endif;?>
		<?php if( get_field('show_widget2', 'option') ): ?>
			<?php if( get_field('link2', 'option') ): ?><a href="<?php echo esc_url(get_field('link2', 'option')['url']); ?>" class="widget"><?php the_field('title2', 'option'); ?></a><?php endif;?>
		<?php endif;?>
	</div>


<header>
<nav class="navbar navbar-top navbar-expand-lg navbar-light bg-light d-none d-lg-block">

  <div class="container">
    <div class="collapse navbar-collapse ml-auto">
      <div class="close-drawer">
        <span class="fa fa-arrow-right"></span>
      </div>
      <?php wp_nav_menu( array(
        'theme_location'  => 'header-top-nav',
        'depth'           => 2,
        'container'       => false,
        'menu_class'      => 'navbar-nav ml-auto',
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
      ) ); ?>
    </div>
    <div class="search-wrapper ml-auto">
      <div class="nav-item nav-search">
        <a class="nav-link" href="/search">
          <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0292 12.8286L13.709 12.5199C14.8296 11.2163 15.5043 9.52387 15.5043 7.68282C15.5043 3.57762 12.1767 0.25 8.07149 0.25C3.96629 0.25 0.638672 3.57762 0.638672 7.68282C0.638672 11.788 3.96629 15.1156 8.07149 15.1156C9.91254 15.1156 11.6049 14.441 12.9085 13.3203L13.2173 13.6405V14.5439L18.9348 20.25L20.6387 18.5462L14.9326 12.8286H14.0292ZM2.92713 7.68269C2.92713 4.83535 5.22559 2.5369 8.07293 2.5369C10.9203 2.5369 13.2187 4.83535 13.2187 7.68269C13.2187 10.53 10.9203 12.8285 8.07293 12.8285C5.22559 12.8285 2.92713 10.53 2.92713 7.68269Z"/>
          </svg>
          Search
        </a>
      </div>
      <button class="navbar-toggler" aria-label="Toggle navigation menu"><span class="navbar-toggler-icon"></span></button>
    </div>
  </div>
</nav>

<nav class="navbar navbar-main navbar-expand-lg">
  <div class="container">
  <a class="navbar-brand" href="/">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nav-logo.png" alt="ignite logo">
  </a>
	<button class="navbar-toggler" type="button" aria-label="Toggle navigation">
	    <span class="top-icon"></span>
	    <span class="mid-icon"></span>
	    <span class="bottom-icon"></span>
  </button>

  <div class="collapse navbar-collapse ml-auto">
    <div class="close-drawer">
      <span class="fa fa-arrow-right"></span>
    </div>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle parent" href="#">
          About Us
        </a>
        <div class="dropdown-menu">
          <div class="dropdown-menu-wrapper">

            <a class="dropdown-item dropdown-item-head" href="/about-us">
              <div class="title">About Us</div>
              <span class="description">Publicly listed recruitment agency with four decades of experience providing recruitment solutions</span>
            </a>

            <div class="second-level-list split">

			  	<?php wp_nav_menu( array(
					'theme_location'  => 'header-about',
					'depth'           => 2,
					'container'       => false,
					'menu_class'      => 'navbar-nav split',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) ); ?>


            </div>

            <div class="nav-button">
              <a href="/recruitment-agencies-contact" class="btn btn-solid">Contact Us</a>

            </div>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle parent" href="#">
          Job Seekers
        </a>
        <div class="dropdown-menu">
          <div class="dropdown-menu-wrapper">

            <a class="dropdown-item dropdown-item-head" href="/find-a-job">
              <div class="title">Job Seekers</div>
              <span class="description">Find a job that's perfect for you</span>
            </a>

            <div class="second-level-list split">
				<?php wp_nav_menu( array(
					'theme_location'  => 'header-job',
					'depth'           => 2,
					'container'       => false,
					'menu_class'      => 'navbar-nav split',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) ); ?>

            </div>

            <div class="nav-button">
              <a href="/australia-jobs-submit-cv" class="btn btn-solid">Submit your CV</a>
              <span>Upload your CV or resume here, and we will consider you for any matching job opportunities</span>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle parent" href="#">
         Employers
        </a>
        <div class="dropdown-menu">
          <div class="dropdown-menu-wrapper">

            <a class="dropdown-item dropdown-item-head" href="#">
              <div class="title">Employers</div>
              <span class="description">Ignite can help you look for top talent on a permanent, contract, or contingent basis, or on a project basis.</span>
            </a>

            <div class="second-level-list">

              <?php wp_nav_menu( array(
                'theme_location'  => 'header-employer',
                'depth'           => 2,
                'container'       => false,
                'menu_class'      => 'navbar-nav',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
              ) ); ?>

            </div>

            <div class="nav-button">
              <a href="/find-staff" class="btn btn-solid">Request Staff</a>
              <span>Find staff quickly across Australia in all Metro, Non - metro, and remote areas.</span>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle parent" href="#">
          Contact
        </a>
        <div class="dropdown-menu">
          <div class="dropdown-menu-wrapper">

            <a class="dropdown-item dropdown-item-head" href="/recruitment-agencies-contact">
              <div class="title">Contact Us</div>
              <span class="description">Ignite specialists are ready to support you with all your  needs.</span>
            </a>

            <div class="second-level-list">

              <?php wp_nav_menu( array(
								'theme_location'  => 'header-contact',
								'depth'           => 2,
								'container'       => false,
								'menu_class'      => 'navbar-nav split',
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
							) ); ?>

            </div>

            <div class="nav-button">
              <a href="/recruitment-agencies-contact" class="btn btn-solid">Contact Us</a>
            </div>
          </div>
        </div>
      </li>
    </ul>
		<?php wp_nav_menu( array(
			'theme_location'  => 'header-top-nav',
			'depth'           => 2,
			'container'       => false,
			'menu_class'      => 'navbar-nav ml-auto d-lg-none',
			'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
			'walker'          => new WP_Bootstrap_Navwalker(),
		) ); ?>
  </div>







  </div>

</nav>
</header>
