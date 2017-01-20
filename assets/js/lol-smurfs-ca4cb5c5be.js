$(document).ready(function() {


  $('#mobile-menu')
    .sidebar('setting', 'transition', 'overlay')
    .sidebar('attach events', 'a.toc.item', 'show')
  ;



  // Google Analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga("create", "UA-53296121-1", "auto");
  ga("send", "pageview");
  setTimeout("ga('send','event','Profitable Engagement','time on page more than 30 seconds')",30000);


    /**
     * Register Variables
     */
    $nav = $('#banner-menu');

    // fix menu when passed
    $('.masthead, .bloghead')
      .visibility({
        once: false,
        refreshOnResize: true,
        checkOnRefresh: true,
        offset: -100,
        onTopPassed: function(calc) {
          NavAlt();
        },
        onTopPassedReverse: function(calc) {
          NavOrig();
        }
      })
    ;

    // create sidebar and attach to menu open
    $('#navigation-mobile')
      .sidebar('attach events', '#mobile-menu-open')
    ;

    /**
     * Navigation styling when user is on top of page
     */
    function NavOrig() {
      var imagePath = window.templateFolder + "/img/Lol-Smurfs-Icon-Black.png";
      $nav
        //.removeClass('alternate')
        .velocity({
          //backgroundColor: "transparent",
          backgroundColorRed: 247,
          backgroundColorGreen: 247,
          backgroundColorBlue: 247,
          backgroundColorAlpha: 0.0,
          "margin-top": "40px",
          paddingBottom: "2em"
        }, 200);
      // Logo Color
      $nav.find('.ui.item img')
        .velocity({
          opacity: 0
        }, 50)
        .attr("src",imagePath)
        .velocity({
          opacity: 1
        }, 50)
      ;

      /** Text Color */
      $nav.removeClass('alternate');

    }

    /**
     * Navigation styling when user has scrolled page
     */
    function NavAlt(){
      var imagePath = window.templateFolder + "/img/Lol-Smurfs-Icon-White.png";
      $nav
        //.addClass('alternate')
        .velocity({
          //backgroundColor: "#1B1C1D",
          backgroundColorRed: 247,
          backgroundColorGreen: 247,
          backgroundColorBlue: 247,
          backgroundColorAlpha: 1.0,
          paddingTop: ".75em",
          paddingBottom: ".25em"
        }, 200);
      // Logo Color
      $nav.find('.ui.item img')
        .velocity({
          opacity: 0
        }, 50)
        .attr("src",imagePath)
        .velocity({
          opacity: 1
        }, 50)
      ;
      /** Text Color */
      $nav.addClass('alternate');
    }

  /* ---------------------------------------------------
        Global Variables
  --------------------------------------------------- */
    $navHeight = $('#following-menu').height()+100;
    //$easingOne = [ 0.33, 0.8, 0.44, 0.89 ];
    $easingOne = 'ease-in-out';
    $html = $('html');

  /* ---------------------------------------------------
        ScrollTo Anchor On Click
  --------------------------------------------------- */
    $('.scrollto').on('click', function(e) {
      e.preventDefault();

      var target = $(this).attr('data-scrollto');

      if( $(target).length > 0 ) {
        var newPos = $(target).offset();

        var scrollToPosition = (newPos.top - $navHeight);
        /* ---------------------------------------------------------------------------------------------------
                          IF EMAIL OPT-IN VISIBLE, ADD TO SCROLL FUNCTIONALITY
        --------------------------------------------------------------------------------------------------- */

        //$html.velocity("scroll", { offset: scrollToPosition + 'px', mobileHA: true });
        $(target).velocity("scroll", { duration: 500, offset: -$navHeight, easing: $easingOne });

        return false;

      } else {
        window.location = 'https://lol-smurfs.com' + target;
      }

    });

  /* ---------------------------------------------------
        Customer Reviews Slider
  --------------------------------------------------- */

    // Set Static Height For Customer Review Elements
    function ReviewHeight() {
      $('#customer-reviews-one, #customer-reviews-two').each(function( index ) {
        var height = $(this).outerHeight();
        $(this).css('max-height', height);
      });
    }
    ReviewHeight();

    var ReviewTimeout = 8000;

    var ToggleCustomerReviewsOne = function() {
      var current = $('#customer-reviews-one .customer-review.active');
      var next = $(current).next('#customer-reviews-one .customer-review')
      // Prep Next For Animating In
        $(current).removeClass('queing');
      // If Last Element, Start At First Again
      if (!next.length) { next = $('#customer-reviews-one .customer-review').first();}
      // Prep Next For Animating In
        $(next).addClass('queing');
      // Animate Current Out
        $(current).velocity("transition.slideDownBigOut", { duration: 750 }).removeClass('active');
      // Animate Next In
        $(next).velocity("transition.slideDownBigIn", { delay: 750, duration: 750 }).addClass('active');
      // Animate Rating Stars In
        setTimeout(function(){
          var ratings = $(next).find('p.review-rating i');
          $(ratings).velocity('transition.bounceRightIn', { stagger: 50 });
        }, 1000);
    };
    setInterval(ToggleCustomerReviewsOne, ReviewTimeout);

    var ToggleCustomerReviewsTwo = function() {
      var current = $('#customer-reviews-two .customer-review.active');
      var next = $(current).next('#customer-reviews-two .customer-review')
      // Prep Next For Animating In
        $(current).removeClass('queing');
      // If Last Element, Start At First Again
      if (!next.length) { next = $('#customer-reviews-two .customer-review').first();}
      // Prep Next For Animating In
        $(next).addClass('queing');
      // Animate Current Out
        $(current).velocity("transition.slideDownBigOut", { duration: 750 }).removeClass('active');
      // Animate Next In
        $(next).velocity("transition.slideDownBigIn", { delay: 750, duration: 750 }).addClass('active');
      // Animate Rating Stars In
        setTimeout(function(){
          var ratings = $(next).find('p.review-rating i');
          $(ratings).velocity('transition.bounceRightIn', { stagger: 50 });
        }, 1000);
    };
    setTimeout(function(){
        setInterval(ToggleCustomerReviewsTwo, ReviewTimeout);
    }, (ReviewTimeout / 2));


  /*----------------------------------------------------
        Scholarship Slider
  ----------------------------------------------------- */
  var lastAnimationId = 1; // represents the current id for the animation decision

  $(".scholarship-slider-link").on('click', function(){
    var currentLink = $(this);

    // Show only slider 1
    if(currentLink.attr("id").indexOf("01")!=-1){

      $("#scholarship-paragraph-01").addClass("active");
      $("#scholarship-image-01").addClass("active");
      $("#scholarship-slider-01").addClass("active");

      $("#scholarship-paragraph-02").removeClass("active");
      $("#scholarship-image-02").removeClass("active");
      $("#scholarship-slider-02").removeClass("active");

      $("#scholarship-paragraph-03").removeClass("active");
      $("#scholarship-image-03").removeClass("active");
      $("#scholarship-slider-03").removeClass("active");

      if(lastAnimationId == 2 || lastAnimationId == 3){
        $("#scholarship-paragraph-01").addClass("scholarship-animate-right");
        $("#scholarship-paragraph-02").removeClass("scholarship-animate-right");
        $("#scholarship-paragraph-02").removeClass("scholarship-animate-left");
        $("#scholarship-paragraph-03").removeClass("scholarship-animate-right");
        $("#scholarship-paragraph-03").removeClass("scholarship-animate-left");
      }

      lastAnimationId = 1;
    }

    // Show only slider 2
    if(currentLink.attr("id").indexOf("02")!=-1){
      $("#scholarship-paragraph-02").addClass("active");
      $("#scholarship-image-02").addClass("active");
      $("#scholarship-slider-02").addClass("active");

      $("#scholarship-paragraph-01").removeClass("active");
      $("#scholarship-image-01").removeClass("active");
      $("#scholarship-slider-01").removeClass("active");

      $("#scholarship-paragraph-03").removeClass("active");
      $("#scholarship-image-03").removeClass("active");
      $("#scholarship-slider-03").removeClass("active");

      if(lastAnimationId == 1){
        $("#scholarship-paragraph-02").addClass("scholarship-animate-left");
        $("#scholarship-paragraph-01").removeClass("scholarship-animate-right");
        $("#scholarship-paragraph-01").removeClass("scholarship-animate-left");
      }
      if(lastAnimationId == 3){
        $("#scholarship-paragraph-02").addClass("scholarship-animate-right");
        $("#scholarship-paragraph-03").removeClass("scholarship-animate-right");
        $("#scholarship-paragraph-03").removeClass("scholarship-animate-left");
      }

      lastAnimationId = 2;
    }

    // Show only slider 3
    if(currentLink.attr("id").indexOf("03")!=-1){
      $("#scholarship-paragraph-03").addClass("active");
      $("#scholarship-image-03").addClass("active");
      $("#scholarship-slider-03").addClass("active");

      $("#scholarship-paragraph-01").removeClass("active");
      $("#scholarship-image-01").removeClass("active");
      $("#scholarship-slider-01").removeClass("active");

      $("#scholarship-paragraph-02").removeClass("active");
      $("#scholarship-image-02").removeClass("active");
      $("#scholarship-slider-02").removeClass("active");

      if(lastAnimationId == 1 || lastAnimationId == 2){
        $("#scholarship-paragraph-03").addClass("scholarship-animate-left");
        $("#scholarship-paragraph-01").removeClass("scholarship-animate-right");
        $("#scholarship-paragraph-01").removeClass("scholarship-animate-left");
        $("#scholarship-paragraph-02").removeClass("scholarship-animate-right");
        $("#scholarship-paragraph-02").removeClass("scholarship-animate-left");
      }

      lastAnimationId = 3;
    }
  });


  /* ---------------------------------------------------
        Pricing Sector
  --------------------------------------------------- */

    // Pricing Globals
    $packageDimmer = $('#pricing .pricing-dimmer');
    $packageContainer = $('#product-container');
    $packageButtons = $('#package-buttons .package-button');

    // On Region Navigation Click
    $('.region-link').on('click', function(e){
      e.preventDefault();

      var packageName = $(this).attr('data-package');
      var packageTitle = $(this).attr('data-packageTitle');
      var $newPackage = $('#pricing #' + packageName + '-box');
      var $products = $newPackage.find('.column.package');
      // The region has no content - lets show the no-stock-content div
      if($newPackage.length == 0) {
        $(".no-stock-content").show();
        $('#sign-up-area').show();
        $('#sign-up-area2').hide();
        $("#no-stock-content-header").html(packageTitle + " Unranked LoL Accounts");
      } else {
        //$("#no-stock-content-header").html(packageTitle + " Unranked LoL Accounts");
        //$(".no-stock-content").show();
      }

      // Region Button Handling
      //RegionButtonHandler($(this));
      $(this).addClass('selected');

      // If Package Is Already Being Shown, Remove It From View;
      if( typeof livePackage !== 'undefined' ) {

        // If Clicked Package Is Already Displayed, Do Nothing
        if( livePackage == packageName ) {
          $('#package-target').velocity("scroll", { duration: 750, delay: 0, offset: -$navHeight, easing: $easingOne }); return;
        }
        else
        {
          LoadNewPackage(livePackage, $newPackage, packageName, packageTitle, $products );
        }

      }
      else {
        LoadInitialPackage($newPackage, packageName, packageTitle, $products );
      }

    });

    // On Region Package Click
    $('#package-buttons .package-button').on('click', function(e){
      e.preventDefault();

      var packageName = $(this).attr('data-package');
      var packageTitle = $(this).attr('data-packageTitle');
      var $newPackage = $('#pricing #' + packageName + '-box');
      var $products = $newPackage.find('.column.package');

      // The region has no content - lets show the no-stock-content div
      if($newPackage.length == 0) {
        $(".no-stock-content").show();
        $("#no-stock-content-header").html(packageTitle + " Unranked LoL Accounts");
        $("#regionModalType").val(packageName);
      } else {
        //$("#no-stock-content-header").html(packageTitle + " Unranked LoL Accounts");
        //$(".no-stock-content").show();
      }


      // Region Button Handling
      //RegionButtonHandler($(this));
      $(this).addClass('selected');

      // If Package Is Already Being Shown, Remove It From View;
      if( typeof livePackage !== 'undefined' ) {

        // If Clicked Package Is Already Displayed, Do Nothing
        if( livePackage == packageName ) {
          $('#package-target').velocity("scroll", { duration: 750, delay: 0, offset: -$navHeight, easing: $easingOne }); return;
        }
        else
        {
          LoadNewPackage(livePackage, $newPackage, packageName, packageTitle, $products );
        }

      }
      else {
        LoadInitialPackage($newPackage, packageName, packageTitle, $products );
      }

    });



    function LoadNewPackage($livePackage, $newPackage, packageName, packageTitle, $products ) {
      if($newPackage.length == 0){
        $('#sign-up-area2').hide();
        $('#sign-up-area').show();
        $("#regionModalType").val(packageName);
        $('#' + $livePackage + '-box').hide();
        $packageContainer.css("min-height", "0px"); // set the height back to 0
        PackageScroll(750);
        return;
      }
      $(".no-stock-content").hide(); // Hide the out of stock container if it is visible
      $('#' + $livePackage + '-box').show(); // show if it got hidden previously

      newHeight = $newPackage.outerHeight();
      $packageContainer.velocity({'min-height': newHeight}, { duration: 250, delay: 150, easing: $easingOne });
      $products.velocity({ opacity : 0 });
      $('#' + $livePackage + '-box').velocity('transition.slideRightBigOut',
      {
        duration: 50,
        delay: 50,

        begin: function() {

          // Scroll To Package Display
          PackageScroll(750);
          // Set Dimmer Text
          $('#pricing span#price-dimmer-package-text').text(packageTitle);
          // Load Pricing Dimmer
          $packageDimmer.dimmer('show');
        },

        complete: function() {

          $newPackage.velocity('transition.slideLeftBigIn',{
            complete: function() {

              $packageDimmer.dimmer('hide');
              $products.velocity('transition.fadeIn', { stagger: 100, delay: 0 });
              livePackage = packageName;
            }
          });


        }
      });
    }

    function LoadInitialPackage($newPackage, packageName, packageTitle, $products ) {
       if($newPackage.length == 0){
        $('#sign-up-area2').hide();
        $('#sign-up-area').show();
        $packageContainer.css("min-height", "0px"); // set the height back to 0
        PackageScroll(500);
        return;
      }
      $(".no-stock-content").hide(); // Hide the out of stock container if it is visible
      newHeight = $newPackage.outerHeight();
      $packageContainer.velocity({'min-height': newHeight}, { duration: 250, delay: 150, easing: $easingOne });

      $newPackage.velocity('transition.slideLeftBigIn',{

        begin: function() {
          PackageScroll(750);
          // Set Dimmer Text
          $('#pricing span#price-dimmer-package-text').text(packageTitle);
          // Load Pricing Dimmer
          $packageDimmer.dimmer('show');
        },

        progress: function(elements, complete, remaining, start, tweenValue) {
          //
        },

        complete: function() {
          $packageDimmer.dimmer('hide');
          $products.velocity('transition.fadeIn', { stagger: 100, delay: 0 });
          ProductHeightEqualizer();
          livePackage = packageName;

        }
      });
    }

    function PackageScroll(value) {
      $('#package-target').velocity("scroll", { duration: value, delay: 0, offset: -$navHeight, easing: $easingOne });
    }


  /* ---------------------------------------------------
        Keep Product Boxes At Even Height
  --------------------------------------------------- */

  function ProductHeightEqualizer() {

    ProductDescriptionHeight = 0;
    ProductDescriptions = $('#product-container .package-box .product-description-box');

    ProductDescriptions.each( function() {
      if( $(this).outerHeight() > parseInt(ProductDescriptionHeight)) {
        ProductDescriptionHeight = $(this).outerHeight();
      }
    });

    $('#product-container .package-box .product-description-box').css('min-height', ProductDescriptionHeight);

  }

  /* ---------------------------------------------------
        Linking Reviews Logo To Review Page
  --------------------------------------------------- */

  $('img#review-logo').on('click', function(e) {

    var win = window.open('https://www.lol-smurfs.com/reviews', '_blank');
    if(win){
        //Browser has allowed it to be opened
        win.focus();
    }else{
        //Broswer has blocked it
        alert('Please allow popups for this site');
    }
  });

  /* ---------------------------------------------------
        Site Layout Scripts
  --------------------------------------------------- */

  // Why Us Cards - Equal Height
  WhyUsCardHeight = 0;
  WhyUsCards = $('#why-us .ui.card');
  WhyUsCards.each( function() {
    if( $(this).outerHeight() > parseInt(WhyUsCardHeight)) {
      WhyUsCardHeight = $(this).outerHeight();
    }
  });

  $('#why-us .ui.card').css('min-height', WhyUsCardHeight);


  /* ---------------------------------------------------
        Semantic UI Generic Elements
  --------------------------------------------------- */
  // Semantic Popup
    $('#pricing .product-box i').popup(
      {
        transition: 'vertical flip'
      }
    );

  // Semantic Rating
    $('.ui.rating').rating();

  // Semantic Accordion
    $('#faq .ui.accordion').accordion();

  // Semantic Checkbox
    $('.ui.checkbox').checkbox();



























    /* --------------------------------------------------------------------------------------------------------
          CampaignMonitor Opt-in scripts
    -------------------------------------------------------------------------------------------------------- */

      //console.log(Cookies.get('ls-subscriber'));
      //Cookies.remove('ls-subscriber');
      //Cookies.remove('ls-optin-dismissed')


    /* --------------------------------------------------------------------------------------------------------
          Initial Variables
    -------------------------------------------------------------------------------------------------------- */
      ModalShown = 0;

    /* --------------------------------------------------------------------------------------------------------
          Opt-In Menu Bar
    -------------------------------------------------------------------------------------------------------- */
      $('#optin-header')
        .sidebar('setting', 'transition', 'push')
        .sidebar('setting', 'exclusive', 'false')
        .sidebar('setting', {
          dimPage: false,
          closable: false,
          onHidden: function() {
            //  Is called after a sidebar has finished animating out.
            //console.log('hidden');
          },
          onVisible: function() {
            //  Is called when a sidebar begins animating in.
            //console.log('Visible');
          }
        });
        //.sidebar('attach events', '#optin-header-close', 'hide');


        $('#optin-header-close').on('click', function(e) {
          // Set Dismissal Cookie
            Cookies.set('ls-optin-dismissed', 1);
          // Prevent Exit Detect Modal From Firing
            ModalShown = 1;
          // Hide Optin
            HideOptinBar();
        });


    /* --------------------------------------------------------------------------------------------------------
          Initialization : Only Display Optin Top Bar And Exit Detect If User Is Not Subscribed
    -------------------------------------------------------------------------------------------------------- */

      // Only Display Opt-In Header If Subscriber Cookie Not Present

        if( Cookies.get('ls-subscriber') != 'subscribed' && Cookies.get('ls-optin-dismissed') != 1 ) {

          // Displays Optin And Sets Body Class For Following Menu
          ShowOptinBar();
          //$('#optin-header').sidebar('show');

/*          var _ouibounce = ouibounce(false, {
            sensitivity: 40,
            aggressive: true,
            sitewide: true,
            cookieDomain: '.lol-smurfs.com',
            timer: 10000,
            delay: 100,
            sitewide: true,
            callback: function() {
              if( ModalShown == 0 ) {
                $('#cm-optin-modal').modal('show');
              }
            }
          });*/
        }

    /* --------------------------------------------------------------------------------------------------------
          Opt-In Modal
    -------------------------------------------------------------------------------------------------------- */
        $('#cm-optin-modal')
          .modal('setting', 'transition', 'scale')
          .modal({
              blurring: false,
              // On Approve Prevents Modal From Closing On Submit
              onApprove : function() {
                return false;
              },
              onVisible : function() {
                ModalShown = 1;
              }
          })
          .modal('attach events', '.cm-optin-init', 'show')
          .modal('attach events', '#cm-optin-modal .cancel', 'hide')
        ;


    /* --------------------------------------------------------------------------------------------------------
          Opt-In Form Validation
    -------------------------------------------------------------------------------------------------------- */
      $('#cm-optin-form input').each(function(){
        $(this).on('input', function(e) {
          ValidateOptinForm();
        });
      });


    $optinFirstName     = $('#cm-optin-form input[name="first-name"]');
    $optinLastName      = $('#cm-optin-form input[name="last-name"]');
    $optinEmailAddress  = $('#cm-optin-form input[name="email-address"]');
    $optinSubmitButton  = $('#cm-optin-submit');

    $('#cm-optin-modal-result').transition('hide');

    $('#cm-optin-submit').api({
      // Settings
        on: 'click',
        cache: false,
        defaultData: false,
        throttle: false,
        throttleFirstRequest: false,
        interruptRequests: false,
        loadingDuration: 500,
        action: 'subscribe',
        //action: 'echo test',
        method : 'POST',
        dataType: 'json',
        beforeSend: function (settings) {
          settings.data.firstName     = $optinFirstName.val();
          settings.data.lastName      = $optinLastName.val();
          settings.data.emailAddress  = $optinEmailAddress.val();
          return settings;
        },
        beforeXHR: function(xhr) {
          xhr.setRequestHeader ('X-CSRF-Token', $('meta[name=_token]').attr('content'));
          return xhr;
        },
        onResponse: function(response) {

          if (response.success == false) {
            //console.log('Return was false');
            //console.log(response);
            /* ----------------------------------------------------
                TODO: Error Codes Output Here
            ---------------------------------------------------- */
          return false;

          }
          // On Success != false, Continue
          return response;
        },
        successTest: function(response) {
          // test whether a JSON response is valid
          return response.success || false;
        },
        onComplete: function(response) {
          // always called after XHR complete
        },
        onSuccess: function (response) {
          // Entire Response
            //console.log(response);
          // Return Message
            //console.log(response.message);

          /* ----------------------------------------------------
                SUCCESS Handling
          ---------------------------------------------------- */
          // Remove Submit button
            $('#cm-optin-modal .actions #cm-optin-submit').transition('hide', function() {
              // Transition In Success Message
              $('#cm-optin-modal .content .ui.grid').transition('hide', function() {
                $('#cm-optin-modal-result').transition('scale');
              });
            });

          // Return Message To User Confirming Subscription

          // Set User Cookie So Display Doesn't Show Again
            Cookies.set('ls-subscriber', 'subscribed', { expires: 365 });




        },
        onFailure: function(response) {
          // request failed, or valid response but response.success = false
        },
        onError: function(errorMessage) {
          // invalid response
        },
        onAbort: function(errorMessage) {
          // navigated to a new page, CORS issue, or user canceled request
        }
    });



      function ShowOptinBar() {

        if($(window).width() > 700) {
          $('#optin-header').sidebar('show');
          $('#following-menu').velocity({ 'margin-top': $('#optin-header').height() }, { queue: false });
          return;
        }
        $('#optin-header').sidebar('hide');
      }

      function HideOptinBar() {
        $('#optin-header').sidebar('hide');
        $('#following-menu').velocity({ 'margin-top': "0px" }, { duration: 200, queue: false });
      }


    // Negative Value Testing Optin Form
      function ValidateOptinForm() {
        if( $optinFirstName.val().length < 2 )                { $optinSubmitButton.addClass('disabled'); return; }
        if( $optinLastName.val().length < 2 )                 { $optinSubmitButton.addClass('disabled'); return; }
        if( !isValidEmailAddress( $optinEmailAddress.val() )) { $optinSubmitButton.addClass('disabled'); return; }
        $optinSubmitButton.removeClass('disabled');
      }


    //  Test For Valid Email Address
      function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress);
      };
}); // End Doc Ready
//# sourceMappingURL=lol-smurfs.js.map
