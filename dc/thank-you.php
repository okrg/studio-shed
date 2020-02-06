<?php include('includes/header.php'); ?>
<main id="step-4">
  <div class="container">
    

    <section class="dc-intro">
      <h2>Your Order is Completed</h2>
      <p>Short introduction about this page and basic instructions on how to use it.</p>
    </section>

    <section class="dc-payment-checkout">
      <div class="row">
        <div class="col-md-8 offset-2">
        <h2 class="text-center ">Final Estimate: <span id="final-estimate">&mdash;</span></h2>
        <h2 class="text-center initial-payment">Initial Payment: <span id="initial-payment">&mdash;</span></h2>
        <p class="text-center">*You will be charged the initial payment of 50% of the final estimate. The remaining amount, including taxes, will be charged upon final shipment.</p>
        <form class="" action="/dc/checkout.php" method="get">
          <div class="form-group mb-2 w-75 mx-auto">
            <input type="text" placeholder="Enter Referral Code" class="form-control" />
          </div>
          <div class="form-group mb-2 text-center">
          <button type="submit" class="btn btn-primary">Checkout <i class="fas fa-arrow-right"></i></button>
         </div>
        </form>
        </div>
      </div>
    </section>


  </div>
</main>
<?php include('includes/logged-out-footer.php'); ?>