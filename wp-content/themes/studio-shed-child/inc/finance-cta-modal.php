<!-- Modal for finance CTA -->
<div class="modal fade" id="financeModal" tabindex="-1" role="dialog" aria-labelledby="financeModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="finance-title">Studio Shed lending partners offer simple financing options</div>

        <div id="finance-page-1">
          <p class="text-center">Based on your location and credit we can provide you with the best lending options available for you.</p>

          <form id="finance-form">
            <div>
              <div id="state-selector">
                
                <span>
                  <select aria-label="Select your state" id="finance-state">
                    <option disabled="" selected="" value="">Select your state</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                  </select>
                </span>
              </div>
              <div>
                <span>
                  <select aria-label="Estimated Credit Score" id="finance-credit">
                    <option disabled="" selected="" value="">Estimated credit score</option>
                    <option>800+</option>
                    <option>780-799</option>
                    <option>760-779</option>
                    <option>740-759</option>
                    <option>720-739</option>
                    <option>700-719</option>
                    <option>680-699</option>
                  </select>
                </span>
              </div>
              <div>
                <input autocomplete="Email" aria-label="Email" placeholder="Enter your email" class="js-cm-email-input qa-input-email" id="finance-email" required="" type="email"></div>
            </div>
            <div class="text-center">
              <button id="finance-submit" class="btn btn-primary">Get Monthly Price</button>
            </div>
            <div id="response-msg" class="text-center text-danger m-4"></div>
          </form>
        </div>

        <div id="finance-page-2" style="display: none;">
          <div class="finance-offers">
            <div class="acorn-offer">
              <img class="finance-logo" src="/wp-content/themes/studio-shed-child/img/acorn-finance-logo.png" />
              <small>&nbsp;</small>
              <p>Receive offers from multiple lenders with no impact to your credit score</p>
              <hr>
              <div class="acorn-payment">
                <strong>From <span id="acorn-payment-value"></span>/mo</strong> based on a <span id="acorn-amount-value"></span> project
              </div>
              <div class="acorn-payment-disclaimer">
                for well qualified individuals
              </div>
              <a id="acorn-offer-trigger" class="btn btn-primary btn-acorn-offer" href="#" title="Learn more about Acorn finance options">Learn More</a>
            </div>
            <div class="point-offer">
              <img class="finance-logo" src="/wp-content/themes/studio-shed-child/img/point-finance-logo.png" />
              <small>NMLS # 161075</small>
              <p>Finance with a HELOC loan <small>*Available to California residents at this time.</small></p>
              <hr>
              <div class="point-table">
                <div class="point-terms">
                  <div class="point-amount"><span id="point-amount-value"></span> Amount</div>
                  <div class="point-apr-range"><span id="point-apr-range-value"></span> APR</div>
                  <div class="point-term"><span>30 Year</span> Term</div>
                </div>
                <div class="point-payment">
                  <small>Monthly Payment</small>
                  <div id="point-payment-range"></div>
                  <small>For the first 10 years</small>
                </div>
              </div>
              <a id="point-offer-trigger" class="btn btn-primary btn-point-offer" href="https://welcome.point.com/heloc/studio-shed" target="_blank" title="Learn more about financing with a HELOC loan">Check My Rate</a>
            </div>
          </div>
        </div>


      </div>

    </div>
  </div>
</div>


<script>
  $(document).ready(function() {




    $('#finance-submit').click(function(e){
      e.preventDefault();
      $('#response-msg').hide();
      //var email = $('#finance-email').val();
      var fico = $('#finance-credit option:selected').text();
      if(fico === 'Estimated credit score') {
        $('#response-msg').text('Please select your estimated credit score').show();
        return false;
      }
      var financeState = $('#finance-state option:selected').val();
      var financeEmail = $('#finance-email').val();


      if( $('#cmr > react-component:nth-child(12) > div > div:nth-child(2)').length > 0) {
      	var initialEstimate = $('#cmr > react-component:nth-child(12) > div > div:nth-child(2)').text();
      	var financeAmount = $('#cmr > react-component:nth-child(12) > div > div:nth-child(2)').text().replace('$', '').replace(/,/g, '');
      } else {
      	var initialEstimate = $('#cmr > div:nth-child(6) > div.cfgStep > react-component > div > div:nth-child(2)').text();
      	var financeAmount = $('#cmr > div:nth-child(6) > div.cfgStep > react-component > div > div:nth-child(2)').text().replace('$', '').replace(/,/g, '');
      }
      var obj = {
        "email": financeEmail,
        "amount": financeAmount,
        "fico": fico,
        "state": financeState
      };
      var request = $.ajax({
        url: "/wp-content/themes/studio-shed-child/inc/save-finance-inquiry.php",
        method: "POST",
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(obj)
      });

      request.done(function(data){
        if(data.code == "success") {
          if(data.state == 'CA') {
            //run California functions
            //show side by side layout

            $('#finance-page-1').fadeOut(function(){
              $('#finance-page-2').fadeIn();
            });
            $('#acorn-payment-value').text( $('span.acorn-payment-span:first').text() );
            $('#acorn-amount-value').text( initialEstimate );
            $('#point-amount-value').text( initialEstimate );
            $('#point-apr-range-value').text( data.apr_range );
            $('#point-payment-range').text( data.payment_range );
          } else {
            //run all other states (Acorn only)
            //close modal and trigger acorn modal
            $('#financeModal').modal('hide');
            $('.acorn-popup-link a').trigger('click');
          }
        } else {
          //render response message
          $('#response-msg').text(data.response).show();
        }
      });
      request.fail(function(jqXHR, textStatus) {
        console.log("Fail: " + textStatus);
      });

    });

    $('#acorn-offer-trigger').click(function(e) {
      e.preventDefault();
      $('#financeModal').modal('hide');
      $('.acorn-popup-link a').trigger('click');
    });
  });
</script>