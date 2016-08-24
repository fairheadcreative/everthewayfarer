// Add 'visible()' jQuery functionality
;(function(e){e.fn.visible=function(t,n,r){var i=e(this).eq(0),s=i.get(0),o=e(window),u=o.scrollTop(),a=u+o.height(),f=o.scrollLeft(),l=f+o.width(),c=i.offset().top,h=c+i.height(),p=i.offset().left,d=p+i.width(),v=t===true?h:c,m=t===true?c:h,g=t===true?d:p,y=t===true?p:d,b=n===true?s.offsetWidth*s.offsetHeight:true,r=r?r:"both";if(r==="both")return!!b&&m<=a&&v>=u&&y<=l&&g>=f;else if(r==="vertical")return!!b&&m<=a&&v>=u;else if(r==="horizontal")return!!b&&y<=l&&g>=f}})(jQuery);

jQuery(function($) {
  // If wide display…
  if ($(window).width() > 767) {
    // Use full-size featured image when screen is big enough
    $("[data-full]").each(function() {
      var image_large = $(this).attr('data-full');
      $(this).attr('style', image_large);
      $(this).removeAttr('data-full');
    });
  };

  // If scroll…
  $(window).scroll(function() {
    // Fix Follower sidebar section to the side when scrolling down
    if ($('#sidebar').visible(true) || $('header').visible(true) || $('.sidebar .stock').visible(true)) {
      $('.sidebar-follower').removeClass('fixed');
    } else {
      $('.sidebar-follower').addClass('fixed');
    }

    // Hide Subscribe from the side while big subscribe section is visible
    if ($('.article-subscribe').visible(true)) {
      $('.sidebar-subscribe').fadeOut();
    } else {
      $('.sidebar-subscribe').fadeIn();
    }
  });

  if ($('.resources').length > 0) { 
    $('.resources').addClass('hide');
    $('<a href="javascript:void(0);" class="resources-open button">Expand</a>').prependTo('.resources');

    $('.resources').on('click', '.resources-open', function() {
      $('.resources').removeClass('hide');
      $('.resources-open').fadeOut();
    });
  }

  $(document).on('click', '.postcard-item', function() {
    if ($(this).hasClass('is-open')) {
    } else {
      // Set the classes
      $('body').addClass('postcard-is-open');
      $(this).addClass('is-open');
      
      // Open up the popout
      var val = $(this).attr('id');
      console.log(val + '-popout');
      $('#' + val + '-popout').addClass('is-open').css("margin-top", $(window).scrollTop());


      // Create MiniSiv
      /*$('<div class="minisiv-postcard is-pre is-hidden"></div><div class="minisiv-postcard-message is-hidden"></div>').prependTo('.postcard-item--popout.is-open');
      
      setTimeout(function() {
        $('.minisiv-postcard.is-hidden').removeClass('is-hidden');

        setTimeout(function() {
          $('.minisiv-postcard.is-pre').removeClass('is-pre');
        }, 1000);

      }, 2000);

      setTimeout(function() {
        $('.minisiv-postcard-message.is-hidden').removeClass('is-hidden');
      }, 2500);*/
    }
  });
  $(document).on('click', '.postcard-item-close', function(e) {
    $('body').removeClass('postcard-is-open');
    $('.postcard-item.is-open, .postcard-item--popout.is-open').removeClass('is-open');

    /*setTimeout(function() {
      $('.minisiv-postcard, .minisiv-postcard-message').remove();
    }, 500);*/

    e.stopPropagation();
  });

  $(document).ready(function(){
    
    //fadeout overlays
    $('[data-hide-visual]').on('click', function(){
      var getTarget = $(this).attr('data-hide-visual');
      $('[data-visual="'+getTarget+'"]').addClass('is-off');
    });
    
    //remove overlay if on subscribe page
    if($('.subscribe-page').length > 0) {
      $('.splash-overlay').remove();
    }
    
    //fade in the subscribe page
    $('.subscribe-page [data-fadein="true"]').addClass('fade-in').removeClass('is-under');
    
    //check for popState cookie in local storage and check if overlay's already been shown. If not, show it and set it as shown
    if(localStorage.getItem('popState') != 'seen'){ 
      $('.splash-overlay[data-fadein="true"], .splash-overlay [data-fadein="true"]').addClass('fade-in').removeClass('is-under');
      localStorage.setItem('popState','seen');
    }
    
    //place active element on top of the navigation dropdown   
    var activeElement = $('[class^="nav-primary-"].active'),
        activeContent = activeElement.html();
    
        $('.page-active').html(activeContent);
        activeElement.remove();
  
  });

});
