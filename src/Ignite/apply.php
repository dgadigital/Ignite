<?php
/*
 * Template Name: Apply Page
 */

include_once 'functions.php';
$data = get_all_jobs();


$job_id_param = isset($_GET['id']) ? $_GET['id'] : '';

$hasParam = $job_id_param ? true : false;

foreach ($data as $job) {
	
	if ($job->job_id == $job_id_param) {
		$job_id = (string) $job->job_id;
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
get_header();?>

<main class="page-apply-now">

    <section class="container">

      <div class="back-link">
        <a href="/">Back to Job Details</a>
      </div>
	
	<?php if($hasIdMatch) { ?>
      <h1><?php echo $job_title;?></h1>

      <div class="row">
        <div class="col-lg-5">

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
        <div class="col-lg-7">
			
	<form id="apply-form" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-lg-8">
              <input type="text" class="form-control grey-field no-border" name="firstName" placeholder="Firstname*">
            </div>
            <div class="form-group col-lg-8">
              <input type="text" class="form-control grey-field no-border" name="lastName" placeholder="Lastname*">
            </div>
            <div class="form-group col-lg-8 pb-2">
              <input type="email" class="form-control grey-field no-border" name="email" placeholder="Email*">
            </div>
            <div class="form-group col-lg-8 pb-2">
              <span>Attach CVS*</span>
              <div class="upload-file">
				  
				   <input type="file" name="cv" id="real-file" tabindex="-1" accept=".wps,.odt,.wpc,.doc,.docx,.rtf,.pdf,.zip,.htm,.html,.asc,.csv,.eml,.msg,.ppt,.ps,.wri,.xls,.xml" hidden="hidden"><br>
				  
    <input type="hidden" name="action" value="add_cv">
				  
<!-- 				  <input type="file" id="real-file" hidden="hidden" /> -->
                <button type="button" id="custom-button">Choose File</button>
				  
                <span id="custom-text">No file chosen, yet.</span>
              </div>
            </div>
            <div class="form-group col-lg-8 pb-2">
              <span>By registering you agree to our <a href="/">Privacy Policy</a></span>
            </div>
            <div class="form-group col-lg-8">
				<input type="submit" class="btn btn-solid" value="Register">
            </div>
			<div class="form-group col-lg-8">
				<div class="form-response text-center pt-3"></div>
		    </div>
          </div>
	</form>
        </div>
      </div>
		
		<?php } else { ?>
			
		<p>We couldn't find any matching job, or job may not be available.</p>
		
	  <?php } ?>
    </section>
  </main>

<?php get_footer();
?>
