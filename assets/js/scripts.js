// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function() {};
  var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());
if (typeof jQuery === 'undefined') {
  console.warn('jQuery hasn\'t loaded');
} else {
  console.log('jQuery has loaded');
}
// Place any jQuery/helper plugins in here.
$(function() {
  $('.headnav li a').each(function(index, el) {
    $(this).addClass('top-banner-link item scrollto');
    // var datalink = $(this).attr('href');
    // if (datalink.indexOf('#')) {
    //   $(this).attr('data-scrollto', datalink)
    // }
  });

});
(function() {
  var $elements = $('.customer-review ');
  var maxheight = 0;
  $elements.each(function() {
    if ($(this).height() > maxheight) {
      maxheight = $(this).height();
    }
  });
  $elements.height(maxheight);
  $('#customer-reviews-one').height(maxheight);
  $('#customer-reviews-two').height(maxheight);

}());


// REMOVE
$(document).ready(function() {

  /* Define API endpoints once globally */
  $.fn.api.settings.api = {
    'echo test': '/echo',
    // Product API
    'add product': '/store/cart-add-rg',
    'remove product': '/store/cart-remove',
    'update quantity': '/store/update-quantity',
    /** Currency Api */
    'get conversion rate': '/store/convert-currency',
    // Coupon API
    'update coupon': '/store/cart-apply-coupon',
    'remove coupon': '/store/cart-remove-coupon',
    // Mailing List
    'subscribe': '/mailinglist/subscribe'
  };
});

// NEW
$('#checkout').on('click', function(e) {
    e.preventDefault();
    var products = $('#shopping-cart').find('tbody tr');
    if (products.length < 1) {
      console.log(products.length);
      return false;
    }
    window.location.href = 'https://www.lol-smurfs.com/checkout';
  })
  // NEW
  /* ----------------------------------------------------
      Subscribe Out of Stock Modal
    ----------------------------------------------------- */
$('#out-of-stock-button').on('click', function(e) {
  e.preventDefault();
  $('#out-of-stock-modal').modal('show');
});

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test($email);
}
$('#sign-up-area2').hide(); //hide signuparea 2 header by default
$('#signup-outofstock').on('click', function(e) {
  event.preventDefault();
  // Validate the email
  var email = $("#emailAddressModal").val();
  var token = $("input[name='_token']").val();
  var checkbox = $("input[name='modalCheckbox']").val();
  var regionMail = $("#regionModalType").val();

  if (validateEmail(email)) {
    // Add loading class to the button
    $(this).addClass("loading");
    $("#oos-mail-error").hide();
    // process the form
    $.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
      url: 'https://www.lol-smurfs.com/mailinglist/region', // the url where we want to POST
      data: {
        emailAddress: email,
        _token: token,
        subscribe: checkbox,
        region: regionMail
      }, // our data object
      dataType: 'json' // what type of data do we expect back from the server
    }).done(function(data) {
      if (!data.success) {} else {
        $('#out-of-stock-modal').modal('hide');
        $('#sign-up-area').hide();
        $('#sign-up-area2').show();
        $('#signup-outofstock').removeClass('loading');
      }
    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

  } else {
    $("#oos-mail-error").html("<span class='oos-error'>Please enter a correct E-Mailadress</span>");
  }
});
// NEW
$(document).ready(function() {

  /** Set Initial Currency Value */
  window.currency = "USD";

  $('.ui.currency.dropdown').dropdown('set selected', 'USD')
  $('.ui.currency.dropdown').on('change', function(e) {
    e.preventDefault();

    var val = $(this).dropdown('get value');

    window.currency = val;

    $('.ui.currency.dropdown').api({
      // Settings
      on: 'click',
      cache: false,
      defaultData: false,
      throttle: false,
      throttleFirstRequest: false,
      interruptRequests: false,
      loadingDuration: 500,
      action: 'get conversion rate',
      method: 'POST',
      dataType: 'json',
      beforeSend: function(settings) {
        settings.data.currency = $(this).dropdown('get value');
        return settings;
      },
      beforeXHR: function(xhr) {
        xhr.setRequestHeader('X-CSRF-Token', $('meta[name=_token]').attr('content'));
        return xhr;
      },
      onResponse: function(response) {
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
      onSuccess: function(response) {
        CurrencyConverter(response);
      },
    });
    //var val = 'https://www.lol-smurfs.com' + '?cur=' + $('.ui.currency.dropdown').dropdown('get value');
    //var newUrl = 'https://www.lol-smurfs.com' + '?cur=' + val;

    //window.location.href = val;
    return false;

  });

  function CurrencyConverter(currencyData) {

    $('.currency-target').each(function() {

      var value = $(this).attr('data-usd');

      //console.log('USD Value: ' + value );
      //console.log('Conversion Rate: ' + currencyData.rate);

      var converter = value * currencyData.rate;
      var newValue = currencyData.entity + ' ' + converter.toFixed(2);
      // console.log('New Value: ' + newValue);

      $(this).html(newValue);

    });

  };
});

// NEW

var rk_widget = document.querySelector('#ruk_rs_container');
var rk_overlay = document.querySelector('#ruk_rs_widget');

function showRukReviews() {
  rk_overlay.classList.remove('ruk_hidden');
  rk_widget.style.left = ((parseInt(window.innerWidth) / 2) - 300) + "px";
  rk_widget.style.top = 100 + "px";

}

function hideRukReviews() {
  rk_overlay.classList.add('ruk_hidden');
}

// NEW

$(document).ready(function() {
  // Show Additional Skin Inputs When Selected
  $('input[name="contact-missing-skins"]').change(function() {
    if (this.checked) {
      $('div#elophant-url').velocity('transition.fadeIn').addClass('visible');
    } else {
      $('div#elophant-url').velocity('transition.fadeOut').removeClass('visible');;
    }
  });

  // EloPhant Help popup
  $('.elo-help').popup({
    hoverable: true,
    popup: $('#elo-pop'),
    on: 'hover'
  });
  $('input[name="contact-elophant-url"]').popup({
    hoverable: true,
    popup: $('#elo-pop'),
    on: 'focus'
  });
});

// NEW
$(document).ready(function() {

  /* -----------------------------
      Contact Form Script
  ----------------------------- */

  $contactContainer = $('#contact-mutator');
  $contactDimmer = $('#contact #contact-dimmer');

  contactData = {};

  /* --------------------------------------------------------------------
        Contact Type To Determine Which Email Request Filters To
                  0 - support@lol-Smurfs.com
                  1 - partners@lol-Smurfs.com
  -------------------------------------------------------------------- */
  contactData['filter'] = 2;
  var FormOneRules = {
    name: {
      identifier: "contact-name",
      inline: 'true',
      //transition: 'scale',
      on: 'change',
      delay: 200,
      rules: [{
        type: "empty"
      }]
    },
    email: {
      identifier: "contact-email",
      inline: false,
      //transition: 'scale',
      on: 'blur',
      delay: 200,
      rules: [{
        type: "empty"
      }]
    }
  };
  var FormTwoRules = {
    inquiry: {
      identifier: "contact-inquiry",
      delay: 200,
      rules: [{
        type: "empty"
      }]
    }
  };

  $("#contact-form-one").form({
    fields: {
      name: {
        identifier: "contact-name",
        inline: 'true',
        on: 'change',
        rules: [{
          type: "empty"
        }]
      },
      email: {
        identifier: "contact-email",
        inline: false,
        on: 'blur',
        rules: [{
          type: "empty"
        }, {
          type: "email"
        }]
      }
    },
    inline: true,
    on: 'blur',
    onSuccess: function(e) {
      e.preventDefault();

      // Add Form Data To ContactDate Object
      $(' input', this).each(function() {
        var inputName = $(this).attr('name');
        var inputVal = $(this).val();
        contactData[inputName] = inputVal;
      });

      step = parseInt($(this).attr('data-step'));
      next = step + 1;

      var stepOld = $('#contact-steps div.step[data-step="' + step + '"]');
      var stepNew = $('#contact-steps div.step[data-step="' + next + '"]');

      var formOld = $('#contact form.ui.form[data-step="' + step + '"]');
      var formNew = $('#contact form.ui.form[data-step="' + next + '"]');

      var newHeight = $('#contact').find('form[data-step="' + next + '"]').outerHeight();

      // Update Steps
      stepOld.removeClass('active').addClass('completed');
      stepNew.removeClass('disabled').addClass('active');

      // Update Form Display
      $contactContainer.css('min-height', newHeight + 'px');
      formOld.velocity('transition.fadeOut', {
        duration: 50,
        delay: 200,
        begin: function() {
          $contactDimmer.dimmer('show');
        },

        complete: function() {
          formNew.velocity('transition.fadeIn', {
            complete: function() {
              $contactContainer.dimmer('hide');
            }
          });
        }
      });

    }
  });

  $('#contact-form-two .ui.card').on('click', function() {

    formOld = $('#contact form.ui.form[data-step="2"]');
    formNew = $('#contact form.ui.form[data-step="3"]');

    var step = parseInt($('#contact-form-two').attr('data-step'));
    var cards = $('#contact-form-two .ui.card');
    var next = parseInt($(this).attr('data-next'));
    var value = $(this).attr('data-value');
    var text = $(this).find('.content .header').text();
    /* --------------------------------------------------------------------
        Set Contact Type To Determine Which Email Request Filters To
                    0 - support@lol-Smurfs.com
                    1 - partners@lol-Smurfs.com
    -------------------------------------------------------------------- */
    // Determine Inquiry Type
    if (value == 'general') {
      contactData['filter'] = 1;
    }
    if (value == 'scholarship') {
      contactData['filter'] = 1;
    }
    if (value == 'business') {
      contactData['filter'] = 3;
    }

    // Add Form Data To ContactDate Object
    contactData['contact-inquiry'] = text;

    // Update Steps
    // Complete Old Step
    $('#contact-steps div.step[data-step="2"]').removeClass('active').addClass('completed');
    // Active New Step
    $('#contact-steps div.step[data-step="3"]').removeClass('disabled').addClass('active');;

    formNew.addClass(value);

    newHeight = formNew.outerHeight();
    $contactContainer.css('min-height', newHeight + 'px');

    // Update Form Display
    formOld.velocity('transition.fadeOut', {
      duration: 50,
      delay: 200,
      begin: function() {
        $contactDimmer.dimmer('show');
      },

      complete: function() {
        formNew.velocity('transition.fadeIn', {
          complete: function() {

            if (value == 'general' || value == 'scholarship') {
              $('#contact-form-three .row.visible').removeClass('visible').css('display', 'none');
              $('#contact-form-three .row[data-c3-segment="' + value + '"]').addClass('visible').velocity('transition.fadeIn');
              $('#contact-submit-row').velocity('transition.fadeIn');
            }

            $contactContainer.dimmer('hide');
          }
        });
      }
    });

  });

  $('.contact-form-three-dropdown').dropdown({
    onChange: function(value, text, $selectedItem) {
      contactData['contact-details'] = text;
      $('#contact-form-three .row.visible').removeClass('visible').css('display', 'none');
      $('#contact-form-three .row[data-c3-segment="' + value + '"]').addClass('visible').velocity('transition.fadeIn');
      $('#contact-submit-row').velocity('transition.fadeIn');
    }
  });
  $('#contact-form-three .c-3.row.visible input[type="text"]').keyup(function(e) {
    e.preventDefault();
    alert('test');
  });
  $("#contact").on('click', '#contact-submit-button', function(e) {
    e.preventDefault();

    // Verify Whether Any Checkbox Are Present And Add Them To Form Data As Needed\
    var inputCheckboxes = $('#contact-form-three .c-3.row.visible input[type="checkbox"]');

    if (inputCheckboxes.length > 0) {
      inputCheckboxes.each(function() {
        if ($(this).is('checked')) {
          checkVal = 'yes';
        } else {
          checkVal = 'no';
        }
        contactData[$(this).attr('name')] = checkVal;
      });
    }
    // Custom Validate Each Input And TextArea
    var inputFields = $('#contact-form-three .c-3.row.visible input[type="text"], #contact-form-three .c-3.row.visible textarea');
    inputFields.each(function() {
      if ($(this).val() != '') {
        $(this).removeClass('invalid').addClass('valid');

        contactData[$(this).attr('name')] = $(this).val();;

      } else {
        $(this).removeClass('valid').addClass('invalid');
      }
    });

    // Iterate Valid Fields Into Variable
    var validFields = $('#contact-form-three .c-3.row.visible input[type="text"].valid, #contact-form-three .c-3.row.visible textarea.valid');

    // If Any Fields Are Not Valid, Prevent Form Submission
    if (validFields.length != inputFields.length) {
      return false;
    }

    // console.log(contactData);

    // Specific Validation Requring EloPhant URL If "I'm Missing Skins" Is Checked
    if ($('input[name="contact-missing-skins"]').is(':checked')) {

      console.log('MISSING SKINS CHECKED');
      EloPhantUrl = $('input[name="contact-elophant-url"]');
      console.log('EloPhant URL: ' + EloPhantUrl.val());

      if (!UrlIsValid(EloPhantUrl.val())) {
        EloPhantUrl.parent().addClass('error');
        return false;
      }
    };
    $.ajax({
      type: "POST",
      url: 'https://www.lol-smurfs.com/contact-submit',
      data: contactData,
      beforeSend: function() {
        $contactDimmer.dimmer('show');
      },
      success: function(returnData) {
        // Complete Final Email Step
        $('#contact-steps div.step[data-step="3"]').removeClass('active').addClass('completed');
        // Close Out Form
        $('#contact-form-three').velocity('transition.fadeOut');
        // Open Success Div
        $('#contact-complete').velocity('transition.fadeIn');
        // Remove Dimmer
        $contactDimmer.dimmer('hide');
      }
    });

  });

  function UrlIsValid(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
  }
});
// NEW

$(document).ready(function() {

  /* ---------------------------------------------------
      Scroll top
  --------------------------------------------------- */
  // browser window scroll (in pixels) after which the "back to top" link is shown
  var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1700,
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
    //grab the "back to top" link
    $back_to_top = $('.cd-top');

  //hide or show the "back to top" link
  $(window).scroll(function() {
    ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible'): $back_to_top.removeClass('cd-is-visible cd-fade-out');
    if ($(this).scrollTop() > offset_opacity) {
      $back_to_top.addClass('cd-fade-out');
    }
  });

  //smooth scroll to top
  $back_to_top.on('click', function(event) {
    event.preventDefault();
    $('body,html').animate({
      scrollTop: 0,
    }, scroll_top_duration);
  });

});
// NEW
$(document).ready(function() {

  clickHandler = 'click touch';
  ShoppingCart = $('#shopping-cart');
  // using context
  ShoppingCart.sidebar({
      scrollLock: true,
      duration: 2000,
      exclusive: true,
      transition: 'overlay',
      onVisible: function() {
        $('#mobile-menu').sidebar('hide');
        $('body').addClass('cart-visible');

        $('#optin-header').sidebar('hide');
        $('#following-menu').velocity({
          'margin-top': "0px"
        }, {
          duration: 200,
          queue: false
        });

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
    method: 'POST',
    dataType: 'json',
    beforeSend: function(settings) {
      settings.data.pid = $(this).attr('data-pid');
      settings.data.type = $(this).attr('data-productType');
      return settings;
    },
    beforeXHR: function(xhr) {
      xhr.setRequestHeader('X-CSRF-Token', $('meta[name=_token]').attr('content'));
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
    onSuccess: function(response) {
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
    method: 'POST',
    dataType: 'json',
    beforeSend: function(settings) {
      // Collecting Data To Send
      settings.data.pid = $(this).closest('tr').attr('data-pid');
      console.log($(this).closest('tr').attr('data-pid'));
      return settings;
    },
    beforeXHR: function(xhr) {
      // adjust XHR with additional headers
      xhr.setRequestHeader('X-CSRF-Token', $('meta[name=_token]').attr('content'));
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
    onSuccess: function(response) {
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
    var $par = $(this).closest('tr');
    var $num = $par.find('span');
    var qty = parseInt($num.text());
    var change = $(this).attr('data-quantity');

    if (change == 'subtract') {
      newQty = qty - 1;
    }
    if (change == 'add') {
      newQty = qty + 1;
    }

    if (newQty > 0 && newQty < 19) {
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
    method: 'POST',

    // No idea what this is actually useful for
    //data: {
    //  pid : $(this).attr('data-pid')
    //},
    dataType: 'json',

    beforeSend: function(settings) {
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
      xhr.setRequestHeader('X-CSRF-Token', $('meta[name=_token]').attr('content'));
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

    onSuccess: function(response) {
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
    var checkoutBox = $('#cart-action-box');
    var checkoutButtons = $('#cart-checkout-box');
    var quantityButtons = $('#cart-quantity-box');
    if (checkoutBox.hasClass('pending-quantity-update')) {
      return;
    }
    checkoutButtons.velocity('transition.fadeOut', {
      duration: 50,
      begin: function() {
        checkoutBox.css('min-height', checkoutBox.outerHeight());
      },
      complete: function() {
        quantityButtons.velocity('transition.fadeIn', {
          stagger: 100,
          delay: 0
        });
        checkoutBox.css('min-height', '0px')
          .removeClass('pending-checkout')
          .addClass('pending-quantity-update');
      }
    });
  }

  function PendingCheckout() {
    var checkoutBox = $('#cart-action-box');
    var checkoutButtons = $('#cart-checkout-box');
    var quantityButtons = $('#cart-quantity-box');

    if (checkoutBox.hasClass('pending-checkout')) {
      return;
    }
    quantityButtons.velocity('transition.fadeOut', {
      duration: 50,
      begin: function() {
        checkoutBox.css('min-height', checkoutBox.outerHeight());
      },
      complete: function() {
        checkoutButtons.velocity('transition.fadeIn', {
          stagger: 100,
          delay: 0
        });
        checkoutBox.css('min-height', '0px')
          .removeClass('pending-quantity-update')
          .addClass('pending-checkout');
      }
    });
  }
  /* Apply Coupon Once Length Requirement Has Been Met */
  $('input[name="coupon-code"]').on('input propertychange paste', function() {

    if ($(this).val().length > 2) {
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
    method: 'POST',
    dataType: 'json',
    beforeSend: function(settings) {
      // Collecting Data To Send
      settings.data.coupon = $('input[name="coupon-code"]').val();
      console.log($('input[name="coupon-code"]').val());
      return settings;
    },
    beforeXHR: function(xhr) {
      // adjust XHR with additional headers
      xhr.setRequestHeader('X-CSRF-Token', $('meta[name=_token]').attr('content'));
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
        }, {
          duration: 200
        });
        $csButton.velocity("reverse", {
          duration: 200
        });

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
    onSuccess: function(response) {
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
    method: 'POST',
    dataType: 'json',
    beforeSend: function(settings) {
      settings.data.coupon = $('input[name="coupon-code"]').val();
      return settings;
    },
    beforeXHR: function(xhr) {
      xhr.setRequestHeader('X-CSRF-Token', $('meta[name=_token]').attr('content'));
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
    onSuccess: function(response) {
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
    $element.velocity("reverse", {
      duration: 1000
    });
  }
});
