jQuery(function($) {
  
  var winWidth = $(window).width(),
      winHeight = $(window).innerHeight(),
      activeElement = $('[class^="nav-primary-"].active');
  
  // If wide display…
  if (winWidth > 767) {
    // Use full-size featured image when screen is big enough
    $("[data-full]").each(function() {
      var image_large = $(this).attr('data-full');
      $(this).attr('style', image_large);
      $(this).removeAttr('data-full');
    });
  };

  // If scroll…
  $(window).scroll(function() {
    
    //attach class to top menu if scrolled
    var navigation = $('#navigation');
    if($('#navigation').offset().top > 1){
      navigation.addClass('is-scrolled');
    }else{
      navigation.removeClass('is-scrolled');
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
    }else{$('.splash-overlay').remove();}

    //place active element on top of the navigation dropdown 
    var activeContent = activeElement.html();
        $('.page-active').html(activeContent);
    
    //hide/show mobile navigation
    $('.menu-toggler').on('click', function(){
      $('.nav-primary').toggleClass('nav-opened');
      $('.hamby').toggleClass('nav-animate');
    });
    
    mapsize();
    setTimeout(setPostcard, 100);
    setNav();
  });
  
  $(window).on('resize', function(){
    winWidth = $(window).width();
    winHeight = $(window).height();
    mapsize();
    setNav();
    setPostcard();
  });

  //calculate side map size   
  function mapsize(){
    if($('#map-wrapper').length > 0){
       //var mapWidth = ($(window).width() - $('#main > .container.group').width())/2-32;
          //$('.category-postcards #map-wrapper, .home #map-wrapper, .category-nationalparks #map-wrapper, .category-journeys #map-wrapper').css({
            //'width': mapWidth,
            //'opacity': 1
          //});
    
      $('#map-wrapper.map-side').height(winHeight-60);
      $('.map-side #map').height(winHeight);
      map.invalidateSize();     
    }

  };
  
  //show/hide active nav element depending on screen width
  function setNav(){
    if (winWidth >= 860) {
        activeElement.hide();
      $('.nav-primary').removeClass('toggler-active');
    }else{ 
        activeElement.show();
      $('.nav-primary').addClass('toggler-active');
    };       
  };
  
  //set postcard dimensions
  function setPostcard(){
    var titleHeightMobile = $('.postcard-item--popout h1').height()/2,
        navHeight = $('#navigation').outerHeight(),
        postcardHeight = $('.postcard-item--popout').height(),
        titleHeightDesktop = $('.postcard-item--popout h1').height(),
        faceBtn = $('.postcard-item--popout .button-pc.facebook').outerHeight(),
        singleButtons = $('.splash-article-previous a, .splash-article-next a'),
        postcardText = $('.postcard-item--content--text'),
        textHeight = postcardHeight - titleHeightDesktop - faceBtn - 125;
    
    if(winWidth < 640 && winWidth > 479){
      
      navPos = titleHeightMobile+navHeight-48;
      singleButtons.css({'top': navPos});
      postcardText.css({'height': 'auto'});
      
    }else if(winWidth < 480){
      
      navPos = titleHeightMobile+navHeight-32;
      singleButtons.css({'top': navPos});
      postcardText.css({'height': 'auto'});
      
    }else{
      
      postcardText.height(textHeight);
      singleButtons.css({'top': 0});
    }
  };
  
});
