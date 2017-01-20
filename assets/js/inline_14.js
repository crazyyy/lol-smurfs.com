

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
        identifier : "contact-name",
        inline : 'true',
        //transition: 'scale',
        on     : 'change',
        delay  : 200,
        rules: [{
            type : "empty"
        }]
    },
    email: {
        identifier : "contact-email",
        inline : false,
        //transition: 'scale',
        on     : 'blur',
        delay  : 200,
        rules: [
          {
            type : "empty"
          }
        ]
  }};


  var FormTwoRules = {
    inquiry: {
        identifier : "contact-inquiry",
        delay  : 200,
        rules: [{
            type : "empty"
        }]
    }
  };



  $( "#contact-form-one" ).form({
      fields: {
        name: {
            identifier : "contact-name",
            inline : 'true',
            on     : 'change',
            rules: [{
                type : "empty"
            }]
        },
        email: {
            identifier : "contact-email",
            inline : false,
            on     : 'blur',
            rules: [
              {
                type : "empty"
              },
              {
                type : "email"
              }
            ]
      }},
      inline : true,
      on     : 'blur',
      onSuccess: function(e) {
        e.preventDefault();

        // Add Form Data To ContactDate Object
          $(' input', this).each( function() {
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
          formOld.velocity('transition.fadeOut',
          {
            duration: 50,
            delay: 200,
            begin: function() {
              $contactDimmer.dimmer('show');
            },

            complete: function() {
              formNew.velocity('transition.fadeIn',{
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

    var step  = parseInt($('#contact-form-two').attr('data-step'));
    var cards = $('#contact-form-two .ui.card');
    var next  = parseInt($(this).attr('data-next'));
    var value = $(this).attr('data-value');
    var text  = $(this).find('.content .header').text();


  /* --------------------------------------------------------------------
      Set Contact Type To Determine Which Email Request Filters To
                  0 - support@lol-Smurfs.com
                  1 - partners@lol-Smurfs.com
  -------------------------------------------------------------------- */
    // Determine Inquiry Type
      if( value == 'general' )   { contactData['filter'] = 1; }
      if( value == 'scholarship' )   { contactData['filter'] = 1; }
      if( value == 'business' )  { contactData['filter'] = 3; }

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
      formOld.velocity('transition.fadeOut',
      {
        duration: 50,
        delay: 200,
        begin: function() {
          $contactDimmer.dimmer('show');
        },

        complete: function() {
          formNew.velocity('transition.fadeIn',{
            complete: function() {

              if( value == 'general' || value == 'scholarship') {
                $('#contact-form-three .row.visible').removeClass('visible').css('display','none');
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
      $('#contact-form-three .row.visible').removeClass('visible').css('display','none');
      $('#contact-form-three .row[data-c3-segment="' + value + '"]').addClass('visible').velocity('transition.fadeIn');
      $('#contact-submit-row').velocity('transition.fadeIn');
    }
  });






  $('#contact-form-three .c-3.row.visible input[type="text"]').keyup(function (e) { e.preventDefault(); alert('test'); });


  $("#contact").on('click', '#contact-submit-button', function(e) {
    e.preventDefault();

    // Verify Whether Any Checkbox Are Present And Add Them To Form Data As Needed\
      var inputCheckboxes = $('#contact-form-three .c-3.row.visible input[type="checkbox"]');

      if(inputCheckboxes.length > 0) {
        inputCheckboxes.each( function() {
          if($(this).is('checked') ) {
            checkVal = 'yes';
          } else {
            checkVal = 'no';
          }
          contactData[$(this).attr('name')] = checkVal;
        });
      }


    // Custom Validate Each Input And TextArea
      var inputFields = $('#contact-form-three .c-3.row.visible input[type="text"], #contact-form-three .c-3.row.visible textarea');
      inputFields.each( function() {
        if ( $(this).val() != '' ) {
          $(this).removeClass('invalid').addClass('valid');

          contactData[$(this).attr('name')] = $(this).val();;

        } else {
          $(this).removeClass('valid').addClass('invalid');
        }
      });

    // Iterate Valid Fields Into Variable
      var validFields = $('#contact-form-three .c-3.row.visible input[type="text"].valid, #contact-form-three .c-3.row.visible textarea.valid');

    // If Any Fields Are Not Valid, Prevent Form Submission
      if ( validFields.length != inputFields.length) {
          return false;
      }

     // console.log(contactData);

     // Specific Validation Requring EloPhant URL If "I'm Missing Skins" Is Checked
        if( $('input[name="contact-missing-skins"]').is(':checked') ) {

          console.log('MISSING SKINS CHECKED');
          EloPhantUrl = $('input[name="contact-elophant-url"]');
          console.log('EloPhant URL: ' + EloPhantUrl.val() );

          if( !UrlIsValid( EloPhantUrl.val() ) ) {
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

