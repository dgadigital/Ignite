<?php
/**
 * 	Template Name: Job Search
*/

include_once 'functions.php';
$data = get_all_jobs();

$totalCount = count($data);

$jobTypes = array();

foreach ($data as $job) {
	$job_type = (string) $job->job_type;

	if (isset($jobTypes[$job_type])) {
		$jobTypes[$job_type]++;
	} else {
		$jobTypes[$job_type] = 1;
	}
}

$jobIndustry = array();

foreach ($data as $job) {
	$job_industry = (string) $job->job_sub_industry;

	if (isset($jobIndustry[$job_industry])) {
		$jobIndustry[$job_industry]++;
	} else {
		$jobIndustry[$job_industry] = 1;
	}
}

$jobSubLocations = array();

foreach ($data as $job) {
	$job_sub_location = (string) $job->job_sub_loaction;

	if (isset($jobSubLocations[$job_sub_location])) {
		$jobSubLocations[$job_sub_location]++;
	} else {
		$jobSubLocations[$job_sub_location] = 1;
	}
}

$jobLocations = array();

foreach ($data as $job) {
	$job_location = (string) $job->job_location;

	if (isset($jobLocations[$job_location])) {
		$jobLocations[$job_location]++;
	} else {
		$jobLocations[$job_location] = 1;
	}
}

get_header(); ?>
	<main>
	 <section class="hero-banner d-flex justify-content-center align-items-center" style=" background-image: url('/wp-content/uploads/2023/06/find-job-banner.png');">
        <div class="container">
            <div class="text-center bottom-padding"><!-- if values for hero-desc and link for the button doesnt have value  add class "bottom-padding"-->
                <div class="hero-sub-title">
                    <h2 class="job-banner-top-title" ><?php echo get_field('initial_sub_title', 'option'); ?></h2>
                </div>
                <div class="hero-title">
                    <h1 class="job-banner-title"><?php echo get_field('initial_title', 'option'); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="search-job">
      <div class="container">
        <div class="search-job-wrapper">
          <div class="search-job-sidebar">
			  <div class="close-filter">
				  <button class="btn btn-solid"> Close Filter</button>
			  </div>
            <div class="side-bar-accordion">
              <div class="tab-content">
                <div id="categories" class="active-tab">
                  <div class="accordion active">
                    <div class="content-wrapper industry">
                      <p class="accordion-title">Job Industry <span><i>filtered</i></span></p>
                      <div class="panel select">
						  <form id="industry-form">
							  <?php foreach ($jobIndustry as $singleJobIndustry => $count) { ?>
								<label>
								  <input type="checkbox" name="industry" value="<?php echo $singleJobIndustry; ?>" >
								  <span class="label"><?php echo $singleJobIndustry; ?></span>
								  <span class="count"><?php echo $count; ?></span>
								</label>
							  <?php } ?>
						  </form>
                      </div>
                    </div>
                  </div>
				  <div class="accordion">
                    <div class="content-wrapper job-type">
                      <p class="accordion-title">Job Type <span><i>filtered</i></span></p>
                      <div class="panel select">
						 <form id="job-type-form">
							 <?php foreach ($jobTypes as $jobType => $count) { ?>
								 <label>
									 <input type="checkbox" name="job_type" value="<?php echo $jobType; ?>">
									 <span class="label"><?php echo $jobType; ?></span>
									 <span class="count"><?php echo $count; ?></span>
								 </label>
							 <?php } ?>
						  </form>
                      </div>
                    </div>
                  </div>
				  <div class="accordion">
                    <div class="content-wrapper sub-location">
                      <p class="accordion-title">Sub Location <span><i>filtered</i></span></p>
						<div class="panel select">
							<form id="sub-location-form">
							  <?php foreach ($jobSubLocations as $jobSubLocation => $count) { ?>
								<label>
								  <input type="checkbox" name="sub_location" value="<?php echo $jobSubLocation; ?>" >
								  <span class="label"><?php echo $jobSubLocation; ?></span>
								  <span class="count"><?php echo $count; ?></span>
								</label>
							  <?php } ?>
						  </form>
						</div>
					</div>
				  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="search-job-content">

			<div class="description">
              <?php echo get_field('initial_description', 'option'); ?>
            </div>

            <div class="search-box">
				<form id="filter-form">
				  <div class="initial-fields">
					  <div class="job">
						 <div class="find-job-field">
							<input type="text" id="keyword-input" name="keyword" class="form-control find-job" placeholder="Job Title, skills or keywords">
						 </div>
					  </div>
					  <div class="location">
						  <div class="find-job-location">
							  <select id="location-input" name="location" class="form-control find-job-location">
								<option value="">Select Location</option>
								  <?php foreach ($jobLocations as $jobLocation => $count) { ?>
									  <option value="<?php echo $jobLocation; ?>"><?php echo $jobLocation; ?></option>
								  <?php } ?>
							  </select>
						  </div>
					  </div>
					  <div class="search-button">
						<button type="submit" class="btn btn-search btn-solid"><span class="fa fa-search"></span></button>
					  </div>
				  </div>
				</form>
				<div class="mobile-filter-triggers">
                  <button class="btn btn-solid industry">Industry</button>
                  <button class="btn btn-solid job-type">Job Type</button>
                  <button class="btn btn-solid sub-location">Sub-location</button>
              	</div>
            </div>

			<div class="result-count">
				<p style="display: none;">Found <span>0</span> Jobs</p>
			</div>

			<div id="jobs-container" class="results-card">
			  <div class="loading">
                <div></div>
                <div></div>
                <div></div>
              </div>
			</div>

			<div id="pagination-container" style="display: none;">
              <span class="page-indicator"><span class="current-page">1</span> | <span class="total-pages">9</span></span>
              <button class="pagination-button prev" disabled></button>
              <button class="pagination-button next" disabled></button>
            </div>



          </div>
        </div>

      </div>
    </div>

 	 <section class="career-move background-blue" style="display: none;">

      <div class="container">
        <div class="content">
          <h2><span>Is your next career move missing from the list above?</span></h2>
          <p>Many sought-after roles are never advertised, but filled by talented  professionals on our database. Register below and you’ll be contacted by a recruitment specialist, unlocking access to career-defining roles across our extensive network.</p>
        </div>
        <div class="multi-level-form box-shadow">

          <?php echo do_shortcode('[contact-form-7 id="8643" title="Submit your CV"]');?>

        </div>

      </div>

    </section>

</main>
<?php get_footer(); ?>
