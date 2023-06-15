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

get_header(); ?>

	

    <div class="search-job">
      <div class="container">
        <div class="search-job-wrapper">
          <div class="search-job-sidebar">
            <div class="side-bar-accordion">
              <div class="tab-content">
                <div id="categories" class="active-tab">
                  <div class="accordion active">
                    <div class="content-wrapper">
                      <p class="accordion-title">Job Industry</p>
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
                    <div class="content-wrapper">
                      <p class="accordion-title">Job Type</p>
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
                    <div class="content-wrapper">
                      <p class="accordion-title">Sub Location</p>
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
								<option value="Sydney">Sydney</option>
								<option value="Canberra">Canberra</option>
								<option value="Melbourne">Melbourne</option>
								<option value="Adelaide">Adelaide</option>
								<option value="Regional NSW">Regional NSW</option>
							  </select>
						  </div>
					  </div>
					  <div class="search-button">
						<button type="submit" class="btn btn-search btn-solid"><span class="fa fa-search"></span></button>
					  </div>
				  </div>
				</form>
            </div>

			<div class="result-count">
				<p>Found <span>0</span> Jobs</p>
			</div>

			<div id="jobs-container"></div>

			<div id="pagination-container">
			  <button class="pagination-button prev" disabled>Previous</button>
			  <span class="page-indicator">Page <span class="current-page">1</span> of <span class="total-pages">1</span></span>
			  <button class="pagination-button next" disabled>Next</button>
			</div>
				
			

          </div>
        </div>

      </div>
    </div>









		
<!-- 		
		<form id="filter-form">
  <label for="keyword-input">Keyword:</label>
  <input type="text" id="keyword-input" name="keyword">
  <label for="location-input">Location:</label>
  <select id="location-input" name="location">
    <option value="">-- Select Location --</option>
    <option value="Sydney">Sydney</option>
    <option value="Canberra">Canberra</option>
    <option value="Melbourne">Melbourne</option>
    <option value="Adelaide">Adelaide</option>
    <option value="Regional NSW">Regional NSW</option>
  </select>
  <button type="submit">Filter</button>
</form>

<form id="industry-form">
  <label>Industry:</label>
  <label for="industry-administration">
    <input type="checkbox" id="industry-administration" name="industry" value="Administration"> Administration
  </label>
  <label for="industry-construction">
    <input type="checkbox" id="industry-construction" name="industry" value="Construction & Architecture"> Construction & Architecture
  </label>
  <label for="industry-engineering">
    <input type="checkbox" id="industry-engineering" name="industry" value="Engineering"> Engineering
  </label>
  <label for="industry-call-center">
    <input type="checkbox" id="industry-call-center" name="industry" value="Call Centre & Customer Service"> Call Centre & Customer Service
  </label>
</form>

<form id="sub-location-form">
  <label>Sub-location:</label>
  <label for="sub-location-blacktown">
    <input type="checkbox" id="sub-location-blacktown" name="sub_location" value="Blacktown"> Blacktown
  </label>
  <label for="sub-location-murray-bridge">
    <input type="checkbox" id="sub-location-murray-bridge" name="sub_location" value="Murray Bridge"> Murray Bridge
  </label>
  <label for="sub-location-south-australia">
    <input type="checkbox" id="sub-location-south-australia" name="sub_location" value="South Australia"> South Australia
  </label>
  <label for="sub-location-sydney">
    <input type="checkbox" id="sub-location-sydney" name="sub_location" value="Sydney"> Sydney
  </label>
</form>

<form id="job-type-form">
  <label for="job-type-contract">
    <input type="checkbox" id="job-type-contract" name="job_type" value="Contract"> Contract
  </label>
  <label for="job-type-permanent">
    <input type="checkbox" id="job-type-permanent" name="job_type" value="Permanent"> Permanent
  </label>
</form>

<div id="jobs-container"></div>

<div id="pagination-container">
  <button class="pagination-button prev" disabled>Previous</button>
  <span class="page-indicator">Page <span class="current-page">1</span> of <span class="total-pages">1</span></span>
  <button class="pagination-button next" disabled>Next</button>
</div>
 -->


				
	
				
				
				
				



<?php get_footer(); ?>