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
  
    //remove styling from external email subscrition forms and then reveal the form, handle error labels
    $('[class^="_form_"] style').remove();
    $('[class^="_form_"]').removeClass('hide');
    
    //collapse/expand postcards
    $('.postcard-toggle').on('click', function(){
      var postcardBlock = $('.postcard-item--popout'),
          toggleText = $('.toggle-text'),
          toggleIcon = $('.toggle-icon');
      if( postcardBlock.hasClass('is-collapsed') ) {
        postcardBlock.removeClass('is-collapsed');
        toggleText.text('Hide').removeClass('text-hidden');
        toggleIcon.removeClass('rotate');
      } else {
        postcardBlock.addClass('is-collapsed');
        toggleText.text('Show').addClass('text-hidden');
        toggleIcon.addClass('rotate');
      }
    });
    
    mapsize();
    setTimeout(setPostcard, 100);
    setNav();
    shopItem.setLayout();
  });
  
  $(window).on('resize', function(){
    winWidth = $(window).width();
    winHeight = $(window).height();
    mapsize();
    setNav();
    setPostcard();
    shopItem.setLayout();
  });
  
//rearrange shop item for mobile layouts
  
  var shopItem = {
    setLayout: function(){
      var productImageHeight = $('.product-image .images a img').height() + 64;
      var productTopHeight = $('.product_title').height() + 166;
      if(winWidth < 860){
        $('.product-description-short').css({
          'margin-top': productImageHeight
        });
        $('.product-image').css({
          'top': productTopHeight
        });
      } else {
        $('.product-description-short, .product-image').removeAttr('style');
      }
    }
  }

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
    
    if(winWidth < 800 && winWidth > 639){
      
      navPos = titleHeightMobile+navHeight-46;
      singleButtons.css({'top': navPos}).addClass('visible');
      postcardText.css({'height': 'auto'});
      
    }else if(winWidth < 640 && winWidth > 479){
      
      navPos = titleHeightMobile+navHeight-60;
      singleButtons.css({'top': navPos}).addClass('visible');
      postcardText.css({'height': 'auto'});
      
    }else if(winWidth < 480 && winWidth > 379){
      
      navPos = titleHeightMobile+navHeight-40;
      singleButtons.css({'top': navPos}).addClass('visible');
      postcardText.css({'height': 'auto'});
      
    }else if(winWidth < 380){
      
      navPos = titleHeightMobile+navHeight-44;
      singleButtons.css({'top': navPos}).addClass('visible');
      postcardText.css({'height': 'auto'});
      
    }else{      
      postcardText.height(textHeight);
      singleButtons.css({'top': 0});
    }
  };
  
});
