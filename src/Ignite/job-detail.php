<?php 
/**
 * 	Template Name: Job Detail
*/

include_once 'functions.php';
$data = get_all_jobs();


$job_id_param = isset($_GET['id']) ? $_GET['id'] : '';

$hasParam = $job_id_param ? true : false;

foreach ($data as $job) {
	$job_id = (string) $job->job_id;
	
	if ($job_id == $job_id_param) {
		$hasIdMatch = true;
		$job_reference = (string) $job->job_reference;
		$job_title = (string) $job->job_title;
		$job_location = (string) $job->job_location;
		$job_type = (string) $job->job_type;
		$job_sub_industry = (string) $job->job_sub_industry;
		$salary_currency = (string) $job->salary_currency;
		$salary_from = (string) $job->salary_from;
		$salary_to = (string) $job->salary_to;
		$salary_per = (string) $job->salary_per;
		$job_description = (string) $job->job_description;
		
		
		$negotiable = ($job->salary_from == 0 && $job->salary_to == 0) ? '<span>Negotiable</span>' : '';
		$salaryHtml = '';

		if ($job->salary_from != 0 && $job->salary_to != 0) {
			$salaryHtml = '<span>'. $job->salary_per .' - Min: '. $job->salary_currency .' ' . $job->salary_from . ' - Max: '. $job->salary_currency .' ' . $job->salary_to . '</span>';
		}

		$detailsHtml = ($negotiable != '') ? $negotiable : $salaryHtml;
	}	
}

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$currentUrl = $protocol . $host . $uri;

$shareButtonUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $currentUrl;

get_header(); ?>

	

  <main class="page-job-details">

    <section class="container">
		
      <div class="back-link">
        <a href="/">Back to Jobs</a>
      </div>
	
	<?php if($hasIdMatch) { ?>
      <h1><?php echo $job_title;?></h1>

      <div class="row">
        <div class="col-lg-7">

          <div class="job-table row">
            <div class="col-4 title">Contract Type</div>
            <div class="col-7 description"><?php echo $job_type;?></div>

            <div class="col-4 title">Reference</div>
            <div class="col-7 description"><?php echo $job_reference;?></div>

            <div class="col-4 title">Industry</div>
            <div class="col-7 description"><?php echo $job_sub_industry;?></div>

            <div class="col-4 title">Salary</div>
            <div class="col-7 description"><?php echo $detailsHtml;?></div>
          </div>

        </div>
        <div class="col-lg-10">

          <div class="job-content">
            <?php echo $job_description;?>
          </div>

          <div class="apply-btn">
            <a href="/apply" class="btn btn-solid">Apply</a>
          </div>

          <div class="share-job">
            <span>Share this Job</span>
            <a href="<?php echo $shareButtonUrl; ?>" class="btn btn-solid btn-linkedin" target="_blank">Share on</a>
          </div>

        </div>

      </div>
	  <?php } else { ?>
			
		<p>We couldn't find any matching job, or job may not be available.</p>
		
	  <?php } ?>

    </section>

  </main>

<?php get_footer(); ?>


