
$(document).ready(function() {

clickHandler = 'click touch';
ShoppingCart = $('#shopping-cart');


// using context
ShoppingCart.sidebar(
  {
    scrollLock: true,
    duration: 2000,
    exclusive: true,
    transition: 'overlay',
    onVisible: function() {
        $('#mobile-menu').sidebar('hide');
        $('body').addClass('cart-visible');

        $('#optin-header').sidebar('hide');
        $('#following-menu').velocity({ 'margin-top': "0px" }, { duration: 200, queue: false });

    },
    onHide: function() {
        $('body').removeClass('cart-visible');
    },

  })
  .sidebar('setting', 'transition', 'overlay')
  .sidebar('setting', 'scrollLock', true)
  .sidebar('attach events', '.open-cart', 'show')
  //$('.open-cart').removeClass('disabled');



/* ============================================================================================
                                  Add Product To Cart
============================================================================================ */
$('#pricing #product-container .ui.button[data-add-to-cart="true"]').api({
  // Settings
    on: 'click',
    cache: false,
    defaultData: false,
    throttle: false,
    throttleFirstRequest: false,
    interruptRequests: false,
    loadingDuration: 500,
    action: 'add product',
    //action: 'echo test',
    method : 'POST',
    dataType: 'json',
    beforeSend: function (settings) {
      settings.data.pid = $(this).attr('data-pid');
      settings.data.type  = $(this).attr('data-productType');
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
            TODO: Error Code 1000: Product Already In Cart
        ---------------------------------------------------- */

        ShoppingCart.sidebar('show');
        HighlightLineItem(response.pid)
        //console.log(response);
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
        UpdateShoppingCartElements(response, 1);

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








  $('#cart-products .action-remove-from-cart').api({
      // Settings
        //on: 'click',
        cache: false,
        defaultData: false,
        throttle: 1000,
        throttleFirstRequest: false,
        interruptRequests: false,
        // Minimum duration to show loading indication
        loadingDuration: 100,
        // Named Action For API Call
        action: 'remove product',
        method : 'POST',
        dataType: 'json',
        beforeSend: function (settings) {
          // Collecting Data To Send
          settings.data.pid = $(this).closest('tr').attr('data-pid');
          console.log($(this).closest('tr').attr('data-pid'));
          return settings;
        },
        beforeXHR: function(xhr) {
          // adjust XHR with additional headers
          xhr.setRequestHeader ('X-CSRF-Token', $('meta[name=_token]').attr('content'));
          return xhr;
        },
        onResponse: function(response) {
          // make some adjustments to response from server API
          // Check For Success == False And Return Error Based On Message
          if (response.success == false) {
            //console.log('Return was false');
            //console.log(response);
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
            UpdateShoppingCartElements(response, 0);
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



    $('#continue-shopping').on('click', function() {
      ShoppingCart.sidebar('hide');
    });







  $('#cart-products').on('click', '.action-change-quantity', function() {
    var $par   = $(this).closest('tr');
    var $num   = $par.find('span');
    var qty    = parseInt($num.text());
    var change = $(this).attr('data-quantity');

    if(change == 'subtract')  { newQty = qty - 1; }
    if(change == 'add')       { newQty = qty + 1; }

    if( newQty > 0 && newQty < 19 ) {
      $num.html(newQty);
      PendingQuantityUpdate();
    }
  });

  $('#cart-update-quantity').api({
    // Settings
      //on: 'click',
      cache: false,
      defaultData: false,
      throttle: 1000,
      throttleFirstRequest: false,
      interruptRequests: false,
    // Minimum duration to show loading indication
      loadingDuration: 100,

    // Named Action For API Call
      action: 'update quantity',
      method : 'POST',

      // No idea what this is actually useful for
      //data: {
      //  pid : $(this).attr('data-pid')
      //},
      dataType: 'json',

      beforeSend: function (settings) {
        // Collecting Data To Send

        var productData = {};

        $('#cart-products tr[data-pid]').each(function() {

          var id = $(this).attr('data-pid');
          var qty = parseInt($(this).find('td.cart-quantity span').text());
          productData[id] = qty;

        })

        settings.data.qtyData = productData;
        console.log(productData);
        return settings;
      },

      beforeXHR: function(xhr) {
        // adjust XHR with additional headers
        xhr.setRequestHeader ('X-CSRF-Token', $('meta[name=_token]').attr('content'));
        return xhr;
      },

      onResponse: function(response) {
        // make some adjustments to response from server API

        // Check For Success == False And Return Error Based On Message
        if (response.success == false) {
          //console.log('Return was false');
          //console.log(response);
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
          UpdateShoppingCartElements(response, 0);
          PendingCheckout();
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







    function PendingQuantityUpdate() {
      var checkoutBox     = $('#cart-action-box');
      var checkoutButtons = $('#cart-checkout-box');
      var quantityButtons = $('#cart-quantity-box');
      if( checkoutBox.hasClass('pending-quantity-update') ) { return; }
        checkoutButtons.velocity('transition.fadeOut',
        {
          duration: 50,
          begin: function() {
            checkoutBox.css('min-height', checkoutBox.outerHeight());
          },
          complete: function() {
            quantityButtons.velocity('transition.fadeIn', { stagger: 100, delay: 0 });
            checkoutBox.css('min-height', '0px')
              .removeClass('pending-checkout')
              .addClass('pending-quantity-update');
          }
        });
    }


    function PendingCheckout() {
      var checkoutBox     = $('#cart-action-box');
      var checkoutButtons = $('#cart-checkout-box');
      var quantityButtons = $('#cart-quantity-box');

      if( checkoutBox.hasClass('pending-checkout') ) { return; }
        quantityButtons.velocity('transition.fadeOut',
        {
          duration: 50,
          begin: function() {
            checkoutBox.css('min-height', checkoutBox.outerHeight());
          },
          complete: function() {
            checkoutButtons.velocity('transition.fadeIn', { stagger: 100, delay: 0 });
            checkoutBox.css('min-height', '0px')
              .removeClass('pending-quantity-update')
              .addClass('pending-checkout');
          }
        });
    }






















  /* Apply Coupon Once Length Requirement Has Been Met */
    $('input[name="coupon-code"]').on('input propertychange paste', function() {

      if( $(this).val().length > 2 ) {
        $('#coupon-submit').removeClass('disabled grey').addClass('orange');
      } else {
        $('#coupon-submit').removeClass('orange').addClass('disabled grey');
      }
    });






  $('#coupon-submit').api({
      // Settings
        //on: 'click',
        cache: false,
        defaultData: false,
        throttle: 200,
        throttleFirstRequest: false,
        interruptRequests: false,
        // Minimum duration to show loading indication
        loadingDuration: 500,
        action: 'update coupon',
        method : 'POST',
        dataType: 'json',
        beforeSend: function (settings) {
          // Collecting Data To Send
          settings.data.coupon = $('input[name="coupon-code"]').val();
          console.log($('input[name="coupon-code"]').val());
          return settings;
        },
        beforeXHR: function(xhr) {
          // adjust XHR with additional headers
          xhr.setRequestHeader ('X-CSRF-Token', $('meta[name=_token]').attr('content'));
          return xhr;
        },
        onResponse: function(response) {
          // make some adjustments to response from server API
          // Check For Success == False And Return Error Based On Message
          if (response.success == false) {
            //console.log('Return was false');
            //console.log(response);

            //$('#coupon-submit').velocity({backgroundColor: "#ff0000"},{});

            var $csButton = $('#coupon-submit');
            //$('#coupon-submit').velocity({backgroundColor: "#ff0000"});
            //$('#coupon-submit').velocity('reverse');


/*            $('#checkout-coupon-wrap input[name="coupon-code"]')
              .popup({
                title   : 'Invalid Coupon'
              });*/

            $csButton.velocity({
              backgroundColor: "#ff0000",
              //backgroundColorAlpha: 0.5,
              },
              {
                duration: 200
              }
            );
            $csButton.velocity("reverse", { duration: 200 });

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
          //$('#checkout-table-wrap').html(response.table);
          // Update Shopping Cart table View
          UpdateShoppingCartElements(response, 0);
          $('input[name="coupon-code"]').val(response.data.couponCode).addClass('disabled');
          $('#coupon-submit').removeClass('orange').addClass('disabled grey');

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




  $('tr.coupon-code .remove-coupon').api({
      // Settings
        //on: 'click',
        cache: false,
        defaultData: false,
        throttle: 200,
        throttleFirstRequest: false,
        interruptRequests: false,
        // Minimum duration to show loading indication
        loadingDuration: 100,
        // Named Action For API Call
        action: 'remove coupon',
        //action: 'echo test',
        method : 'POST',
        dataType: 'json',
        beforeSend: function (settings) {
          settings.data.coupon = $('input[name="coupon-code"]').val();
          return settings;
        },
        beforeXHR: function(xhr) {
          xhr.setRequestHeader ('X-CSRF-Token', $('meta[name=_token]').attr('content'));
          return xhr;
        },
        onResponse: function(response) {
          // make some adjustments to response from server API
          // Check For Success == False And Return Error Based On Message
          if (response.success == false) {
            //console.log('Return was false');
           // console.log(response);
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
          UpdateShoppingCartElements(response, 0);
          $('input[name="coupon-code"]').val('').removeClass('disabled');
          $('#coupon-submit').removeClass('disabled grey').addClass('orange');
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




























































  displays = $('#banner-menu .cart-quantity-label, #following-menu .cart-quantity-label, #sidebar-menu .cart-quantity-label');

  function UpdateShoppingCartElements(object, cartAction) {
    // Update Cart Quantity Indicators
    displays.each(function() {
      $(this).html(object.data.cartQuantity);
    });
    // Replace Cart Product Listing With Updated View Partial
      $('#cart-products').html(object.productView);
    // Open Cart SideBar If
      if (cartAction == 1) {
        ShoppingCart.sidebar('show');
      }
  }



  function HighlightLineItem(pid) {
    var $element = ShoppingCart.find('tr[data-pid="' + pid + '"]');
    $element.velocity({
      backgroundColor: "#2185d0",
      backgroundColorAlpha: 0.5,
    });
    $element.velocity("reverse", { duration: 1000 });
  }


});
