<?php 
/**
 * 	Template Name: Dev Leo
*/
get_header(); ?>

<main>
	<div class="search-job">
      <div class="container">

        <div class="search-job-wrapper">

          <div class="search-job-sidebar">
            <div class="side-bar-accordion">
              <div class="tab-content">
                <div id="categories" class="active-tab">
                  <div class="accordion active">
                    <div class="content-wrapper">
                      <p class="accordion-title">Categories</p>
                      <div class="panel select">
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">attracting and recruiting talent</span>
                          <span class="count">17</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">diversity and inclusion</span>
                          <span class="count">17</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">emerging workforce trends</span>
                          <span class="count">17</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">employee engagement</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">employee retention</span>
                          <span class="count">17</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">employee value proposition</span>
                          <span class="count">17</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="accordion">
                    <div class="content-wrapper">
                      <p class="accordion-title">Tags</p>
                      <div class="panel select">
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">attracting and recruiting talent</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">diversity and inclusion</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">emerging workforce trends</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">employee engagement</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">employee retention</span>
                        </label>
                        <label>
                          <input type="checkbox" name="position_of_interest">
                          <span class="label">employee value proposition</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            
            <!-- <div class="side-card">
              <h3>Find a job in your industry</h3>
              <p>Find a job by industry or search for jobs that match your skills and experience.</p>
              <a href="/" class="btn btn-solid">Find a Job</a>
            </div>

            <div class="side-card">
              <p>Want to discover helpful resources and insights? Read our knowledge-filled blog to help you navigate and stay informed in your career journey.
                Didn't see the perfect job for you? We share new jobs all the time. Why not submit your CV?</p>
              <a href="/" class="btn btn-solid">Submit CV</a>
            </div> -->

          </div>
          <div class="search-job-content">

            <div class="search-box">

              <div class="post-filter">
               
                  <div class="filter-container">
                    <div class="dropdown">
                      <select class="js-select2" id="filter-dropdown-category" multiple="multiple">
                        <option value="O1" data-badge="">attracting and recruiting talent</option>
                        <option value="O2" data-badge="">diversity and inclusion</option>
                        <option value="O3" data-badge="">emerging workforce trends</option>
                        <option value="O4" data-badge="">employee engagement</option>
                        <option value="O5" data-badge="">employee retention</option>
                        <option value="O6" data-badge="">employee value proposition</option>
                      </select>
                    </div>
                    <div class="dropdown">
                      <select class="js-select2" id="filter-dropdown-tags" multiple="multiple">
                        <option value="O1" data-badge="">attracting and recruiting talent</option>
                        <option value="O2" data-badge="">diversity and inclusion</option>
                        <option value="O3" data-badge="">emerging workforce trends</option>
                        <option value="O4" data-badge="">employee engagement</option>
                        <option value="O5" data-badge="">employee retention</option>
                        <option value="O6" data-badge="">employee value proposition</option>
                      </select>
                    </div>
                  </div>
                
              </div>
              
              <div class="initial-fields">
                <div class="job">
                  <div class="find-job-field">
                      <input type="text" class="form-control find-job" placeholder="Job Title, skills or keywords">
                    </div>
                </div>
                <div class="location">
                  <div class="find-job-location">
                    <select class="form-control find-job-location">
                      <option value="" disabled selected hidden>Select a location</option>
                      <option>Philippines</option>
                      <option>Japan</option>
                      <option>Iceland</option>
                      <option>Antartica</option>
                    </select>
                  </div>
                </div>
                <div class="search-button">
					<button class="btn btn-search btn-solid"><span class="fa fa-search"></span></button>
                </div>
              </div>

            </div>

            <div class="description">
              <h2>Find a job that is perfect for you</h2>
              <!-- <p><strong>Don't wait! Search for your next IT job</strong></p> -->
              <p>You promised yourself a new career. Well, now you can head in the direction you've always dreamed of and find a job to set you up for success.</p>

              <p>As your trusted recruiters, Ignite is here to guide you every step of the way. Whether you're looking to make a fresh start in the new year or just browsing for job opportunities, our team of experts can provide you with the resources, connections and market-leading employer relationships to help you achieve your career goals.</p>
              
              <p>With new jobs uploaded frequently, you can explore a wide range of temporary, contract or permanent positions across various industries and professions. We understand that flexibility and freedom are essential in today's job market, which is why we showcase the best opportunities that cater to your unique work-life situation.</p>
              
              <h2>Find a job in your industry</h2>

              <p>Find a job by industry or search for jobs that match your skills and experience.</p>
              <a href="/" class="btn btn-solid">Find a Job</a>

              <p>Want to discover helpful resources and insights? <strong><a href="/">Read our knowledge-filled blog</a></strong> to help you navigate and stay informed in your career journey.</p>
              <p>Didn't see the perfect job for you? We share new jobs all the time.<strong><a href="/"> Why not submit your CV?</a></strong></p>
            
            </div>

            <div class="result-count">
              <p>Found 45 Jobs</p>
            </div>

            <div class="results-card">
				
            </div>

          </div>
        </div>

      </div>
    </div>
</main>


<script>
	$( document ).ready(function() {
		
	 var jobs = {};
		
     $.ajax({
        type: "GET",
        url: "https://cors-anywhere.herokuapp.com/https://ws.idibu.com/ws/rest/v1/jobs",
        dataType: "xml",
		data: {
			hash: 'b94253bec084d37217eab789d5b79fc4',
			count: 10
		},
        success: function(xmlDoc) {
            var x2js = new X2JS();
            var jsonObj = x2js.xml2json(xmlDoc);
      		jobs['data'] = jsonObj;
			console.log(jobs)
			
			
			let mapped = jobs.data.idibu.response.jobs.job.map((data) => {
				return `
				  <div class="job-card">
					<div class="upper">
					  <div class="status">new</div>
					  <p>${data.creation_date}</p>
					</div>
					<div class="content">
					  <h3><a href="/">${data.title}</a></h3>
					  <div class="details">
						<span>${data.sub_location}</span>
						<span>${data.working_hours}</span>
					  </div>
					  <div class="body">
						<p>No Job Description From API</p>
					  </div>
					</div>
					<div class="actions">
					  <div class="action-cta">
						<a href="/" class="btn btn-border">Apply Now</a>
						<a href="/" class="btn btn-solid">Read More</a>
					  </div>
					  <div class="save-job">
						<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
						  <path d="M1.08008 5.76299C1.08008 3.73245 1.08008 2.71718 1.71089 2.08637C2.34169 1.45557 3.35696 1.45557 5.3875 1.45557H8.25911C10.2897 1.45557 11.3049 1.45557 11.9357 2.08637C12.5665 2.71718 12.5665 3.73245 12.5665 5.76299V10.6646C12.5665 12.5909 12.5665 13.5541 11.9604 13.8487C11.3543 14.1433 10.5969 13.5482 9.08221 12.3581L8.59745 11.9772C7.74575 11.308 7.3199 10.9734 6.82331 10.9734C6.32671 10.9734 5.90086 11.308 5.04916 11.9772L4.5644 12.3581C3.04968 13.5482 2.29232 14.1433 1.6862 13.8487C1.08008 13.5541 1.08008 12.5909 1.08008 10.6646V5.76299Z"/>
						</svg>                      
						<span>Save Job</span>
					  </div>
					</div>
				  </div>
				`
			});

			$('.results-card').html(mapped.join('')); 
	
        }
    });
		
		
  });
	
	
</script>
<?php get_footer(); ?>