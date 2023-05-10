AppName.Modules.ThemeModule = (function () {
  //Dependencies
  var core = AppName.Core;

  //////////////////////
  // Private Methods //
  ////////////////////
  const _privateMethod = () => {
    // private stuff

    const swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
      },
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
      appendDots: $('.pagination-container'),
      customPaging: function(slider, i) {
          return '<button class="d-none">' + (i + 1) + '</button>';
      },
      responsive: [
          {
              breakpoint: 990,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
              }
          },
          {
              breakpoint: 650,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
              }
          }
      ]
    });


  var slickDotsCount = $('.slick-dots').children().length;
    var numItemsnumber = parseInt(slickDotsCount);
    var formattednumItemsnumber = (numItemsnumber < 10 ? '0' : '') + numItemsnumber;
    $('#num-items').text(formattednumItemsnumber);
    
  
  
    var activeTabText = $('.slick-active button').text();
    var activeTabTextnumber = parseInt(activeTabText);
    var formattedactiveTabTextnumber = (activeTabTextnumber < 10 ? '0' : '') + activeTabTextnumber;
    $('#index').text(formattedactiveTabTextnumber);

    $('.slick-arrow').click(function() {
        var activeTabText = $('.slick-active button').text();
        var activeTabTextnumber = parseInt(activeTabText);
        var formattedactiveTabTextnumber = (activeTabTextnumber < 10 ? '0' : '') + activeTabTextnumber;
        $('#index').text(formattedactiveTabTextnumber);
    });
  
    
    
    
    
    $('button.slick-custom-prev').on('click', function() {
      $('button.slick-prev.slick-arrow').click();
    });
    $('button.slick-custom-next').on('click', function() {
      $('button.slick-next.slick-arrow').click();
    });
  
  
    $('button.slick-prev.slick-arrow').css('display', 'none');
    $('button.slick-next.slick-arrow').css('display', 'none');
    $('ul.slick-dots').css('display', 'none');
  }
  
  
  const _logocarousel = function(){
    $('.logo-row').slick({
          infinite: true,
          slidesToShow: 6,
          slidesToScroll: 6,
          dots: true,
          arrows: false,
          responsive: [
              {
                  breakpoint: 990,
                  settings: {
                      slidesToShow: 3,
                      slidesToScroll: 3
                  }
              },
              {
                  breakpoint: 768,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                      dots: false
                  }
              },
              {
                  breakpoint: 550,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      dots: false
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

        $('#filter-dropdown-category').on('select2:select', function (e) {
            var selectedCategory  = $('#filter-dropdown-category').val();
            console.log(selectedCategory)
        });
        $('#filter-dropdown-category').on('select2:unselect', function (e) {
            var selectedCategory  = $('#filter-dropdown-category').val();
            console.log(selectedCategory)
        });
  }

  /////////////////////
  // Public Methods //
  ///////////////////
  const init = function () {
    _privateMethod();
    _latestJobs();
    _logocarousel();
    _faq_accordion();
    _tabs();
    _search_filter();
  };

  return {
    init: init,
  };

})();



