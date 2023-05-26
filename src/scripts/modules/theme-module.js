AppName.Modules.ThemeModule = (function () {
  //Dependencies
  var core = AppName.Core;

  //////////////////////
  // Private Methods //
  ////////////////////
  const _privateMethod = () => {
    // Global here
  };

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
  
  //   $('ul.slick-dots').css('display', 'none');
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
  
  /////////////////////
  // Public Methods //
  ///////////////////
  const init = function () {
    _privateMethod();
    _two_column_side_tabs_accordion();
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
  };

  return {
    init: init,
  };

})();



