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

	<!--[if lt IE 9]>
    <div id="browser-notification" class="alert alert-danger">
      <div class="container">
        We are sorry but it looks like your <a href="http://www.whatbrowser.org/intl/en_us/" target=_blank>browser</a> doesn't support our website features. In order to get the full experience please download a new version of <a title="Download Chrome" href="http://www.google.com/chrome/" target=_blank>Chrome</a>, <a title="Download Safari" href="http://www.apple.com/safari/download/" target=_blank>Safari</a>, <a title="Download Firefox" href="http://www.mozilla.com/firefox/" target=_blank>Firefox</a>, or <a title="Download Internet Explorer" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target=_blank>Internet Explorer</a>.
      </div>
    </div>
  <![endif]-->


<header>
<nav class="navbar navbar-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
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

<!--       <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="https://google.com" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Advise & Insights
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
              <div class="title">Career Advice</div>
              <span class="description">Find a wealth of information and resources to help you navigate your career journey</span>
            </a>
            <a class="dropdown-item" href="#">
              <div class="title">Employer Insights</div>
              <div class="description">Valuable employer insights on how to attract and retain top talent in your industry</div>
            </a>
            <a class="dropdown-item" href="#">
              <div class="title">Blogs</div>
              <div class="description">Looking for resources, info or tips? You can find guidance through our blog.</div>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/investors">Investor Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contractors">Contractors</a>
        </li>
      </ul> -->
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
			<button class="navbar-toggler" aria-label="Toggle navigation menu">

        <span class="navbar-toggler-icon"></span>
      </button>
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
              <!-- <span>Upload your CV or resume here, and we will consider you for any matching job opportunities</span> -->
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

<!--               <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://google.com" id="innerNavbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <div class="title">Services</div>
                    <div class="description">Search by Work Type</div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="innerNavbarDropdown">
                    <a class="dropdown-item" href="/services/contract-temporary-recruitment/">
                      <div class="title">Contract & Temporary Recruitment</div>
                      <span class="description">Contract recruitment services across different sectors and industry specialisations.</span>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Permanent Recruitment</div>
                      <div class="description">Permanent recruitment solutions for your organisation, from engineering to information management.</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Temporary Recruitment</div>
                      <div class="description">Temporary recruitment solutions that are responsive and agile to meet the ever-changing workplace</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Technology Solutions</div>
                      <div class="description">We offer cost-effective technology solutions that streamline business success.</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">On-Demand IT Recruitment</div>
                      <div class="description">On-demand IT services across metro and regional Australia, providing placement of experienced IT professionals</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Government Recruitment</div>
                      <div class="description">A top 10 recruitment supplier to the federal government</div>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://google.com" id="innerNavbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="title">Specialisation/Expertise</div>
                    <div class="description"> Search By Industry</div>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="innerNavbarDropdown">
                    <a class="dropdown-item" href="/specialisations/it-recruitment/">
                      <div class="title">IT & Digital Recruitment</div>
                      <span class="description">A trusted partner to provide you with the best IT professionals for your needs.</span>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Engineering Recruitment</div>
                      <div class="description">Contract, temporary and permanent engineering recruitment solutions at all levels of seniority.</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Construction Recruitment</div>
                      <div class="description">We specialises in construction recruitment, providing contract, temporary and permanent recruitment solutions.</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Cybersecurity Recruitment</div>
                      <div class="description">Providing cyber security recruitment services for private and government environment.</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Business Support Recruitment</div>
                      <div class="description">Business support talent in your organisation at precisely the right time, across Australia.</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Defence Recruitment</div>
                      <div class="description">We confidently recruit for Australian Defence Force to fill a range of critical roles.</div>
                    </a>

                    <a class="dropdown-item" href="#">
                      <div class="title">Project Management Recruitment</div>
                      <div class="description">We have provided leading organisations with expert project management recruitment solutions.</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Professional Service Recruitment</div>
                      <div class="description">Your next reliable partner in professional service recruitment, offering you 40 years of experience.</div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="title">Information Management Recruitment</div>
                      <div class="description">Exceptional contract, temporary and permanent information management recruitment solutions.</div>
                    </a>
                  </div>
                </li>
              </ul> -->



              <!-- <a class="dropdown-item" href="#">
                <div class="title">Services</div>
                <span class="description">Search by Work Type</span>
              </a>
              <a class="dropdown-item" href="#">
                <div class="title">Specialisation/Expertise</div>
                <div class="description">Search By Industry</div>
              </a> -->
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
              <!-- <span>Upload your CV or resume here, and we will consider you for any matching job opportunities</span> -->
            </div>
          </div>
        </div>
      </li>
    </ul>
    <!-- <button class="navbar-toggler">
      <span class="navbar-toggler-icon"></span>
    </button> -->
  </div>
  </div>
</nav>
</header>
