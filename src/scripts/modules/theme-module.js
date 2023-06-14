AppName.Modules.ThemeModule = (function () {
  //Dependencies
  var core = AppName.Core;

  //////////////////////
  // Private Methods //
  ////////////////////
  const _privateMethod = () => {

  };

  var _stickynav = function () {
    $(window).on("load scroll", function () {
      if ($(this).scrollTop() > 10) {
        $('header').addClass('sticky');
      } else {
        $('header').removeClass('sticky');
      }
    });
  };

  const _topNavToggler = () => {
    $('.navbar-top .navbar-toggler').click(() => {
      $('.navbar-top .navbar-collapse').toggleClass('show');
      $('body').toggleClass('no-scroll');
      // $('.navbar-main .navbar-toggler').delay(1000).toggleClass('hide');
    })

    $('.navbar-top .close-drawer').click(() => {
      $('.navbar-top .navbar-collapse').toggleClass('show');
      $('body').toggleClass('no-scroll');
      // $('.navbar-main .navbar-toggler').delay(1000).toggleClass('hide');
    })

    $('.navbar-top .dropdown-toggle').click( function(){
      if ($(this).next().is(':visible')) {
        location.href = $(this).attr('href');;
      }
    });

    $(window).on('load', 'resize', function(){

      if ($(window).width() > 767) {
        $( ".navbar-top .dropdown" )
        .mouseover(function() {
          $( this ).addClass('show').attr('aria-expanded',"true");
          $( this ).find('.dropdown-menu').addClass('show');
        })
        .mouseout(function() {
          $( this ).removeClass('show').attr('aria-expanded',"false");
          $( this ).find('.dropdown-menu').removeClass('show');
        });
      }

    });

//     $('.navbar-main .nav-link.parent').each(function(){
//       $(this).click((e) => {
//         if (!$(this).siblings().hasClass('show')){
//           $('.dropdown-menu').removeClass('show');
//           $(this).siblings().addClass('show');
//         } else {
//           $('.dropdown-menu').removeClass('show');
//         }

//         $('.nav-button').removeAttr('style')
//         e.preventDefault();
//       });
//     });

    $('.second-level-list .dropdown-toggle').each(function(){
      $(this).click((e) => {
        if ($(this).next().is(':visible')) {
          location.href = $(this).attr('href');
        }
        var dropdownHight = $(this).next().height();
        $(this).parent().parent().parent().next().css({ "height": dropdownHight });
      });
    });
  }

  const _mainNavToggler = () => {
    $('.navbar-main .navbar-toggler').click(() => {
      $('.navbar-main .navbar-collapse').toggleClass('show');
      $('body').toggleClass('no-scroll');
      // $('.navbar-top .navbar-toggler').toggleClass('hide');
    })

    $('.navbar-main .close-drawer').click(() => {
      $('.navbar-main .navbar-collapse').toggleClass('show');
      $('body').toggleClass('no-scroll');
      // $('.navbar-main .navbar-toggler').delay(1000).toggleClass('hide');
    })
  }

  const _fileUploadApplyNow = () => {
    if ($('main').hasClass('page-apply-now')) {
      const realFileBtn = document.getElementById("real-file");
      const customBtn = document.getElementById("custom-button");
      const customTxt = document.getElementById("custom-text");
  
      customBtn.addEventListener("click", function() {
        realFileBtn.click();
      });
  
      realFileBtn.addEventListener("change", function() {
        if (realFileBtn.value) {
          customTxt.innerHTML = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
          )[1];
        } else {
          customTxt.innerHTML = "No file chosen, yet.";
        }
      });
    }
  }

  const _submitCV = () => {
    if ($('div').hasClass('submit-cv-form')) {
      const realFileBtn = document.getElementById('real-file');
      const customBtn = $('#upload-dummy');
      const customTxt = document.getElementById('upload-dummy');

      customBtn.on("click", function() {
        realFileBtn.click();
      });

      realFileBtn.addEventListener("change", function() {
        // console.log(realFileBtn.value)
        if (realFileBtn.value) {
          customTxt.innerHTML = realFileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
          )[1];
        } else {
          customTxt.innerHTML = "No file chosen, yet.";
        }
      });
    }
  }

  const _footerCollapse = () => {
    $('ul.menu > li.menu-item > a').each(function(){
      if ($(this).siblings('.sub-menu').length){
        $(this).after('<span></span>');
      }
    });
    $('li.menu-item span').each(function(){
      $(this).on('click', (e) => {
        $(this).siblings('.sub-menu').toggleClass('active');
      })
    });
  };


  const _latestJobs = function(){
    

  // AJAX JOBS LIST REQUEST
	  $.ajax({
        url: ajaxurl,
        type: 'GET',
        data: {
            'action': 'get_jobs_section'
        },
		complete: function(){
			  $('.ajax-loading').hide();
		},
        success: function(response) {
            $('#latest-jobs-section').html(response);
			
			$('.jobs-row').slick({
			  infinite: true,
			  slidesToShow: 3,
			  slidesToScroll: 3,
			  dots: true,
			  arrows: true,
			  appendArrows: $('.pagination-container'),
			  appendDots: $('.dot-container'),
			  customPaging: function(slider, i) {
				  return '<button class="d-none">' + (i + 1) + '</button>';
			  },
			  responsive: [

				  {
					breakpoint: 991,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				  {
					  breakpoint: 768,
					  settings: {
						  slidesToShow: 1,
						  slidesToScroll: 1
					  }
				  }
			  ]
			});
			
			var slickDotsCount = $('.lastest-jobs-section .slick-dots').children().length;
			var numItemsnumber = parseInt(slickDotsCount);
			var formattednumItemsnumber = (numItemsnumber < 10 ? '0' : '') + numItemsnumber;
			$('#num-items').text(formattednumItemsnumber);

			var activeTabText = $('.lastest-jobs-section .slick-active button').text();
			var activeTabTextnumber = parseInt(activeTabText);
			var formattedactiveTabTextnumber = (activeTabTextnumber < 10 ? '0' : '') + activeTabTextnumber;
			$('#index').text(formattedactiveTabTextnumber);
			
			$('.slick-arrow').click(function() {
			  var activeTabText = $('.lastest-jobs-section .slick-active button').text();
			  var activeTabTextnumber = parseInt(activeTabText);
			  var formattedactiveTabTextnumber = (activeTabTextnumber < 10 ? '0' : '') + activeTabTextnumber;
					$('#index').text(formattedactiveTabTextnumber);
			});
        },
        error: function(xhr, status, error) {
            console.log('Error:', error);
        }
    });
	  
  }
  
  
  const __peoplecarousel = function(){
    $('.profile-row.profile-slider').slick({
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: true,
          arrows: false,
          responsive: [
              {
                  breakpoint: 768,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      // dots: false
                  }
              }
          ]
        });
    }
  const _testimonialslider = function(){
    $('.testimonial-row').slick({
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: true,
          arrows: false,
          responsive: [
              {
                  breakpoint: 991,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2
                  }
              },
              {
                  breakpoint: 769,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                  }
              }
          ]
        });
    }
    
  const _logocarousel = function(){
    $('.logo-row.one-row').slick({
          infinite: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: true,
          dots: true,
          arrows: false,
          responsive: [
              {
                  breakpoint: 991,
                  settings: {
                      slidesToShow: 3
                  }
              },
              {
                  breakpoint: 768,
                  settings: {
                      slidesToShow: 2
                                            
                  }
              }
          ]
        });
    $('.logo-row.two-rows').slick({
          infinite: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: true,
          rows: 2,
          dots: true,
          arrows: false,
          responsive: [
              {
                  breakpoint: 991,
                  settings: {
                      slidesToShow: 3
                  }
              },
              {
                  breakpoint: 768,
                  settings: {
                      slidesToShow: 2
                                            
                  }
              }
          ]
        });
  }

  const _cardcarousel = function(){
    $('.card-carousel-container').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      arrows: true,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1
          }
        }
      ]
      
    });
}


  var _faq_accordion = function(){
    $('.faq-accordion-section .accordion').each(function(e){
      ++e;
      $(this).click(function(){
        if($(this).hasClass('active')){
          $(this).removeClass('active');
        }
        else{
          $(this).addClass('active');
        }
      });
    });
  }

  var _tabs = function () {
    // add click event to tabs
    $('.tab-menu li').on('click', function() {
      if ($(this).data('title')) { // check if the tab is a title
        return; // do nothing if it's a title
      }
      // remove active class from all tabs
      $('.tab-menu li').removeClass('active');
      // add active class to clicked tab
      $(this).addClass('active');
      // hide all tab contents
      $('.tab-content div').removeClass('active-tab');
      // show corresponding tab content
      $($(this).find('a').attr('href')).addClass('active-tab');
      return false; // prevent default link behavior
    });
  };

  var _search_filter = function(){
       
    $("#filter-dropdown-category").select2({
			closeOnSelect : false,
			placeholder : "  Filter By Category",
			allowHtml: true,
			allowClear: true,
			tags: true 
		});

    $("#filter-dropdown-tags").select2({
			closeOnSelect : false,
			placeholder : "  Filter By Tags",
			allowHtml: true,
			allowClear: true,
			tags: true 
		});

	$("#filter-dropdown-category").select2({
			closeOnSelect : false,
			placeholder : "  Filter By Category",
			allowHtml: true,
			allowClear: true,
			tags: true 
		});

    $('#filter-dropdown-category').on('select2:select', function (e) {
            var selectedCategory  = $('#filter-dropdown-category').val();
            console.log(selectedCategory)
        });
    $('#filter-dropdown-category').on('select2:unselect', function (e) {
            var selectedCategory  = $('#filter-dropdown-category').val();
            console.log(selectedCategory)
        }); 
  }

  var _collapsing_text = function(){
        
		$(".readmore-btn").on('click', function(){
      $(this).parent().toggleClass("showContent");
      var replaceText = $(this).parent().hasClass("showContent") ? "Read Less -" : "Read More +";
      $(this).text(replaceText);
    });
  }

  var _side_bar_filter = function(){
    $('.side-bar-accordion .accordion').each(function(e){
      ++e;
      $(this).find('.accordion-title').click(function(){
        if($(this).closest('.accordion').hasClass('active')){
          $(this).closest('.accordion').removeClass('active');
        }
        else{
          $(this).closest('.accordion').addClass('active');
        }
      });
    });
  }

    var _two_column_side_tabs_accordion = function() {
    var $accordionHeaders = $('.accordion-header');
    var $accordionContent = $('.accordion-content');
    var $accordionContainer = $('.accordion-container');
  
    $accordionHeaders.first().addClass('active-header').next('.accordion-content').show();
    $accordionHeaders.on('click', function() {
      var $this = $(this);
      var $content = $this.next('.accordion-content');
      if ($content.is(':visible')) return;
  
      $content.toggle();
      $accordionContent.not($content).hide();
      $this.addClass('active-header');
      $accordionHeaders.not($this).removeClass('active-header');
  
      if ($content.hasClass('active-option-absolute')) {
        $accordionContainer.css('height', $content.outerHeight());
      }
    });
  
    $accordionHeaders.first().click();
  
    $(window).on('resize', function() {
      var windowWidth = Math.max(document.documentElement.clientWidth, window.innerWidth);
  
      if (windowWidth >= 992) {
        $accordionContent.addClass('active-option-absolute');
        $accordionContainer.css('height', $('.active-header').next('.accordion-content').outerHeight());
      } else {
        $accordionContent.removeClass('active-option-absolute');
        $accordionContainer.css('height', 'auto');
      }
    }).resize();
  
    var windowWidth = Math.max(document.documentElement.clientWidth, window.innerWidth);
    if (windowWidth >= 992) {
      $accordionContent.addClass('active-option-absolute');
      $accordionContainer.css('height', $('.active-header').next('.accordion-content').outerHeight());
    } else {
      $accordionContent.removeClass('active-option-absolute');
      $accordionContainer.css('height', 'auto');
    }
  };
	
	var _search_function_all = function() {
    $("#search-all").on("click", function(event) {
		  event.preventDefault();
		  $("#search-all").hide();

		  var searchQuery = $('#search-box-all').val();
		  console.log(searchQuery);
		  
		  $.ajax({
		  url: ajaxurl,
		  type: 'POST',
		  data: {
			action: 'load_more_posts',
			search_query: searchQuery,
		  },
		  success: function(response) {
			// your success code here
			jQuery('.card-container').html(response);
		  },
		  error: function(xhr, status, error) {
			// your error code here
		  }
		});
		  
	  });
	}
	
	
  var _contact_us = function(){
    //Top Content Tabs and Description
    $(".tab-list li").on("click", function() {
      var tabId = ".tab-list li#" + $(this).attr("id");
      var tabDivId = ".tabs-content#content-" + $(this).attr("id");

      if (!$(this).hasClass("active")) {
        $(".tab-list li").removeClass("active");
        $(this).addClass("active");

        $(".tabs-content").removeClass("active");
        $(tabDivId).addClass("active");
      }
    });
  }
  
  var _search_function = function(){
	  $(".post-filter .pagination").hide();
	  $('.post-filter:not(.insights) #search-btn').on('click', function(event) {
		event.preventDefault();

		var searchQuery = $('#search-box').val();
		  
		var val = [];
		$(".post-filter-side-bar #categories input[type=checkbox]:checked").each(function(i){
			val[i] = $(this).val();
		});
		$.ajax({
		  url: ajaxurl,
		  type: 'POST',
		  data: {
			action: 'post_search',
			search_query: searchQuery,
			blogs_category: val
		  },
		  success: function(response) {
			// your success code here
			jQuery('.post-filter .post-list').html(response);
			var total_page = $("#total_pages").attr("data-pages");
			var current_page = $("#current_page").attr("data-pages");
			var found_article = $("#found_article").attr("data-pages");
	  		$(".post-filter .total-page").text(total_page);
			$(".post-filter .current-page").text(current_page);
			$(".post-filter .found-article").text("Found "+found_article+" Articles");
			if(total_page == 0){
				$(".post-filter .pagination").hide();
			}
			else{
				$(".post-filter .pagination").show();
			}
		  },
		  error: function(xhr, status, error) {
			// your error code here
		  }
		});
	  });
	  
	  $('.post-filter-side-bar #categories input[type=checkbox]').click(function(){
		  var val = [];
		  $(".post-filter-side-bar #categories input[type=checkbox]:checked").each(function(i){
			val[i] = $(this).val();
			$.ajax({
			  url: ajaxurl,
			  type: 'POST',
			  data: {
				action: 'post_search',
				blogs_category: val
			  },
			  success: function(response) {
				// your success code here
				jQuery('.post-filter .post-list').html(response);
				var total_page = $("#total_pages").attr("data-pages");
				var current_page = $("#current_page").attr("data-pages");
				var found_article = $("#found_article").attr("data-pages");
				$(".post-filter .total-page").text(total_page);
				$(".post-filter .current-page").text(current_page);
				$(".post-filter .found-article").text("Found "+found_article+" Articles");
				if(total_page == 0){
					$(".post-filter .pagination").hide();
				}
				else{
					$(".post-filter .pagination").show();
				}
			  },
			  error: function(xhr, status, error) {
				// your error code here
			  }
			});
		  });
	  });
	  
	  $('.post-filter .next-page').on('click', function(event) {
		  event.preventDefault();

		  var searchQuery = $('#search-box').val();

		  var val = [];
		  $(".post-filter-side-bar #categories input[type=checkbox]:checked").each(function(i){
			val[i] = $(this).val();
		  });
		  var paged =  parseInt($("#current_page").attr("data-pages")) + 1;
		  var total_page = $("#total_pages").attr("data-pages");
		  if(total_page != 1){
			  $.ajax({
				  url: ajaxurl,
				  type: 'POST',
				  data: {
					action: 'post_search',
					search_query: searchQuery,
					blogs_category: val,
					paged: paged
				  },
				  success: function(response) {
					// your success code here
					jQuery('.post-filter .post-list').html(response);
					var total_page = $("#total_pages").attr("data-pages");
					var current_page = $("#current_page").attr("data-pages");
					$(".post-filter .total-page").text(total_page);
					$(".post-filter .current-page").text(current_page);
					if(total_page == 0){
						$(".post-filter .pagination").hide();
					}
					else{
						$(".post-filter .pagination").show();
					}
				  },
				  error: function(xhr, status, error) {
					// your error code here
				  }
			 });
		 }
	  });
	  
	  $('.post-filter .prev-page').on('click', function(event) {
		  event.preventDefault();

		  var searchQuery = $('#search-box').val();

		  var val = [];
		  $(".post-filter-side-bar #categories input[type=checkbox]:checked").each(function(i){
			val[i] = $(this).val();
		  });
		  var paged =  parseInt($("#current_page").attr("data-pages")) - 1;
		  if(paged != 0){
			  $.ajax({
			  url: ajaxurl,
			  type: 'POST',
			  data: {
				action: 'post_search',
				search_query: searchQuery,
				blogs_category: val,
				paged: paged
			  },
			  success: function(response) {
				// your success code here
				jQuery('.post-filter .post-list').html(response);
				var total_page = $("#total_pages").attr("data-pages");
				var current_page = $("#current_page").attr("data-pages");
				$(".post-filter .total-page").text(total_page);
				$(".post-filter .current-page").text(current_page);
				if(total_page == 0){
					$(".post-filter .pagination").hide();
				}
				else{
					$(".post-filter .pagination").show();
				}
			  },
			  error: function(xhr, status, error) {
				// your error code here
			  }
		 	});
		 }
		 else{
			 event.preventDefault();
		 }
	  });
	  
	  $('.post-filter.insights #search-btn').on('click', function(event) {
		event.preventDefault();
		$(".post-filter.insights .load-more").show();
		var searchQuery = $('#search-box').val();
		var tag = $('.tag_search').val();
		
		$.ajax({
		  url: ajaxurl,
		  type: 'POST',
		  data: {
			action: 'insights_search',
			search_query: searchQuery,
			tag: tag,
		  },
		  success: function(response) {
			// your success code here
			jQuery('.post-filter .card-container').html(response);
		  },
		  error: function(xhr, status, error) {
			// your error code here
		  }
		});
	  });
	  
	  $(".post-filter.insights .load-more").on("click", function(event) {
		  event.preventDefault();
		  $(".post-filter.insights .load-more").hide();

		  var searchQuery = $('#search-box').val();
		  var tag = $('.tag_search').val();
		  console.log(searchQuery+tag);
		  
		  $.ajax({
		  url: ajaxurl,
		  type: 'POST',
		  data: {
			action: 'insights_load_more',
			search_query: searchQuery,
			tag: tag,
		  },
		  success: function(response) {
			// your success code here
			jQuery('.post-filter .card-container').html(response);
		  },
		  error: function(xhr, status, error) {
			// your error code here
		  }
		});
		  
	  });
  }
  
   const _search_job = function(){	   
	   
// WORKING CHECKBOX
// function updateJobResults(page) {
//   // Get the filter values from the main form
//   var keyword = $('#keyword-input').val();
//   var location = $('#location-input').val();
//   var industry = $('#industry-input').val();
//   var sub_location = $('#sub-location-input').val();

//   // Get the selected job types from the job type form
//   var jobTypes = [];
//   $('#job-type-form input[name="job_type"]:checked').each(function() {
//     jobTypes.push($(this).val());
//   });
//   var job_type = jobTypes.join(',');

//   // Update the URL parameters
//   var urlParams = new URLSearchParams();
//   if (keyword.trim() !== '') {
//     urlParams.set('keyword', keyword);
//   }
//   if (location.trim() !== '') {
//     urlParams.set('location', location);
//   }
//   if (industry.trim() !== '') {
//     urlParams.set('industry', industry);
//   }
//   if (job_type.trim() !== '') {
//     urlParams.set('job_type', job_type);
//   }
//   if (sub_location.trim() !== '') {
//     urlParams.set('sub_location', sub_location);
//   }
//   urlParams.set('page', page);

//   // Update the browser URL
//   var newUrl = '?' + urlParams.toString();
//   history.pushState(null, '', newUrl);

//   // Perform the AJAX request
//   $.ajax({
//     url: ajaxurl,
//     method: 'GET',
//     data: {
//       action: 'job_search',
//       page: page,
//       keyword: keyword,
//       location: location,
//       industry: industry,
//       job_type: job_type,
//       sub_location: sub_location
//     },
//     beforeSend: function() {
//       // Show loading spinner or any other visual indication
//       // that the content is being loaded
//       $('#jobs-container').html('Loading...');
//     },
//     success: function(response) {
//       // Update the job results container with the received HTML
//       $('#jobs-container').html(response.data.html);

//       // Update the current page indicator
//       $('.current-page').text(response.data.current_page);
//       $('.total-pages').text(response.data.total_pages);

//       // Enable/disable previous and next buttons based on the current page
//       $('.pagination-button').prop('disabled', false);
//       if (response.data.current_page === 1) {
//         $('.pagination-button.prev').prop('disabled', true);
//       }
//       if (response.data.current_page === response.data.total_pages) {
//         $('.pagination-button.next').prop('disabled', true);
//       }
//     },
//     error: function() {
//       // Handle error case if needed
//       $('#jobs-container').html('Error loading job results.');
//     }
//   });
// }

// // Function to retrieve URL parameter value
// function getURLParameter(name) {
//   var urlParams = new URLSearchParams(window.location.search);
//   return urlParams.get(name);
// }

// // Get the initial page number from the URL parameter
// var initialPage = getURLParameter('page');
// initialPage = initialPage ? parseInt(initialPage) : 1;

// // Get the filter values from URL parameters
// var keyword = getURLParameter('keyword');
// var location = getURLParameter('location');
// var industry = getURLParameter('industry');
// var job_type = getURLParameter('job_type');
// var sub_location = getURLParameter('sub_location');

// // Set the filter values in the input fields
// $('#keyword-input').val(keyword || '');
// $('#location-input').val(location || '');
// $('#industry-input').val(industry || '');
// $('#sub-location-input').val(sub_location || '');

// // Set the job type checkboxes based on the URL parameter
// if (job_type) {
//   var jobTypesArray = job_type.split(',');
//   $.each(jobTypesArray, function(index, value) {
//     $('#job-type-form input[name="job_type"][value="' + value + '"]').prop('checked', true);
//   });
// }

// // Initial job results update
// updateJobResults(initialPage);

// // Pagination button click event handlers
// $('.pagination-button.prev').on('click', function() {
//   var currentPage = parseInt($('.current-page').text());
//   if (currentPage > 1) {
//     updateJobResults(currentPage - 1);
//   }
// });

// $('.pagination-button.next').on('click', function() {
//   var currentPage = parseInt($('.current-page').text());
//   var totalPages = parseInt($('.total-pages').text());
//   if (currentPage < totalPages) {
//     updateJobResults(currentPage + 1);
//   }
// });

// // Job type checkbox change event handler
// $('#job-type-form input[name="job_type"]').on('change', function() {
//   updateJobResults(1);
// });

// // Filter form submit event handler
// $('#filter-form').on('submit', function(e) {
//   e.preventDefault();
//   updateJobResults(1);
// });


	   
	   


function updateJobResults(page) {
  // Get the filter values from the main form
  var keyword = $('#keyword-input').val();
  var location = $('#location-input').val();
  var industry = $('#industry-form input[name="industry"]:checked').map(function() {
    return $(this).val();
  }).get().join(',');
  var sub_location = $('#sub-location-form input[name="sub_location"]:checked').map(function() {
    return $(this).val();
  }).get().join(',');

  // Get the selected job types from the job type form
  var jobTypes = $('#job-type-form input[name="job_type"]:checked').map(function() {
    return $(this).val();
  }).get().join(',');

  // Update the URL parameters
  var urlParams = new URLSearchParams();
  if (keyword.trim() !== '') {
    urlParams.set('keyword', keyword);
  }
  if (location.trim() !== '') {
    urlParams.set('location', location);
  }
  if (industry.trim() !== '') {
    urlParams.set('industry', industry);
  }
  if (jobTypes.trim() !== '') {
    urlParams.set('job_type', jobTypes);
  }
  if (sub_location.trim() !== '') {
    urlParams.set('sub_location', sub_location);
  }
  urlParams.set('page', page);

  // Update the browser URL
  var newUrl = '?' + urlParams.toString();
  history.pushState(null, '', newUrl);

  // Perform the AJAX request
  $.ajax({
    url: ajaxurl,
    method: 'GET',
    data: {
      action: 'job_search',
      page: page,
      keyword: keyword,
      location: location,
      industry: industry,
      job_type: jobTypes,
      sub_location: sub_location
    },
    beforeSend: function() {
      // Show loading spinner or any other visual indication
      // that the content is being loaded
      $('#jobs-container').html('Loading...');
    },
    success: function(response) {
      // Update the job results container with the received HTML
      $('#jobs-container').html(response.data.html);

      // Update the current page indicator
      $('.current-page').text(response.data.current_page);
      $('.total-pages').text(response.data.total_pages);

      // Enable/disable previous and next buttons based on the current page
      $('.pagination-button').prop('disabled', false);
      if (response.data.current_page === 1) {
        $('.pagination-button.prev').prop('disabled', true);
      }
      if (response.data.current_page === response.data.total_pages) {
        $('.pagination-button.next').prop('disabled', true);
      }
    },
    error: function() {
      // Handle error case if needed
      $('#jobs-container').html('Error loading job results.');
    }
  });
}

// ... Rest of the code


// Function to retrieve URL parameter value
function getURLParameter(name) {
  var urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(name);
}

// Get the initial page number from the URL parameter
var initialPage = getURLParameter('page');
initialPage = initialPage ? parseInt(initialPage) : 1;

// Get the filter values from URL parameters
var keyword = getURLParameter('keyword');
var location = getURLParameter('location');
var industry = getURLParameter('industry');
var job_type = getURLParameter('job_type');
var sub_location = getURLParameter('sub_location');

// Set the filter values in the input fields
$('#keyword-input').val(keyword || '');
$('#location-input').val(location || '');

// Set the industry checkboxes based on the URL parameter
if (industry) {
  var industryArray = industry.split(',');
  $.each(industryArray, function(index, value) {
    $('#industry-form input[name="industry"][value="' + value + '"]').prop('checked', true);
  });
}

// Set the sub-location checkboxes based on the URL parameter
if (sub_location) {
  var subLocationArray = sub_location.split(',');
  $.each(subLocationArray, function(index, value) {
    $('#sub-location-form input[name="sub_location"][value="' + value + '"]').prop('checked', true);
  });
}

// Set the job type checkboxes based on the URL parameter
if (job_type) {
  var jobTypesArray = job_type.split(',');
  $.each(jobTypesArray, function(index, value) {
    $('#job-type-form input[name="job_type"][value="' + value + '"]').prop('checked', true);
  });
}

// Initial job results update
updateJobResults(initialPage);

// Pagination button click event handlers
$('.pagination-button.prev').on('click', function() {
  var currentPage = parseInt($('.current-page').text());
  if (currentPage > 1) {
    updateJobResults(currentPage - 1);
  }
});

$('.pagination-button.next').on('click', function() {
  var currentPage = parseInt($('.current-page').text());
  var totalPages = parseInt($('.total-pages').text());
  if (currentPage < totalPages) {
    updateJobResults(currentPage + 1);
  }
});

// Industry and sub-location checkbox change event handlers
$('#industry-form input[name="industry"]').on('change', function() {
  updateJobResults(1);
});

$('#sub-location-form input[name="sub_location"]').on('change', function() {
  updateJobResults(1);
});

// Job type checkbox change event handler
$('#job-type-form input[name="job_type"]').on('change', function() {
  updateJobResults(1);
});

// Filter form submit event handler
$('#filter-form').on('submit', function(e) {
  e.preventDefault();
  updateJobResults(1);
});

	   
	   
	   
	   
	   
	   


	   
   }
  /////////////////////
  // Public Methods //
  ///////////////////
  const init = function () {
    _privateMethod();
    _two_column_side_tabs_accordion();
	_search_function_all();
    _contact_us();
    _collapsing_text();
    _cardcarousel();
    _latestJobs();
    _logocarousel();
    _faq_accordion();
    _footerCollapse();
    _tabs();
    __peoplecarousel();
    _testimonialslider();
    _search_filter();
    _side_bar_filter();
    _fileUploadApplyNow();
    _submitCV();
    _topNavToggler();
    _stickynav();
    _mainNavToggler();
	_search_function();
	_search_job();
  };

  return {
    init: init,
  };

})();



