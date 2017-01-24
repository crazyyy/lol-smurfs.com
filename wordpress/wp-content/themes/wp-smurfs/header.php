<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png" rel="shortcut icon">

  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/js/manifest.json">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <?php wp_head(); ?>
</head>
<body <?php body_class('pushable'); ?>>

  <div id="shopping-cart" class="ui very wide right vertical dimmed sidebar menu">
    <div class="ui padded center aligned segment sc-logo">
      <img class="ui fluid centered image" src="<?php echo get_template_directory_uri(); ?>/img/Lol-Smurfs-White-473.png">
    </div>
    <div id="cart-products" class="ui basic segment">
      <table id="product-table" class="ui single line celled unstackable small table">
        <thead class="full-width">
          <tr>
            <th class="collapsing"></th>
            <th class="left aligned">Product</th>
            <th class="center aligned collapsing">Qty</th>
            <th class="right aligned collapsing">Price</th>
          </tr>
        </thead>
        <tbody></tbody>
        <tfoot class="full-width">
          <tr>
            <th colspan="2"></th>
            <th class="right aligned">
              <b>Subtotal:</b>
            </th>
            <th class="right aligned currency-target" data-entity="yes" data-usd="0.00">
              <b>$ 0.00</b>
            </th>
          </tr>
        </tfoot>
      </table>
    </div>
    <div id="checkout-coupon-wrap" class="ui basic center aligned segment">
      <div class="ui action input">
        <input type="text" name="coupon-code" placeholder="Coupon Code" value="">
        <button id="coupon-submit" class="ui disabled grey right labeled icon button">
            <i class="tags icon"></i>Apply Coupon</button>
      </div>
    </div>
    <div id="cart-action-box" class="ui basic padded center aligned segment">
      <div id="cart-quantity-box" style="display: none;">
        <button id="cart-update-quantity" class="ui orange fluid button">
            <i class="right refresh icon"></i>&nbsp; Update Cart</button>
      </div>
      <div id="cart-checkout-box" class="two ui stacking buttons">
        <button id="continue-shopping" class="ui gray button">Continue Shopping</button>
        <button id="checkout" class="ui orange button">
            <i class="right cart icon"></i>&nbsp; Checkout</button>
      </div>
    </div>

  </div>


  <div id="menu-sticky-top">
    <div class="ui container">
      <div class="ui relaxed grid">
        <div class="two column row">
          <div class="left floated column" style="padding-left: 10%; position: relative; right: 7%;">
            <a class="top-banner-social-icon" href="https://www.facebook.com/LolSmurfsCom" target="_blank" data-social-media="facebook">
              <i class="large facebook icon"></i>
            </a>
            <a class="top-banner-social-icon" href="https://twitter.com/Lol_Smurfs" target="_blank" data-social-media="twitter">
              <i class="large twitter icon"></i>
            </a>
            <a class="top-banner-social-icon" href="https://www.instagram.com/lolsmurfscom/" target="_blank" data-social-media="instagram">
              <i class="large instagram icon"></i>
            </a>
          </div>
          <div class="right floated column">
            <ul class="right floated column">
              <li><a href="" class="top-banner-link item scrollto">name</a></li>
              <li><a href="" class="top-banner-link item scrollto">name</a></li>
              <li><a href="" class="top-banner-link item scrollto">name</a></li>
              <li><a href="" class="top-banner-link item scrollto">name</a></li>
              <li><a href="" class="top-banner-link item scrollto">name</a></li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="banner-menu" class="ui fixed secondary inverted pointing menu" style="margin-top: 40px; padding-bottom: 2em; background-color: rgba(27, 28, 29, 0);">
    <div class="ui container">
      <a class="ui middle aligned item" href="http://demo3.saitobaza.ru">
        <img src="<?php echo get_template_directory_uri(); ?>/img/Lol-Smurfs-Icon-Black.png">
      </a>
      <a class="toc item">
        <i class="sidebar icon"></i>
      </a>
      <a class="item scrollto" href="http://demo3.saitobaza.ru#pricing-button-box" data-scrollto="#pricing-button-box">Smurf Accounts</a>
      <a class="item scrollto region-link" href="http://demo3.saitobaza.ru#pricing-button-box" data-scrollto="#pricing-button-box " data-package="NA" data-packagetitle="North America">North America</a>
      <a class="item scrollto region-link" href="http://demo3.saitobaza.ru#pricing-button-box" data-scrollto="#pricing-button-box" data-package="EUW" data-packagetitle="Europe West">Europe West</a>
      <a class="item scrollto region-link" href="http://demo3.saitobaza.ru#pricing-button-box" data-scrollto="#pricing-button-box" data-package="EUNE" data-packagetitle="Europe Nordic & East">Europe NE</a>
      <a class="item scrollto region-link" href="http://demo3.saitobaza.ru#pricing-button-box" data-scrollto="#pricing-button-box" data-package="BR" data-packagetitle="Brazil">Brazil</a>
      <a class="item scrollto region-link" href="http://demo3.saitobaza.ru#pricing-button-box" data-scrollto="#pricing-button-box" data-package="RU" data-packagetitle="Russia">Russia</a>
      <a class="item scrollto region-link" href="http://demo3.saitobaza.ru#pricing-button-box" data-scrollto="#pricing-button-box" data-package="PBE" data-packagetitle="Public Beta Environment">PBE</a>
      <div class="right center aligned item open-cart-box">
        <div class="ui center aligned button open-cart" tabindex="0">
          <div class="ui center aligned content">
            <i class="shop icon"></i>
            <div class="floating ui blue label cart-quantity-label">0</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Sidebar Menu -->
  <div id="mobile-menu" class="ui vertical dummed sidebar menu left">
    <div style="padding: 20px 20px 0;">
      <img class="ui centered image" src="<?php echo get_template_directory_uri(); ?>/img/Lol-Smurfs-White.png" style="margin-bottom:1rem;">
    </div>


    <div class="ui bottom aligned item open-cart-box">
      <div class="ui center aligned button open-cart" tabindex="0">
        <div class="ui center aligned content">Shopping Cart
          <div class="floating ui blue label cart-quantity-label">0</div>
        </div>
      </div>
    </div>
    <a class="item scrollto" href="http://demo3.saitobaza.ru#why-us" data-scrollto="#why-us">How It Works</a>
    <a class="item scrollto" href="http://demo3.saitobaza.ru#about" data-scrollto="#about">About</a>
    <a class="item scrollto" href="http://demo3.saitobaza.ru#pricing" data-scrollto="#pricing">Reviews</a>
    <a class="item scrollto" href="http://demo3.saitobaza.ru#faq" data-scrollto="#faq">Smurf Accounts</a>
    <a class="item" href="http://demo3.saitobaza.ru/blog">FAQ</a>
    <a class="item scrollto" href="http://demo3.saitobaza.ru#reviews" data-scrollto="#reviews">League Tips</a>
    <a class="item scrollto" href="http://demo3.saitobaza.ru#contact" data-scrollto="#contact">Contact</a>
  </div>
  <div id="cm-optin-modal" class="ui small modal">
    <h3 class="header">
      <img class="ui mini left floated image" src="<?php echo get_template_directory_uri(); ?>/img/Lol-Smurfs-Icon-White.png">LoL-Smurfs Mailing List
      <div class="ui right floated mini cancel icon button">
        <i class="close icon"></i>
      </div>
    </h3>
    <div class="content">
      <div class="ui grid">
        <div class="row">
          <div class="eight wide computer sixteen wide mobile column">
            <div class="ui basic segment" style="padding: 0 1rem;">
              <div class="ui message">
                <div class="ui blue header">Get Exclusive Access To...</div>
                <ul class="blue list">
                  <li>Subscriber only discounts</li>
                  <li>Subscriber only giveaways</li>
                  <li>Keep up with the latest LoL news</li>
                  <li>Subscriber only giveaways competitions</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="eight wide computer sixteen wide mobile column">
            <div class="ui basic segment" style="padding: 0 1rem;">
              <form id="cm-optin-form" class="ui form">
                <div class="field">
                  <div class="ui input">
                    <input type="text" name="first-name" placeholder="First Name">
                  </div>
                </div>
                <div class="field">
                  <div class="ui input">
                    <input type="text" name="last-name" placeholder="Last Name">
                  </div>
                </div>
                <div class="field">
                  <div class="ui input">
                    <input type="text" name="email-address" placeholder="Email Address">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="cm-optin-modal-result" class="ui center aligned basic segment">
        <h2 class="ui green icon header">
          <i class="check circle icon"></i>
          <div class="content">Thank You!
            <div class="sub header">You are now subscribed to our mailing list.</div>
          </div>
        </h2>
      </div>
    </div>
    <div class="actions">
      <div id="cm-optin-submit" class="ui disabled primary approve button">Sign Up</div>
    </div>
  </div>


