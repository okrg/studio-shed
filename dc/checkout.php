<?php
require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_yvJN4lDIYjjUJmZnRkSQHfs4');
$intent = \Stripe\PaymentIntent::create([
  'amount' => 1099,
  'currency' => 'usd',
]);




?>


<?php include('includes/header.php'); ?>
<script type="text/javascript">
  var stripe = Stripe('pk_test_dObY7AghoaRyd66ClG2wETRT');
  var clientSecret = '<?php echo $intent->client_secret; ?>';
  var elements = stripe.elements();
</script>

<main id="step-4">
  <div class="container">

    <section class="dc-payment-checkout">
      <h2 class="text-center mb-5">Checkout</h2>
      <div class="row">
        <div class="col-md-8 offset-2">
        <h2 class="text-center ">Final Estimate: <span id="final-estimate">&mdash;</span></h2>
        <h2 class="text-center initial-payment">Initial Payment: <span id="initial-payment">&mdash;</span></h2>
        <p class="text-center">*You will be charged the initial payment of 50% of the final estimate. The remaining amount, including taxes, will be charged upon final shipment.</p>
        </div>
      </div>
    </section>

    <section class="dc-checkout-form">
      <div class="row">
        <div class="col-md-8 offset-2">

          <div id="checkout">
      <form id="payment-form" method="POST" action="/orders">
        <section>
          <h2>Shipping &amp; Billing Information</h2>
          <fieldset class="with-state">
            <label>
              <span>Name</span>
              <input name="name" id="billing-name" class="field" placeholder="Jenny Rosen" required>
            </label>
            <label>
              <span>Email</span>
              <input name="email" id="billing-email" type="email" class="field" placeholder="jenny@example.com" required>
            </label>
            <label>
              <span>Address</span>
              <input name="address" id="billing-address" class="field" placeholder="185 Berry Street Suite 550">
            </label>
            <label>
              <span>City</span>
              <input name="city" id="billing-city" class="field" placeholder="San Francisco">
            </label>
            <label class="state">
              <span>State</span>
              <input name="state" id="billing-state" class="field" placeholder="CA">
            </label>
            <label class="zip">
              <span>ZIP</span>
              <input name="postal_code" id="billing-zip" class="field" placeholder="94107">
            </label>
            <!--
            <label class="select">
              <span>Country</span>
              <div id="country" class="field US">
                <select name="country">
                  <option value="US" selected="selected">United States</option>
                </select>
              </div>
            </label>
            -->
          </fieldset>      
        </section>
        <section>
          <h2>Payment Information</h2>
          <nav id="payment-methods">
            <ul>
              <li>
                <input type="radio" name="payment" id="payment-card" value="card" checked>
                <label for="payment-card">Card</label>
              </li>
            </ul>
          </nav>
          <div class="payment-info visible">
            <fieldset>
              <label>
                <span>Card</span>
                <div id="card-element" class="field"></div>
              </label>
            </fieldset>
          </div>
          <div class="payment-info redirect">
            <p class="notice">You’ll be redirected to the banking site to complete your payment.</p>
          </div>
          <div class="payment-info receiver">
            <p class="notice">Payment information will be provided after you place the order.</p>
          </div>
        </section>
        <button class="payment-button" type="submit">Pay</button>
      </form>
      <div id="card-errors" class="element-errors"></div>
      </div>
      <div id="confirmation">
        <div class="status processing">
          <h1>Completing your order…</h1>
          <p>We’re just waiting for the confirmation from your bank… This might take a moment but feel free to close this page.</p>
          <p>We’ll send your receipt via email shortly.</p>
        </div>
        <div class="status success">
          <h1>Thanks for your order!</h1>
          <p>Woot! You successfully made a payment with Stripe.</p>
          <p class="note">We just sent your receipt to your email address, and your items will be on their way shortly.</p>
        </div>
        <div class="status receiver">
          <h1>Thanks! One last step!</h1>
          <p>Please make a payment using the details below to complete your order.</p>
          <div class="info"></div>
        </div>
        <div class="status error">
          <h1>Oops, payment failed.</h1>
          <p>It looks like your order could not be paid at this time. Please try again or select a different payment option.</p>
          <p class="error-message"></p>
        </div>
      </div>


        <script>
          $(document).ready(function(){
            var style = {
              base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                color: '#32325d',
              },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

          card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
              displayError.textContent = event.error.message;
            } else {
              displayError.textContent = '';
            }
          });

          var submitButton = document.getElementById('submit');

          submitButton.addEventListener('click', function(ev) {
            stripe.confirmCardPayment(clientSecret, {
              payment_method: {
                card: card,
                billing_details: {
                  name: 'Jenny Rosen'
                }
              }
            }).then(function(result) {
              if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                console.log(result.error.message);
              } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                  // Show a success message to your customer
                  // There's a risk of the customer closing the window before callback
                  // execution. Set up a webhook or plugin to listen for the
                  // payment_intent.succeeded event that handles any business critical
                  // post-payment actions.
                }
              }
            });
          });


          });
        </script>

        </div>
      </div>
    </section>



    <section class="dc-faq">
      <div class="row">
        <div class="col-sm-8 offset-2">
          <h2 class="text-center mb-5">Frequently Asked Questions</h2>
          <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading0">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                Mauris scelerisque lacus consectetur elit consectetur, non faucibus massa iaculis?
                </a>
              </h4>
              </div>
              <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in sem aliquam, efficitur eros eu, vehicula elit. Donec metus sapien, sollicitudin vitae nibh eu, efficitur efficitur dui. In vitae dolor ex. Phasellus feugiat ligula ac orci ullamcorper, sit amet egestas dui auctor. Fusce sed laoreet purus. Curabitur aliquam sit amet nulla vel placerat. Donec id laoreet ligula, nec pharetra libero. Nunc imperdiet lorem ac rhoncus lacinia. Praesent cursus turpis eu metus ultrices laoreet. Nulla posuere ante ligula, eu elementum purus euismod sed. Ut ornare sit amet risus vitae cursus. Mauris posuere sed odio vitae viverra.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading1">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                Aliquam quis nisi id ex dapibus consequat in vitae magna?
                </a>
              </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
              <div class="panel-body px-3 mb-4">
                <p>Sed efficitur a massa eget rutrum. Ut sed mattis ante, a lacinia mi. In hac habitasse platea dictumst. Morbi a ligula eget lorem faucibus volutpat nec sed nibh. Ut non semper dui. Pellentesque sed tellus dictum, euismod urna et, convallis lorem. Nam vehicula leo eget dui lacinia gravida. Etiam eu augue vehicula, tempor augue ac, egestas mi. Quisque id nunc feugiat, mollis ipsum id, vulputate libero. Proin elit justo, pharetra ac vestibulum ac, euismod et tortor. Phasellus vehicula sem ac dapibus auctor. Nulla molestie malesuada sapien, pulvinar auctor erat tincidunt eu.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading2">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                Nunc arcu enim, rutrum at nisi eu, iaculis ultricies neque. Nam in scelerisque urn?
                </a>
              </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body px-3 mb-4">
                <p>Nunc auctor nisl hendrerit, semper quam nec, varius neque. Pellentesque ac dui nec arcu molestie posuere non ut quam. Phasellus tempus viverra dui, at venenatis orci sollicitudin rhoncus. Duis nec libero finibus, malesuada libero sit amet, ultricies ex. Sed sodales rutrum fermentum.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading3">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                Nullam non urna placerat, aliquet velit vel, eleifend turpis. Integer rhoncus ut purus non pharetra?
                </a>
              </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
              <div class="panel-body px-3 mb-4">
                <p>Cras scelerisque finibus magna sed tempus. Donec porta pulvinar urna, nec faucibus felis vulputate a. Mauris fermentum fringilla arcu, eu feugiat erat vulputate non. In posuere odio leo, id cursus felis condimentum a. Sed convallis, lacus ut facilisis accumsan, lacus dolor placerat massa, tempus dapibus neque diam ut quam. Sed mollis, neque eget tincidunt volutpat, erat leo cursus tortor, et ultrices metus libero ut arcu. Duis euismod mauris et ex aliquet, nec lobortis diam elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce dolor enim, fringilla in facilisis pretium, interdum a nulla. Maecenas scelerisque commodo sem, sed eleifend velit euismod non.</p>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include('includes/paging.php'); ?>

  </div>
</main>
<?php include('includes/footer.php'); ?>