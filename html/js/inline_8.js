

$(document).ready(function() {


/* Define API endpoints once globally */
$.fn.api.settings.api = {
  'echo test'         : '/echo',

  // Product API
    'add product'       : '/store/cart-add-rg',
    'remove product'    : '/store/cart-remove',
    'update quantity'   : '/store/update-quantity',

    /** Currency Api */
      'get conversion rate' : '/store/convert-currency',

  // Coupon API
    'update coupon'     : '/store/cart-apply-coupon',
    'remove coupon'     : '/store/cart-remove-coupon',

  // Mailing List
    'subscribe'         : '/mailinglist/subscribe'


};



});


