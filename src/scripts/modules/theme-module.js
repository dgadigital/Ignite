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

    $('.navbar-main .nav-link.parent').each(function(){
      $(this).click((e) => {
        if (!$(this).siblings().hasClass('show')){
          $('.dropdown-menu').removeClass('show');
          $(this).siblings().addClass('show');
        } else {
          $('.dropdown-menu').removeClass('show');
        }

        $('.nav-button').removeAttr('style')
        e.preventDefault();
      });
    });

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
///////////////////// wroking 1
	
//     jQuery.ajax({
//         url: ajaxurl,
//         type: 'GET',
//         data: {
//             action: 'job_search',
//             page: page
//         },
//         success: function(response) {
//             // Handle the response
//             if (response.success) {
//                 var html = response.data.html;
//                 var totalPages = response.data.total_pages;
                
//                 // Update the job listings on the page
//                 jQuery('#job-results-container').html(html);
                
//                 // Update the pagination
//                 generatePagination(totalPages);
//             } else {
//                 // Display an error message
//                 console.log('Error:', response.data);
//             }
//         },
//         error: function(xhr, status, error) {
//             // Display an error message
//             console.log('AJAX Error:', error);
//         }
//     });
// }

// function generatePagination(totalPages) {
//     // Generate the pagination links based on the total number of pages
//     var paginationHtml = '';
//     for (var i = 1; i <= totalPages; i++) {
//         paginationHtml += '<a href="#" class="page-link" data-page="' + i + '">' + i + '</a>';
//     }
    
//     // Update the pagination container
//     jQuery('#pagination-container').html(paginationHtml);
// }

// // Handle pagination link click
// jQuery(document).on('click', '.page-link', function(e) {
//     e.preventDefault();
    
//     var page = jQuery(this).data('page');
    
//     // Call the get_jobs_section function with the selected page
//     get_jobs_section(page);
// });

//     // Call the get_jobs_section function with the initial page (default to 1)
//     get_jobs_section(1);

	   
//////////////////////////// working 2

  // Initial variables
  var currentPage = 1;
  var totalPages = 1;

  // Function to update the job results
  function updateJobResults(page) {
    $.ajax({
      url: ajaxurl,
      method: 'GET',
      data: {
        action: 'job_search',
        page: page
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

        // Update the current page variable
        currentPage = response.data.current_page;
        totalPages = response.data.total_pages;
      },
      error: function() {
        // Handle error case if needed
        $('#jobs-container').html('Error loading job results.');
      }
    });
  }

  // Initial job results update
  updateJobResults(currentPage);

  // Pagination button click event handlers
  $('.pagination-button.prev').on('click', function() {
    if (currentPage > 1) {
      updateJobResults(currentPage - 1);
    }
  });

  $('.pagination-button.next').on('click', function() {
    if (currentPage < totalPages) {
      updateJobResults(currentPage + 1);
    }
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



