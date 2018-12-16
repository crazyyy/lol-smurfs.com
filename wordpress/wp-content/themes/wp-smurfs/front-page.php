<?php /* Template Name: Home Page Template */ get_header(); ?>

  <div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment">
      <div class="ui center aligned container">
        <h1 class="ui inverted header"><?php the_field('first_block_title', 34); ?></h1>
        <h2><?php the_field('first_block_description', 34); ?>
          <div class="ui hidden divider"></div>
        </h2>
        <div class="ui huge orange button scrollto" data-scrollto="#pricing"><?php the_field('first_block_left_button', 34); ?></div>
        <div class="ui huge blue button scrollto" data-scrollto="#why-us"><?php the_field('first_block_right_button', 34); ?></div>
      </div>
    </div>

    <div id="offer" class="ui vertical stripe segment">
      <div class="ui middle aligned stackable grid container">
        <div class="row">
          <div class="four wide column"></div>
          <div class="eight wide center aligned column">
            <h3 class="ui center aligned header">Discounts On All LoL Accounts &amp; LoL Smurfs!</h3>
            <p class="center aligned">Use coupon <a class="ui big blue center aligned label" href="https://www.lol-smurfs.com/#pricing" style="cursor: pointer; margin: 0 .25rem;">SEASON7 </a> for a discount on all our LoL Smurfs!</p>
          </div>
        </div>
      </div>
    </div>

    <div id="out-of-stock-modal" class="ui modal">
      <img class="oos-globe" src="<?php echo get_template_directory_uri(); ?>/img/globe.png">
      <i class="close icon"></i>
      <div class="content">
        <div class="description">
          <h2 class="ui oos-modal-header">Get Notified When Your Region is in Stock</h2>
          <p class="oos-modal-p">You can also sign up to our newsletter and get acces to free league of legends tips, tricks, resources, smurf discounts and the chance to win RP and more!</p>
          <form class="ui form">
            <div class="row">
              <div id="oos-mail-error"></div>
              <input class="oos-textbox" id="emailAddressModal" name="emailAddressModal" placeholder="Enter your email address..." type="text">
            </div>
            <div class="row">
              <input type="hidden" id="regionModalType" name="regionModal" value="">
              <div class="ui checkbox oos-checkbox">
                <input tabindex="0" class="hidden" name="modalCheckbox" type="checkbox">
                <label>Sign Up To The Newsletter</label>
              </div>
            </div>
          </form>
          <div class="ui huge blue button oos-modal-button" id="signup-outofstock" style="background-color: #2185d0;">Sign Up</div>
          <p class="oos-modal-nospam">We respect your privacy and will not pass your details onto third parties or spam your inbox.</p>
        </div>
      </div>
    </div>


    <div id="reviews" class="ui blue inverted basic quote segment wp-marker">
      <h2 class="ui center aligned large dividing header review-header"><?php the_field('reviews_block_title'); ?></h2>
    </div>
    <div class="ui vertical stripe quote segment">
      <div class="ui equal width stackable internally celled grid">
        <div class="center aligned row">
          <div id="customer-reviews-one" class="column">
            <?php if( have_rows('reviews') ): while ( have_rows('reviews') ) : the_row(); ?>
              <div class="customer-review ">
                <h3><?php the_sub_field('reviews_body'); ?></h3>
                <p class="review-rating">
                <?php
                  $ratinger =  get_sub_field('reviews_rating');
                  $current_rating = $ratinger['value'];
                  $current_rating = substr($current_rating, 0, 1);
                  $current_rating = intval($current_rating);
                    for($i = 1; $i <= $current_rating; $i++) {
                  ?>
                  <i class="large yellow star icon"></i>
                  <?php } ?>
                </p>
              </div>
            <?php endwhile; endif; ?>
          </div>
          <div id="customer-reviews-two" class="column">
            <?php if( have_rows('reviews') ): while ( have_rows('reviews') ) : the_row(); ?>
              <div class="customer-review ">
                <h3><?php the_sub_field('reviews_body'); ?></h3>
                <p class="review-rating">
                <?php
                  $ratinger =  get_sub_field('reviews_rating');
                  $current_rating = $ratinger['value'];
                  $current_rating = substr($current_rating, 0, 1);
                  $current_rating = intval($current_rating);
                    for($i = 1; $i <= $current_rating; $i++) {
                  ?>
                  <i class="large yellow star icon"></i>
                  <?php } ?>
                </p>
              </div>
            <?php endwhile; endif; ?>
          </div>

        </div>
        <img id="review-logo" style="background: #ffffff;" href="#" src="<?php echo get_template_directory_uri(); ?>/img/review-co-uk.png">
      </div>
    </div>
    <div class="ui hidden review-logo divider"></div>
    <div class="ui hidden review-logo divider"></div>


<div class="ui basic center aligned segment">


      <style>
        .ui.currency.dropdown, .ui.currency.dropdown .ui.selection.dropdown {
/*            border: 1px solid #fbc02d;*/
            border-radius: 0;
            font-size: 1.25em;
            min-width: 8em!important;
        }
        .ui.currency.dropdown .ui.selection.dropdown:hover, .ui.currency.dropdown .ui.selection.dropdown:focus {
/*            border: 1px solid!important;
            border-color: #fbc02d!important;
            box-shadow: none;*/
        }
        .ui.selection.active.dropdown, .ui.selection.active.dropdown .menu {
/*            border: 1px solid!important;
            border-color: #fbc02d!important;*/
        }
        .ui.currency.dropdown, .ui.currency.dropdown * {
            background: #f7f7f7!important;
        }
        .ui.selection.visible.dropdown>.text:not(.default),
        .ui.currency.dropdown .menu .selected.item,
        .ui.currency.selected,
        .ui.currency.dropdown .menu>.item:hover {
/*            color: rgb(251, 192, 45)!important;*/
        }
      </style>

      <div class="ui currency dropdown selection" tabindex="0"><select>
                  <option value="AUD">AUD | $</option>
                  <option value="CNY">CNY | ¥</option>
                  <option value="EUR">EUR | €</option>
                  <option value="GBP">GBP | £</option>
                  <option value="USD">USD | $</option>
              </select><i class="dropdown icon"></i><div class="text">USD | $</div><div class="menu" tabindex="-1"><div class="item" data-value="AUD">AUD | $</div><div class="item" data-value="CNY">CNY | ¥</div><div class="item" data-value="EUR">EUR | €</div><div class="item" data-value="GBP">GBP | £</div><div class="item active selected" data-value="USD">USD | $</div></div></div>
    </div>


<div id="product-container" class="ui basic blurring segment pricing-dimmer dimmable" style="min-height: 955px;">


                  <div id="NA-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">North America Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                                                                                                                                                                                                          <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 16+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 16-30 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>16-30 Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="31.99">
                          $31.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="56f440f212101800038b469f" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="27.99">
                            $27.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                                                                                                                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 40+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 40-50 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>40-50 champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="44.99">
                          $44.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="56fd4687121018ab0e8b4684" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="39.99">
                            $39.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                                                                          <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 70+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 70 champions." data-variation="inverted" data-position="right center"></i>70+ champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="84.99">
                          $84.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57e42a39711f71d49a8b987c" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="79.99">
                            $79.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 70+ and 6k IP
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 70 champions and at least 6,000IP" data-variation="inverted" data-position="right center"></i>70+ Champions and 6k IP</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="94.99">
                          $94.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="58866f370e30d6129d3e275b" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="89.99">
                            $89.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                        </div>
        </div>
                    <div id="EUW-box" class="ui container package-box" style="opacity: 1; display: block; transform: translateX(0px);">
                    <h3 class="ui center aligned header package-header">Europe West Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                    <div class="thirteen wide mobile six wide tablet four wide computer column package" style="opacity: 1; display: block;">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Starter - 20k+ IP
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content">20,000+ IP </div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="34.99">
                          $34.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="560dba399464b5c71417e2f1" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="27.99">
                            $27.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                  <div class="thirteen wide mobile six wide tablet four wide computer column package" style="opacity: 1; display: block;">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Premium 30k+ IP
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content">30,000 IP+ </div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="45.99">
                          $45.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="560dba949464b5c71417e2f2" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="34.99">
                            $34.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                                                <div class="thirteen wide mobile six wide tablet four wide computer column package" style="opacity: 1; display: block;">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 16+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 16-30 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>16-30 Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="37.99">
                          $37.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5776cf25711f71a8768b4bd8" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="34.99">
                            $34.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package" style="opacity: 1; display: block;">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 30+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 30-40 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>30-40 champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="45.99">
                          $45.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5776cf5b711f7128778b4bba" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="39.99">
                            $39.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                  <div class="thirteen wide mobile six wide tablet four wide computer column package" style="opacity: 1; display: block;">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 40+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 40 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>40+ champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="54.99">
                          $54.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5776d07a711f71fb758b4c4e" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="49.99">
                            $49.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                                                                                                                                              </div>
        </div>
                    <div id="EUNE-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">Europe Nordic &amp; East Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                                              <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 16-30
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 16-30 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>16-30 Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="39.99">
                          $39.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5757198e121018ff448bd4e0" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="35.99">
                            $35.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                  <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 30+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 30-40 champions and random amount of IP.
" data-variation="inverted" data-position="right center"></i>30-40 champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="44.99">
                          $44.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57684d1a12101847658b4f8c" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="39.99">
                            $39.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                  <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 40+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 40 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>40+ champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="54.99">
                          $54.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57dd669d711f712d9b8b7529" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="44.99">
                            $44.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                      <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 70+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 70 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>70+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="89.99">
                          $89.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57dd8624711f71339b8b761f" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="79.99">
                            $79.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                  <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 80+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 80 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>80+ champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="92.99">
                          $92.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57e01398cc50fe2934a89859" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="89.99">
                            $89.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                  </div>
        </div>
                    <div id="PBE-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">Public Beta Environment Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                    <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        PBE Account
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content">Level 30</div></div><div class="item"><div class="content">Unlimited IP and RP</div></div><div class="item"><div class="content">All Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="35.99">
                          $35.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="560dbdde9464b5c71417e30a" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="19.99">
                            $19.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                                      </div>
        </div>
                    <div id="OCE-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">Oceania Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                                                                                                                                                                                <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 70+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 70 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>70+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="89.99">
                          $89.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="58040073711f7169658b5903" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="79.99">
                            $79.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                      <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 100+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 100 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>100+ champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="119.99">
                          $119.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5804010a711f7143038b6dde" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="109.99">
                            $109.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                  </div>
        </div>
                    <div id="BR-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">Brazil Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                                              <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Premium - 30k+ IP
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content">30,000+ IP</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="45.99">
                          $45.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="560dbda99464b5c71417e306" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="36.99">
                            $36.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 16+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 16-30 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>16-30 Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="37.99">
                          $37.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="581db46c711f712ae98b5abe" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="34.99">
                            $34.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                  <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 30+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 30 champions and random amounts of IP." data-variation="inverted" data-position="right center"></i>30+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="49.99">
                          $49.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="560dbd669464b5c71417e305" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="39.99">
                            $39.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 40+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 40 champions and random amounts of IP." data-variation="inverted" data-position="right center"></i>40+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="59.99">
                          $59.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="56e2f65b7dc2940d608b577f" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="49.99">
                            $49.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                  <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 50+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 50 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>50+ champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="69.99">
                          $69.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="581db49b711f71c4e88b5ab1" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="59.99">
                            $59.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                  <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 70+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 70 champions and random amounts of IP." data-variation="inverted" data-position="right center"></i>70+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="89.99">
                          $89.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="581db614711f7129e98b5aab" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="79.99">
                            $79.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                      <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 100+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 100 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>100+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="149.99">
                          $149.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5880a8190e30d613ba083317" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="119.99">
                            $119.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                              </div>
        </div>
                    <div id="TR-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">Turkey Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                    <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 16+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 16-30 champions." data-variation="inverted" data-position="right center"></i>16-30 Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="35.99">
                          $35.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57570f8812101892448bf962" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="29.99">
                            $29.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                                                                                                                              <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 60+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 60 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>60+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="79.99">
                          $79.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="588f73960e30d6133f677c75" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="69.99">
                            $69.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                        </div>
        </div>
                    <div id="LAN-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">Latin America North Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                                                                                                                                                                                                          <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 60+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 60 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>60+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="79.99">
                          $79.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="588f743c0e30d612b37d9e51" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="69.99">
                            $69.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                        </div>
        </div>
                    <div id="LAS-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">Latin America South Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                    <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 16+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 16-30 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>16-30 CHAMPIONS</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="34.99">
                          $34.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5888fa080e30d613ba0857e9" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="29.99">
                            $29.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 30+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 40 Champions and random amount of IP." data-variation="inverted" data-position="right center"></i>40+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="44.99">
                          $44.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5892559d0e30d612b03ffa35" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="39.99">
                            $39.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 40+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 40 Champions and random amount of IP." data-variation="inverted" data-position="right center"></i>40+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="54.99">
                          $54.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5888f9220e30d6129d3e3286" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="49.99">
                            $49.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 80+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 80 Champions and random amount of IP." data-variation="inverted" data-position="right center"></i>80+ champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="109.99">
                          $109.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="5888fdcf0e30d612b37d81b3" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="89.99">
                            $89.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 100+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes at least 100 Champions and random amount of IP." data-variation="inverted" data-position="right center"></i>100+ Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>3+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="139.99">
                          $139.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="588900a60e30d612b2145046" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="119.99">
                            $119.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                              </div>
        </div>
                    <div id="RU-box" class="ui container package-box">
                    <h3 class="ui center aligned header package-header">Russia Unranked LoL Accounts</h3>
          <div class="ui equal height centered grid">


                                                                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Premium - 30k+ IP
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content">30,000+ IP</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="45.99">
                          $45.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="584d7cf30e30d672d064e6bc" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="36.99">
                            $36.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 16+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 16-30 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>16-30 Champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>1+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="38.99">
                          $38.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57dc2385cc50fe27402546fa" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="29.99">
                            $29.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                                                                                                                                                                                              <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 30+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 30-40 champions and random amount of IP." data-variation="inverted" data-position="right center"></i>30-40 champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="43.99">
                          $43.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57dc23b3cc50fe2740254712" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="39.99">
                            $39.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                        <div class="thirteen wide mobile six wide tablet four wide computer column package">
                  <div class="ui raised segment product-box">
                    <div class="ui vertical segment">
                      <h2 class="ui center aligned header">
                        Special 40+
                      </h2>
                    </div>
                    <div class="ui vertical segment product-description-box" style="min-height: 178px;">
                      <div class="content"><div class="ui items"><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Each account includes 40-50 champions." data-variation="inverted" data-position="right center"></i>40-50 champions</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Chance for a rare skin:
UFO Corki, King Rammus, Championship Riven, Judgement Kayle and more!" data-variation="inverted" data-position="right center"></i>2+ Skins</div></div><div class="item"><div class="content">Level 30 / Unranked</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="The following will be provided: Username, Password, Email, Date of Birth, IP address, Creation Date." data-variation="inverted" data-position="right center"></i>Recovery details inc.</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Your account details will be delivered to you instantly via email. Our automated systems work 24/7, 365 days a year." data-variation="inverted" data-position="right center"></i>Instant Delivery</div></div><div class="item"><div class="content"><i class="grey help right floated icon" data-content="Our lifetime guarantee provides you with a new League of Legends account, if your account is banned through any defect of our own." data-variation="inverted" data-position="right center"></i>Lifetime Guarantee</div></div></div></div>
                    </div>
                    <div class="extra center aligned content">

                        <div class="currency-target" style="margin-top: 5px; font-size: 1.3rem; color: grey;text-decoration: line-through; text-align: center;" data-entity="yes" data-usd="59.99">
                          $59.99
                        </div>

                      <div class="ui basic center aligned segment" style="margin-top: 0;">
                        <div class="ui large fluid labeled button" data-add-to-cart="true" tabindex="0" data-pid="57dc23b8cc50fe2740254715" data-producttype="rg">
                          <div class="ui large fluid orange button">
                            <i class="cart icon"></i> Buy Now
                          </div>
                          <a class="ui basic orange left pointing label currency-target" style="white-space: nowrap;" data-entity="no" data-usd="49.99">
                            $49.99
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                                                        </div>
        </div>






    <div class="ui dimmer transition hidden">
      <div class="content">
        <div class="center">
          <h2 class="ui inverted icon header">
            <div class="ui indeterminate text loader">Loading <span id="price-dimmer-package-text">Europe West</span> Accounts</div>
          </h2>
        </div>
      </div>
    </div>

    <div class="no-stock-content" style="display: none;">
      <h3 style="margin-bottom: 40px" id="no-stock-content-header" class="ui center aligned header package-header">Unranked LoL Accounts</h3>
      <div class="ui two column centered stackable grid">
        <div class="one wide column">
        </div>
          <div class="three wide column center aligned">
            <img style="height: 175px; margin-top: 10px;" src="/lol-smurfs/images/stock/outofstock-amumu.png" alt="out of stock amumu">
          </div>
          <div class="eleven wide column">
            <h2 style="color: #2185d0; font-size: 35px;">Out of Stock</h2>
            <h3>Just like a good Jungler, these accounts are currently unavailable.</h3>
            <p>Want to be notified when this region is back in stock? Sign up below to receive an email when we restock.</p>
            <div id="sign-up-area">
              <div id="out-of-stock-button" class="ui huge blue button" style="background-color: #2185d0;">Notify Me</div>
            </div>
            <div id="sign-up-area2" style="display: none;">
              <h3 class="oos-thank-you">Thank you! We will notify you soon!</h3>
            </div>
          </div>
      </div>
    </div>
  </div>



    <div id="review-supplement" class="ui basic segment">
      <div class="ui container">
        <div class="ui basic padded segment">
          <div class="ui center aligned text container">
            <i>
              <div id="rs_container" itemscope="" itemtype="http://schema.org/LocalBusiness">
                <p id="ruk_main">
                  <?php the_field('reviews_rating_descr_one'); ?>
                </p>

              </div>
              </i>
            </div>
            <div class="ui hidden divider"></div>
            <div class="ui text container">
              <div class="ui center aligned basic segment nopad">
                <?php the_field('reviews_rating_descr_two'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  <div id="why-us" class="ui basic segment wp-marker" data-sector="why-us">
    <div id="why-us-bg">
      <svg>
          <defs>
            <pattern id="dottedPattern" x="0" y="0" width="2" height="2" patternunits="userSpaceOnUse">
              <circle cx=".5" cy=".5" r="1" fill="#f7f7f7" />
            </pattern>
          </defs>
          <rect x="0" y="0" width="100%" height="100%" stroke="#f7f7f7" stroke-width="0"
          fill="url(#dottedPattern)" />
        </svg>
    </div>
    <div class="ui container">
      <div class="ui basic padded segment">
        <h2 class="ui center aligned header"><?php the_field('why_block_title'); ?></h2>
        <div class="ui stackable grid">
          <div class="doubling stackable four column row">

            <?php if( have_rows('why_block_blocks') ): while ( have_rows('why_block_blocks') ) : the_row(); ?>
              <div class="four wide center aligned column">
                <div class="ui fluid card" data-hidden-on-load="true">
                  <div class="center aligned image">
                    <i class="huge blue <?php the_sub_field('why_block_subblock_ico'); ?> icon"></i>
                  </div>
                  <div class="content">
                    <div class="header"><?php the_sub_field('why_block_subblock_title'); ?></div>
                    <div class="description">
                      <p><?php the_sub_field('why_block_subblock_description'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; endif; ?>

          </div>
        </div>
      </div>
      <div class="ui hidden divider"></div>

    </div>
  </div>
  <div id="about" class="ui basic segment wp-marker" data-sector="about">
    <h2 class="ui center aligned large header about-header"><?php the_field('about_block_title'); ?></h2>
    <div class="ui container centered grid">
      <div class="ui basic padded segment">
        <div class="ui grid centered">
          <div class="row">
            <div class="eight wide flex-mid column">
              <h3 class="ui center aligned header"><?php the_field('about_block_subtitle'); ?></h3>
              <div class="ui center aligned basic segment nopad"><?php the_field('about_block_description'); ?></div>
            </div>
          </div>
          <div class="row">
            <div class="eight wide flex-mid column centered">
              <div class="ui large list center aligned grid">

                <?php if( have_rows('about_block_repeater') ): while ( have_rows('about_block_repeater') ) : the_row(); ?>
                  <div class="item">
                    <i class="blue star icon"></i>
                    <div class="content">
                      <div class="header"><?php the_sub_field('about_block_repeater_item'); ?></div>
                    </div>
                    <i class="blue star icon star-right-side"></i>
                  </div>
                <?php endwhile; endif; ?>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="ui huge orange button scrollto" data-scrollto="#pricing"><?php the_field('about_block_button'); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="faq" class="basic ui padded segment wp-marker">
    <h2 class="ui center aligned faq header"><?php the_field('faq_block_title'); ?></h2>
    <div class="ui container">
      <?php if( have_rows('faq_block_faq') ): while ( have_rows('faq_block_faq') ) : the_row(); ?>
      <div class="ui header"><?php the_sub_field('faq_block_heading'); ?></div>
      <div class="ui styled fluid accordion">
        <?php if( have_rows('faq_block_faq_items') ): while ( have_rows('faq_block_faq_items') ) : the_row(); ?>
          <div class="title">
            <i class="dropdown icon"></i><?php the_sub_field('faq_block_faq_title'); ?>
          </div>
          <div class="content">
            <p class="transition active"><?php the_sub_field('faq_block_faq_content'); ?></p>
          </div>
        <?php endwhile; endif; ?>
      </div>
    <?php endwhile; endif; ?>
    </div>
    <div id="contact" class="ui basic segment wp-marker" style="margin-top: 0;">
      <h2 class="ui center aligned contact header">
        <div id="contact-bg">
          <svg>
              <defs>
                <pattern id="dottedPattern2" x="0" y="0" width="4" height="4" patternunits="userSpaceOnUse">
                  <circle cx="1" cy="1" r="1" fill="#f8f8f8" />
                </pattern>
              </defs>
              <rect x="0" y="0" width="100%" height="100%" stroke="#f7f7f7" stroke-width="0"
              fill="url(#dottedPattern2)" />
            </svg>
        </div>Contact LoL-Smurfs</h2>
      <div class="ui container">
        <div id="contact-steps" class="ui three ordered steps">
          <div class="active step" data-step="1">
            <div class="content">
              <div class="title">Contact Information</div>
              <div class="description">Your name and email</div>
            </div>
          </div>
          <div class="disabled step" data-step="2">
            <div class="content">
              <div class="title">Inquiry</div>
              <div class="description">Reason for your inquiry</div>
            </div>
          </div>
          <div class="disabled step" data-step="3">
            <div class="content">
              <div class="title">Details</div>
              <div class="description">Verify everything is correct</div>
            </div>
          </div>
        </div>
      </div>
      <div id="contact-mutator" class="ui padded dimmable blurring clearing segment">
        <form id="contact-form-one" class="ui large form container" data-step="1">
          <div class="ui centered grid">
            <div class="row">
              <div class="thirteen wide mobile six wide tablet six wide computer column">
                <div class="center aligned fluid field">
                  <label>Name</label>
                  <input type="text" name="contact-name" placeholder="Your Name">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="thirteen wide mobile six wide tablet six wide computer column">
                <div class="center aligned fluid field">
                  <label>Email</label>
                  <input type="text" name="contact-email" placeholder="Email Address">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="thirteen wide mobile six wide tablet six wide computer column">
                <div class="ui basic clearing segment" style="padding-left: 0; padding-right: 0">
                  <div class="ui fluid blue submit button" tabindex="0" data-step="1" data-action="next">Next</div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <form id="contact-form-two" class="ui large form container" data-step="2" style="display:none;">
          <div class="ui centered equal height grid">
            <br>
            <h2 class="ui center aligned header">Select One</h2>
            <div class="row">
              <div class="thirteen wide mobile five wide tablet four wide computer column">
                <div class="ui card z-shadow-2" data-value="general" data-next="3">
                  <div class="ui center aligned image">
                    <i class="huge help icon"></i>
                  </div>
                  <div class="content">
                    <div class="center aligned header">General Questions</div>
                    <div class="description">Pre-purchase questions that are not covered in our
                      <a class="scrollto" href="<?php echo home_url(); ?>#faq" data-scrollto="#faq">FAQ</a>.</div>
                  </div>
                </div>
              </div>
              <div class="thirteen wide mobile five wide tablet four wide computer column">
                <div class="ui card z-shadow-2" data-value="account" data-next="3">
                  <div class="ui center aligned image">
                    <i class="huge game icon"></i>
                  </div>
                  <div class="content">
                    <div class="center aligned header">Account Inquiry</div>
                    <div class="description">Questions on accounts that have already been purchased.</div>
                  </div>
                </div>
              </div>
              <div class="thirteen wide mobile five wide tablet four wide computer column">
                <div class="ui card z-shadow-2" data-value="scholarship" data-next="3">
                  <div class="ui center aligned image">
                    <i class="huge student icon"></i>
                  </div>
                  <div class="content">
                    <div class="center aligned header">Scholarship</div>
                    <div class="description">Details and Applications for our Scholarship Program.</div>
                  </div>
                </div>
              </div>
              <div class="thirteen wide mobile five wide tablet four wide computer column">
                <div class="ui card z-shadow-2" data-value="business" data-next="3">
                  <div class="ui center aligned image">
                    <i class="huge university icon"></i>
                  </div>
                  <div class="content">
                    <div class="center aligned header">Business Inquiry</div>
                    <div class="description">Bulk purchases, business ventures, affiliate requests</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <form id="contact-form-three" class="ui large form container" data-step="3" style="display:none;">
          <div class="ui centered grid">
            <div class="center aligned row" data-row="general" style="display: none;">
              <div class="thirteen wide mobile six wide tablet six wide computer column">
                <h3 class="ui center aligned header">General Inquiry</h3>
              </div>
            </div>
            <div class="center aligned row" data-row="account" style="display: none;">
              <div class="thirteen wide mobile eight wide tablet eight wide computer column">
                <select class="ui fluid dropdown contact-form-three-dropdown">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="a-1">I didn't receive my account</option>
                    <option value="a-2">I can't access my account</option>
                    <option value="a-3">My account is missing ip/rp/skins/champions</option>
                    <option value="a-4">My account is banned</option>
                    <option value="a-5">Other question...</option>
                  </select>
              </div>
            </div>
            <div class="center aligned row" data-row="scholarship" style="display: none;">
              <div class="thirteen wide mobile six wide tablet six wide computer column">
                <h3 class="ui center aligned header">Scholarship</h3>
              </div>
            </div>
            <div class="center aligned row" data-row="business" style="display: none;">
              <div class="thirteen wide mobile eight wide tablet eight wide computer column">
                <select class="ui fluid dropdown contact-form-three-dropdown">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="b-1">Partnerships</option>
                    <option value="b-1">Advertising</option>
                    <option value="b-1">Bulk Purchases</option>
                    <option value="b-1">Other question...</option>
                  </select>
              </div>
            </div>
            <div class="ui divider"></div>
            <div class="c-3 row" data-row="general" data-c3-segment="general" style="display: none;">
              <div class="thirteen wide mobile ten wide tablet ten wide computer column">
                <div class="field">
                  <label>Your question</label>
                  <textarea name="contact-question"></textarea>
                </div>
              </div>
            </div>
            <div class="c-3 row" data-c3-segment="a-1" style="display: none;">
              <div class="thirteen wide mobile eight wide tablet eight wide computer column">
                <div class="field">
                  <label>Paypal Email Address</label>
                  <input type="text" name="contact-paypal-email">
                </div>
                <div class="field">
                  <label>Your question</label>
                  <textarea name="contact-question"></textarea>
                </div>
              </div>
            </div>
            <div class="c-3 row" data-c3-segment="a-2" style="display: none;">
              <div class="thirteen wide mobile eight wide tablet eight wide computer column">
                <div class="ui basic segment">
                  <div class="field">
                    <div class="ui toggle checkbox">
                      <input type="checkbox" name="contact-changed-password" tabindex="0" class="hidden">
                      <label>Did you change the password upon purchase?</label>
                    </div>
                  </div>
                </div>
                <div class="ui basic segment">
                  <div class="field">
                    <div class="ui toggle checkbox">
                      <input type="checkbox" name="contact-verified-email" tabindex="0" class="hidden">
                      <label>Did you change and verify the email upon purchase?</label>
                    </div>
                  </div>
                </div>
                <div class="ui basic segment">
                  <div class="field">
                    <div class="ui toggle checkbox">
                      <input type="checkbox" name="contact-correct-region" tabindex="0" class="hidden">
                      <label>Are you accessing the account in the correct region?</label>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Paypal Email Address</label>
                  <input type="text" name="contact-paypal-email">
                </div>
                <div class="field">
                  <label>Your question</label>
                  <textarea name="contact-question"></textarea>
                </div>
              </div>
            </div>
            <div class="c-3 row" data-c3-segment="a-3" style="display: none;">
              <div class="thirteen wide mobile eight wide tablet eight wide computer column">
                <div class="field">
                  <label>
                      <b>Please select what your account is missing</b>
                    </label>
                </div>
                <div class="inline fields">
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="contact-missing-ip" tabindex="0" class="hidden">
                      <label>IP</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="contact-missing-rp" tabindex="0" class="hidden">
                      <label>RP</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="contact-missing-champions" tabindex="0" class="hidden">
                      <label>Champions</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="contact-missing-skins" tabindex="0" class="hidden">
                      <label>Skins</label>
                    </div>
                  </div>
                </div>

                <div id="elophant-url" class="field" style="display:none;">
                  <label>
                      <i class="ui orange circle warning icon elo-help"></i>EloPhant URL</label>
                  <input type="text" name="contact-elophant-url">
                  <div id="elo-pop" class="ui wide popup top right transition hidden">
                    <div class="ui center aligned grid">
                      <div class="column">
                        <h4 class="ui header">If your account is missing skins the account's EloPhant url is required</h4>
                        <p>If you don't know how to use Elophant client, follow
                          <b>
                              <a href="http://www.elophant.com/league-of-legends/champion-select/help"
                              target="_blank">this guide</a>
                            </b>to get set up.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Paypal Email Address</label>
                  <input type="text" name="contact-paypal-email">
                </div>
                <div class="field">
                  <label>Your question</label>
                  <textarea name="contact-question"></textarea>
                </div>
              </div>
            </div>
            <div class="c-3 row" data-c3-segment="a-4" style="display: none;">
              <div class="thirteen wide mobile eight wide tablet eight wide computer column">
                <div class="ui basic segment">
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="contact-changed-password" tabindex="0" class="hidden">
                      <label>Did you change and verify the account email?</label>
                    </div>
                  </div>
                </div>
                <div class="ui basic segment">
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="contact-verified-email" tabindex="0" class="hidden">
                      <label>Did you change the account password?</label>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Riot Ban Code</label>
                  <input type="text" name="contact-riot-ban-code">
                </div>
                <div class="field">
                  <label>Paypal Email Address</label>
                  <input type="text" name="contact-paypal-email">
                </div>
                <div class="field">
                  <label>Your question</label>
                  <textarea name="contact-question"></textarea>
                </div>
              </div>
            </div>
            <div class="c-3 row" data-c3-segment="a-5" style="display: none;">
              <div class="thirteen wide mobile eight wide tablet eight wide computer column">
                <div class="field">
                  <label>Paypal Email Address</label>
                  <input type="text" name="contact-paypal-email">
                </div>
                <div class="field">
                  <label>Your question</label>
                  <textarea name="contact-question"></textarea>
                </div>
              </div>
            </div>
            <div class="c-3 row" data-row="scholarship" data-c3-segment="scholarship" style="display: none;">
              <div class="thirteen wide mobile ten wide tablet ten wide computer column">
                <div class="field">
                  <label>Your question</label>
                  <textarea name="contact-question"></textarea>
                </div>
              </div>
            </div>
            <div class="c-3 row" data-c3-segment="b-1" style="display: none;">
              <div class="thirteen wide mobile eight wide tablet eight wide computer column">
                <div class="field">
                  <label>Your question</label>
                  <textarea name="contact-question"></textarea>
                </div>
              </div>
            </div>
            <div id="contact-submit-row" class="row" style="display: none;">
              <div class="thirteen wide mobile four wide tablet four wide computer column">
                <div class="ui basic clearing segment" style="padding-left: 0; padding-right: 0">
                  <div id="contact-submit-button" class="ui fluid blue button" tabindex="0" data-action="submit">Submit</div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div id="contact-complete" class="ui large form container" style="display: none;">
          <br>
          <h2 class="ui center aligned header">Success</h2>
          <h4 class="ui center aligned header">Your request has been submitted.
            <br>We will get back to you as soon as possible.</h4>
        </div>
        <div id="contact-dimmer" class="ui dimmer">
          <div class="content">
            <div class="center">
              <h2 class="ui inverted icon header">
                <div class="ui indeterminate text loader">Loading</div>
              </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="ui basic center aligned segment container">Or contact us directly at
        <a href="mai&#108;to&#58;s&#37;75ppor%7&#52;&#64;lo%&#54;C%&#50;D&#115;m&#117;r&#102;s&#46;com">&#115;uppor&#116;&#64;lo&#108;&#45;smurfs&#46;c&#111;&#109;</a>
      </div>
    </div>
  </div>
  </div>

  <?php get_footer(); ?>
