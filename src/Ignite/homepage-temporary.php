<?php 
/**
 * 	Template Name: Homepage
*/
get_header(); ?>

  <main>
    <section class="hero-banner d-flex justify-content-center align-items-center" style=" background-image: url('<?php echo get_template_directory_uri();?>/assets/images/homebanner.png');">  
        <div class="container">
            <div class="text-center pb-5"><!-- if values for hero-desc and link for the button doesnt have value  add class "bottom-padding"-->
                <div class="hero-sub-title">
                    <h2>Australia's preferred recruitment agency <br>across private and public sectors</h2>
                </div>
                <div class="hero-title pb-5">
                    <h1>Ignite your workforce</h1>
                </div>
            </div>           
        </div>
    </section>
    <section class="find-job offset pt-0"> <!-- if on acd if true add class offset -->
            <div class="container">
                <div class="box-row">
                    <div class="box-columns content-wrapper search-box">
                        <h2 class="pb-4 text-center">Find your next job</h2>                            
                        
                        <div class="search-row">
                            <div class="find-job-field">
                                <input type="text" class="form-control find-job" placeholder="Job Title, skills or keywords">
                            </div>
                        
                            <div class="find-job-location">
                                <select class="form-control find-job-location">
                                    <option value="" disabled="" selected="" hidden="">Select a location</option>
                                    <option>Brisbane</option>
                                    <option>Canberra</option>
                                    <option>Darwin</option>
                                    <option>Hobart</option>
									<option>Melbourne</option>
									<option>Perth</option>
									<option>Sydney</option>
                                </select>
                            </div>
                    
                            <button class="btn btn-search btn-solid"><span class="fa fa-search"></span></button>
                         </div>
                        
                    </div>
                    <div class="box-columns content-wrapper request-box">
                        <div class="column-title text-center pb-3">
                            <h2>Hire exceptional talent</h2>
                        </div>
                        <div class="line-container text-center" >
                            <a href="/" class="btn btn-solid">Request Staff</a>
                        </div>
                    </div>
                </div>                
            </div>
    </section>
    <section class="two-column-round-image">
        <div class="column-container container">
            <div class="section-title">
                <h2><span>Key Services</span></h2>
            </div>
            <div class="column-wrapper row">
                <div class="column-content col-lg-4 col-md-6 col-12">
                    <div class="column-image"><img src="<?php echo get_template_directory_uri();?>/assets/images/recruitment_solutions.png"/></div>
                    <div class="column-text-wrapper">
                        <div class="column-title">Recruitment Solutions</div>
                        <div class="column-text">Matching outstanding talent to your needs and culture backed by our 40 years in the industry.</div>
                    </div>
                    

                </div>
                <div class="column-content col-lg-4 col-md-6 col-12">
                    <div class="column-image"><img src="<?php echo get_template_directory_uri();?>/assets/images/on_demand.png"/></div>
                    <div class="column-text-wrapper">
                        <div class="column-title">On-demand IT services</div>
                        <div class="column-text">Ignite proudly offers specialised on-demand IT services across metro, regional and remote Australia.</div>
                    </div>
                    

                </div>
            </div>
        </div>
    </section>
    <section class="logo-carousel">
        <div class="carousel-container container">
            <div class="section-title">
                <h2>Empowering Australia's Leading Organisations</h2>
            </div>

            <div class="logo-row one-row mb-0">
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/afp.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/IBM.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/WESTERNPOWER.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/transport-sydney-trains.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/telstra-whole.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/WESTERNPOWER.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/ANZ.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/afp.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/IBM.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/WESTERNPOWER.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/transport-sydney-trains.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/telstra-whole.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/WESTERNPOWER.png"/></div>
                <div class="logo-container"><img src="<?php echo get_template_directory_uri();?>/assets/images/ANZ.png"/></div>
            </div>
        </div>
    </section>
    <section class="icons-section" style=" background-image: url('<?php echo get_template_directory_uri();?>/assets/images/specialisation-bg.png');">
        <div class="icons-container container">
            <div class="section-title">
                <h2><span>Our specialisation</span></h2>
            </div>
            <div class="section-description">At Ignite, we specialise in providing exceptional recruitment services for a range of areas, ensuring that we find the right candidates to meet your unique needs.</div>
            <div class="icons-row column-5"><!--add condition to select howmany columns column-5,column-4,threeb(less than 4) -->
                <div class="item">
                
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Business Support recruitment.png"/>
                    <div class="icon-title">IT Recruitment</div>
                </a>
                </div>
                <div class="item">
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Cybersecurity_Recruitment.png"/>
                    <div class="icon-title">Cybersecurity Recruitment</div>
                </a>
                </div>
                <div class="item">
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Business Support recruitment.png"/>
                    <div class="icon-title">Business Support recruitment</div>
                </a>
                </div>
                <div class="item">
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Engineering_Recruitment.png"/>
                    <div class="icon-title">Engineering Recruitment</div>
                </a>
                </div>
                <div class="item">
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Construction_Recruitment.png"/>
                    <div class="icon-title">Construction Recruitment</div>
                </a>
                </div>
                <div class="item">
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Information Management Recruitment.png"/>
                    <div class="icon-title">Information Management Recruitment</div>
                </a>
                </div>
                <div class="item">
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Professional Service Recruitment.png"/>
                    <div class="icon-title">Professional Service Recruitment</div>
                </a>
                </div>
                <div class="item">
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Defence_Recruitment.png"/>
                    <div class="icon-title">Defence Recruitment</div>
                </a>
                </div>
                <div class="item">
                <a href="/" class="icon-box-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/pm-rec.png"/>
                    <div class="icon-title">project management recruitment</div>
                </a>
                </div>
            </div>
            
        </div>
        
    </section>
    <section class="lastest-jobs-section" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/BG2.png');">
        <div class="jobs-container container">
            <div class="section-title-container">
                <div class="section-title">
                    <h2 class="underline-left"><span>Latest jobs</span></h2>
                </div>
                <div><a href="/" class="btn btn-solid">View jobs</a></div>
                
            </div>
            
            <div class="jobs-row">
                <div class="">
                    <div class="job-card">
                    <div class="job-category">IT General1</div>
                    <div class="job-title">IT Service Desk Analyst</div>
    
                    <div class="job-details">
                        <div class="d-flex justify-content-between  mb-4">
                            <div class="location">
                                <div class="label">LOCATION</div>
                                <div class="value">Western Australia</div>
                            </div>
                            <div class="jobtype">
                                <div class="label">JOB TYPE</div>
                                <div class="value">Contract</div>
                            </div>
    
                        </div>
    
                        <div class="salary">
                            <div class="label">SALARAY</div>
                            <div class="value">Negotiable</div>
                        </div>
                    </div>
                    
                        <a href="/" class="btn btn-solid">Apply Now</a>
                    
                    </div>
                </div>
                <div class="">
                    <div class="job-card">
                    <div class="job-category">IT General2</div>
                    <div class="job-title">IT Service Desk Analyst</div>
    
                    <div class="job-details">
                        <div class="d-flex justify-content-between  mb-4">
                            <div class="location">
                                <div class="label">LOCATION</div>
                                <div class="value">Western Australia</div>
                            </div>
                            <div class="jobtype">
                                <div class="label">JOB TYPE</div>
                                <div class="value">Contract</div>
                            </div>
    
                        </div>
    
                        <div class="salary">
                            <div class="label">SALARAY</div>
                            <div class="value">Negotiable</div>
                        </div>
                    </div>
                    
                        <a href="/" class="btn btn-solid">Apply Now</a>
                    
                    </div>
                </div>
                <div class="">
                    <div class="job-card">
                    <div class="job-category">IT General3</div>
                    <div class="job-title">IT Service Desk Analyst</div>
    
                    <div class="job-details">
                        <div class="d-flex justify-content-between  mb-4">
                            <div class="location">
                                <div class="label">LOCATION</div>
                                <div class="value">Western Australia</div>
                            </div>
                            <div class="jobtype">
                                <div class="label">JOB TYPE</div>
                                <div class="value">Contract</div>
                            </div>
    
                        </div>
    
                        <div class="salary">
                            <div class="label">SALARAY</div>
                            <div class="value">Negotiable</div>
                        </div>
                    </div>
                    
                        <a href="/" class="btn btn-solid">Apply Now</a>
                    
                    </div>
                </div>
                <div class="">
                    <div class="job-card">
                    <div class="job-category">IT General4</div>
                    <div class="job-title">IT Service Desk Analyst</div>
    
                    <div class="job-details">
                        <div class="d-flex justify-content-between  mb-4">
                            <div class="location">
                                <div class="label">LOCATION</div>
                                <div class="value">Western Australia</div>
                            </div>
                            <div class="jobtype">
                                <div class="label">JOB TYPE</div>
                                <div class="value">Contract</div>
                            </div>
    
                        </div>
    
                        <div class="salary">
                            <div class="label">SALARAY</div>
                            <div class="value">Negotiable</div>
                        </div>
                    </div>
                    
                        <a href="/" class="btn btn-solid">Apply Now</a>
                    
                    </div>
                </div>
                <div class="">
                    <div class="job-card">
                    <div class="job-category">IT General5</div>
                    <div class="job-title">IT Service Desk Analyst</div>
    
                    <div class="job-details">
                        <div class="d-flex justify-content-between  mb-4">
                            <div class="location">
                                <div class="label">LOCATION</div>
                                <div class="value">Western Australia</div>
                            </div>
                            <div class="jobtype">
                                <div class="label">JOB TYPE</div>
                                <div class="value">Contract</div>
                            </div>
    
                        </div>
    
                        <div class="salary">
                            <div class="label">SALARAY</div>
                            <div class="value">Negotiable</div>
                        </div>
                    </div>
                    
                        <a href="/" class="btn btn-solid">Apply Now</a>
                    
                    </div>
                </div>
                <div class="">
                    <div class="job-card">
                    <div class="job-category">IT General6</div>
                    <div class="job-title">IT Service Desk Analyst</div>
    
                    <div class="job-details">
                        <div class="d-flex justify-content-between  mb-4">
                            <div class="location">
                                <div class="label">LOCATION</div>
                                <div class="value">Western Australia</div>
                            </div>
                            <div class="jobtype">
                                <div class="label">JOB TYPE</div>
                                <div class="value">Contract</div>
                            </div>
    
                        </div>
    
                        <div class="salary">
                            <div class="label">SALARAY</div>
                            <div class="value">Negotiable</div>
                        </div>
                    </div>
                    
                        <a href="/" class="btn btn-solid">Apply Now</a>
                    
                    </div>
                </div>
                
            </div>            
            <div class="pagination-wrapper">
                <div class="page-location">
                    <div class="dot-container"></div>
                    <div id="index" class="pagetext"></div>
                    <div class="pagetext"> | </div>
                    <div id="num-items" class="pagetext"></div>
                </div>
                
                <div class="pagination-container"></div>
            </div>
        </div>
    
            
            
            
    
        
        </section>
    <section class="three-column-info blue-bg">
        <div class="three-column-info-container container">
            <div class="section-title mb-2">
                <h2><span>About Us</span></h2>
            </div>
            <div class="section-description mb-3">
                With our advanced methodologies, deep industry knowledge, and strong stakeholder relationships, we have earned a reputation as Australia's trusted talent advisor.
            </div>

            <div class="three-column-info-stats-row">
                <div class="column-container">
                    <div class="column-inner-container">
                        <div class="column-number">24<span>hr</span></div>
                        <div class="column-text">central point of contact via our resource on-demand team</div>
                    </div>
                </div>
                <div class="column-container">
                    <div class="column-inner-container">
                        <div class="column-number">+800<span>k</span></div>                    
                        <div class="column-text">more than 800,000 work-ready candidates</div>
                    </div>                    
                </div>
                <div class="column-container">
                    <div class="column-inner-container">
                        <div class="column-number">+1<span>k</span></div>
                        <div class="column-text">thousands of jobs placed each year</div>
                    </div>
                </div>
                <div class="column-container">
                    <div class="column-inner-container">
                        <div class="column-number">40</div>                    
                        <div class="column-text">years in business</div>
                    </div>
                </div>
                <div class="column-container">
                    <div class="column-inner-container">
                        <div class="column-number">5</div>                    
                        <div class="column-text">offices across Australia</div>
                    </div>
                </div>
                <div class="column-container">
                    <div class="column-inner-container">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/asx-new.png"/>
                        <div class="column-text">ASX-listed company</div>
                    </div>                    
                </div>
            </div>
            <div class="wysiwyg-wrapper"></div>
        </div>

    </section>
    <section class="profile-carousel">
        <div class="profile-container container">
            
            <div class="section-title-container">
                <div class="section-title">
                    <h2 class="underline-left"><span>Ignite Board of Directors</span></h2>
                    <div><a href="/" class="btn btn-solid">Meet</a></div>
                </div>
                <div class="section-description">
                    With over 70 specialists across 5 offices in Australia, we have the expertise and resources to provide unparalleled recruitment solutions, led by an outstanding executive team and board.
                </div>                      

                
            </div>

            <div class="profile-row profile-slider">
                <div class="profile-container column hover-overlay-orange">
                    <div class="profile-wrapper">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/garry.png" alt=""/>
                        <div class="content">
                            <h2>Garry Sladden</h2>
                            <span>Independent Non-Executive Chair</span>
                            <a href="/" class="link-arrow">Read more</a>
                        </div>
                    </div>
                    
                </div>
                <div class="profile-container column hover-overlay-orange">
                    <div class="profile-wrapper">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/jenifer.png" alt=""/>
                        <div class="content">
                            <h2>Jennifer Elliott</h2>
                            <span>Independent Non-Executive Director</span>
                            <a href="/" class="link-arrow">Read more</a>
                        </div>
                    </div>
                    
                </div>
                <div class="profile-container column hover-overlay-orange">
                    <div class="profile-wrapper">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/cameron.png" alt=""/>
                        <div class="content">
                            <h2>Cameron Judson</h2>
                            <span>Executive Director</span>
                            <a href="/" class="link-arrow">Read more</a>
                        </div>
                    </div>
                </div>                           
                <div class="profile-container column hover-overlay-orange">
                    <div class="profile-wrapper">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/garry.png" alt=""/>
                        <div class="content">
                            <h2>Garry Sladden</h2>
                            <span>Independent Non-Executive Chair</span>
                            <a href="/" class="link-arrow">Read more</a>
                        </div>
                    </div>
                    
                </div>
                <div class="profile-container column hover-overlay-orange">
                    <div class="profile-wrapper">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/jenifer.png" alt=""/>
                        <div class="content">
                            <h2>Jennifer Elliott</h2>
                            <span>Independent Non-Executive Director</span>
                            <a href="/" class="link-arrow">Read more</a>
                        </div>
                    </div>
                    
                </div>
                <div class="profile-container column hover-overlay-orange">
                    <div class="profile-wrapper">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/cameron.png" alt=""/>
                        <div class="content">
                            <h2>Cameron Judson</h2>
                            <span>Executive Director</span>
                            <a href="/" class="link-arrow">Read more</a>
                        </div>
                    </div>
                </div>                                  
            </div> 
            </div>
        
    </section>
    <section class="blue-banner pt-0"><!-- no-padding class is an option for acf -->
        <div class="content-container container">
            
            <div class="section-title">
                <h2>Connect with our expert consultants today.</h2>
            </div>
            <div class="btn-wrapper">
                <a href="/" class="btn btn-solid">Contact Us</a>
                <!-- <a href="/" class="btn btn-border">Request Staff</a> --><!-- if blank it will not appear -->
            </div>
            
        </div>
    </section>
  </main>
<?php get_footer(); ?>