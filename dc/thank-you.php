<?php include('includes/header.php'); ?>
<main id="step-4">
  <div class="container">

    <section class="dc-checkout-summary">
      <div class="row">
        <div class="col-md-8 offset-2">
        <h2 class="text-center ">Order Summary</h2>
        <table class="table">
          <tbody>
            <tr>
              <th scope="row">Name</th>
              <td><span id="summary-name"></span></td>
            </tr>
            <tr>
              <th scope="row">Location</th>
              <td><span id="summary-location"></span></td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td><span id="summary-email"></span></td>
            </tr>
            <tr>
              <th scope="row">Configuration ID</th>
              <td><span id="summary-config-id"></span></td>
            </tr>
          </tbody>
        </table>

        <h2 class="text-center mt-5">Configuration Details</h2>

        <img id="summary-config-render" class="img-fluid" />

        <table class="table">
          <tbody>
            <tr>
              <th scope="row">Size</th>
              <td><span id="summary-config-size"></span></td>
               <td class="text-right"><span id="summary-config-size-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Siding</th>
              <td><span id="summary-config-siding"></span></td>
              <td class="text-right"><span id="summary-config-siding-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Front</th>
              <td><span id="summary-config-front"></span></td>
              <td class="text-right"><span id="summary-config-front-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Left</th>
              <td><span id="summary-config-left"></span></td>
              <td class="text-right"><span id="summary-config-left-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Right</th>
              <td><span id="summary-config-right"></span></td>
              <td class="text-right"><span id="summary-config-right-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Back</th>
              <td><span id="summary-config-back"></span></td>
              <td class="text-right"><span id="summary-config-back-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Siding Color</th>
              <td><span id="summary-config-siding-color"></span></td>
              <td class="text-right"><span id="summary-config-siding-color-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Door Color</th>
              <td><span id="summary-config-door-color"></span></td>
              <td class="text-right"><span id="summary-config-door-color-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Eaves Color</th>
              <td><span id="summary-config-eaves-color"></span></td>
              <td class="text-right"><span id="summary-config-eaves-color-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Accessory</th>
              <td><span id="summary-config-accessory"></span></td>
              <td class="text-right"><span id="summary-config-accessory-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Shipping</th>
              <td><span id="summary-config-shipping"></span></td>
              <td class="text-right"><span id="summary-config-shipping-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Permit Plans Set</th>
              <td><span id="summary-config-permit-plans"></span></td>
              <td class="text-right"><span id="summary-config-permit-plans-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Foundation</th>
              <td><span id="summary-config-foundation"></span></td>
              <td class="text-right"><span id="summary-config-foundation-price"></span></td>
            </tr>
            <tr>
              <th scope="row">Installation</th>
              <td><span id="summary-config-installation"></span></td>
              <td class="text-right"><span id="summary-config-installation-price"></span></td>
            </tr>
            <tr class="total-row">
              <th scope="row">Total</th>
              <td></td>
              <td class="text-right"><span id="summary-config-total-price"></span></td>
            </tr>
            <tr class="total-row">
              <th scope="row">Initial Payment</th>
              <td></td>
              <td class="text-right"><span id="summary-config-initial-payment-price"></span>
                <div class="badge badge-success">
                  <span id="summary-config-initial-payment-date"></span>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
    </section>

    <?php include('includes/contact.php'); ?>

  </div>
</main>

<script type="text/javascript">
$(document).ready(function() {
  $('#progress-step-4').addClass('current');
});
</script>
<?php include('includes/logged-out-footer.php'); ?>