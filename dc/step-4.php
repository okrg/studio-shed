<?php include('includes/header.php'); ?>
<main id="step-4">
<form id="checkout-form" class="" action="/dc/checkout.php" method="POST">
  <input type="hidden" name="stripeFee" id="stripe-fee" />
</form>

</main>
<script type="text/javascript">
$(document).ready(function() {
  $('#progress-step-4').addClass('current');
});
</script>
<?php include('includes/footer.php'); ?>