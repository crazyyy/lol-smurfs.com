
    $(document).ready(function() {

      /** Set Initial Currency Value */
      window.currency = "USD";

      $('.ui.currency.dropdown').dropdown('set selected','USD')
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
            method : 'POST',
            dataType: 'json',
            beforeSend: function (settings) {
              settings.data.currency = $(this).dropdown('get value');
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
              return false;
              }
              // On Success != false, Continue
              return response;
            },
            successTest: function(response) {
              // test whether a JSON response is valid
              return response.success || false;
            },
            onSuccess: function (response) {
              CurrencyConverter(response);
            },
        });


        //var val = 'https://www.lol-smurfs.com' + '?cur=' + $('.ui.currency.dropdown').dropdown('get value');
        //var newUrl = 'https://www.lol-smurfs.com' + '?cur=' + val;

        //window.location.href = val;
        return false;

      });


      function CurrencyConverter( currencyData )
      {

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
    