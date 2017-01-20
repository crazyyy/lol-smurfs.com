
                      $(document).ready(function() {
                        // Show Additional Skin Inputs When Selected
                          $('input[name="contact-missing-skins"]').change(function() {
                              if(this.checked) {
                                  $('div#elophant-url').velocity('transition.fadeIn').addClass('visible');
                              } else {
                                $('div#elophant-url').velocity('transition.fadeOut').removeClass('visible');;
                              }
                          });

                        // EloPhant Help popup
                          $('.elo-help').popup({
                            hoverable: true,
                            popup : $('#elo-pop'),
                            on    : 'hover'
                          });
                          $('input[name="contact-elophant-url"]').popup({
                            hoverable: true,
                            popup : $('#elo-pop'),
                            on    : 'focus'
                          });
                      });
                    