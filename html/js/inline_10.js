
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
          data: { emailAddress: email, _token: token, subscribe: checkbox, region: regionMail}, // our data object
          dataType: 'json' // what type of data do we expect back from the server
      }).done(function(data) {
        if (!data.success) {
        } else {
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
