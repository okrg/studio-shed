<?php include('includes/header.php'); ?>
<main id="step-4">
  <div class="container">

    <section class="dc-checkout-summary">
      <div class="row">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
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
        </div>

        <?php include('includes/configuration-details.php'); ?>

      
    </section>

    <?php include('includes/contact.php'); ?>

  </div>
</main>

<script type="text/javascript">
$(document).ready(function() {
  $('li[data-progress-step="4"]').addClass('current');
  getUidCookie()
    .then(getCart)
    .then(renderCartLabels)
    .then(renderShippingElements)
    .then(renderPermitElements)
    .then(renderInstallationElements)
    .then(cartRenderDone);
});
</script>
<?php include('includes/logged-out-footer.php'); ?>