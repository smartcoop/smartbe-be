/* Load our javascripts for some minification using CodeKit */
// @codekit-prepend "libs/jquery.fitvids.js";


/**
 *  General interaction
 */

$(document).ready(function() {

  // Script to ajaxify the Newsletter form
  // -------------------------------------
  $('#newsletter').submit(function(e) {
    e.preventDefault();
    
    var $form = $(this),
        $input = $form.find('input[type=email]');
    
    var emptyEmailMsg = $form.data('empty-email-msg'),
        invalidEmailMsg = $form.data('invalid-email-msg'),
        subscribedMsg = $form.data('subscribed-msg');
    
    if (!$input.val()) {
      alert(emptyEmailMsg);
      
      $input.focus();
      
      return false;
    }
    
    $.getJSON(this.action + '?callback=?', $(this).serialize(), function(data) {
      if (data.Status === 400) {
        alert(invalidEmailMsg);
        
        $input.focus();
      } else { // 200
        $input.val('').attr('placeholder', subscribedMsg).blur();
        
        $form.find('button').addClass('done');
      }
    });
  });
  
  /* Check if the browser supports the placeholder attribute */
  
  var testInput = document.createElement('input'),
      supportPlaceholder = false;
  
  if('placeholder' in testInput) supportPlaceholder = true;
  
  /* Fake the placeholder functionality for non-supporting browsers */
  
  if (!supportPlaceholder) {
    $('[placeholder]').focus(function() {
      var input = $(this);
      
      if (input.val() == input.attr('placeholder')) {
        input.val('').removeClass('placeholder');
      }
    }).blur(function() {
      var input = $(this);
      
      if (input.val() == '' || input.val() == input.attr('placeholder')) {
        input.addClass('placeholder').val(input.attr('placeholder'));
      }
    }).blur();
    
    $('[placeholder]').parents('form').submit(function() {
      $(this).find('[placeholder]').each(function() {
        var input = $(this);
        
        if (input.val() == input.attr('placeholder')) {
          input.val('');
        }
      })
    });
  }
  
  /* Open the menu when clicking on the Menu button */
  
  $('#primary-nav-toggle').click(function() {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $(this).next('.full-nav').css({'display': 'block'});
    } else {
      $(this).next('.full-nav').css({'display': ''});
    }
  });
  
  $('.site-overlay').click(function() {
    $('#primary-nav-toggle').toggleClass('active');
  });
  
  $('#masterfooter-topmenu .btn').click(function() {
    $('#primary-nav-toggle').addClass('active');
    
    $('html, body').animate({ scrollTop: 0 }, 'fast');
  });
  
  /* Enable fitvids.js */
  
  $(".post-entry .styled").fitVids();
  
  $(".video-container").fitVids();
  
  /* Force some styling for Wordpress generated stuff */
  
  $(".widget_categories > ul").addClass("nav nav-chevron");
  $(".widget_categories .current-cat").addClass("active");
});


/**
 * Slideshows scripts (from Flexslider)
 */

$(window).load(function() {
	function setSlidesHeight(slider) {
	  var slides = slider.slides,
	      maxSlideHeight = 0;
	  
	  slides.find('img').each(function() {
	    var slideHeight = $(this).height();
	    
	    if (slideHeight > maxSlideHeight) {
	      maxSlideHeight = slideHeight;
	    }
	  });
	  
	  slides.css('height', maxSlideHeight);
	}
	
	$('.slideshow').flexslider({
	  animation: "fade",
	  directionNav: false,
	  controlsContainer: ".slideshow-container",
	  start: function(slider) {
	    // setSlidesHeight(slider);
	  }
	});
});


/**
 * Contact page
 */
 
$(window).load(function() {
  var map,
      panorama,
      geocoder;
  
  // Initialize Google Maps
  function initializeMap($map) {
    geocoder = new google.maps.Geocoder();
    
    $map.each(function(index, element) {
      var address = $(this).attr('data-office-address'),
          latLng = new google.maps.LatLng(0, 0),
          options = {
            zoom: 14,
            center: latLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            streetViewControl: false
          };
      
      map = new google.maps.Map(element, options);
      
      panorama = map.getStreetView();
      panorama.setPosition(latLng);
      panorama.setPov(({
        heading: 265,
        pitch: 0
      }));
      
      setMap(address);
      // toggleStreetView();
    });
  }
  
  // Initialize first tab Google Map on load
  initializeMap($('#tab0').find('.map'));
  
  // Center Google Maps + add marker
  function setMap(address) {
    geocoder.geocode({ 'address': address }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        
        panorama.setPosition(results[0].geometry.location);
        
        var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
        });
      }
    });
  }
  
	  
  /*
  function toggleStreetView() {
    var toggle = panorama.getVisible();
    
    if (toggle === false) {
      panorama.setVisible(true);
    } else {
      panorama.setVisible(false);
    }
  }
  
  $('.toggle-street-view').on('click', function() {
    toggleStreetView();
  });
  */
  
  // Activate .offices-nav tab
  $('.offices-list a').on('click', function(e) {
    e.preventDefault();
    
    var currentLi = $(this).parent('li')[0]
        index = $('.offices-list li').index(currentLi);
    
    $('.offices-nav a').eq(index + 1).tab('show');
  });
  
  // Initialize Google Maps when showing a tab
  $('a[data-toggle="tab"]').on('shown', function(e) {
    var href = $(e.target).attr('href'),
        $map = $(href).find('.map');
    
    initializeMap($map);
  });
  
  // Set office drop-down select
  $('.infos-contact a').on('click', function(e) {
    e.preventDefault();
    
    var officeName = $(this).attr('data-office-name');
    
    $('.offices-nav a:first').tab('show');
    
    $('#contact-recipient').find('option').removeAttr('selected').each(function() {
      if ($(this).val() === officeName) {
        $(this).attr('selected', 'selected');
      }
    });
  });
  
  // Set select nav
  $('.nav-select').change(function(e) {
    var selectedTabId = $(this).find('option:selected').data('url');
    $('.offices-nav a[href="' + selectedTabId + '"]').tab('show');
  });
});