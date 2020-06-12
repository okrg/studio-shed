<?php
header("Status: 301 Moved Permanently");
header("Location:https://design.studio-shed.com/lookup/config.php?". $_SERVER['QUERY_STRING']);
exit;
?>
<?php include('../includes/lookup-header.php'); ?>

<?php
/*
On the other side you should first check if the timestamp is in the limits (e.g. not older than five minutes) and than rehash with the key and the submitted timestamp. If you get the same hash the request is valid.

Notes:
don't use MD5: the algorithm is completely broken and doesn't provide any security anymore (although it's supposed to still be ok when used with an HMAC…)
you should use hash_equals for comparing hashes to prevent timing attacks
we use an HMAC to guarantee data integrity and authentication. See https://crypto.stackexchange.com/questions/1070/why-is-hkx-not-a-secure-mac-construction for why we mustn't just concatenate time & key
*/

$hash = $_REQUEST['h'];
$time = $_REQUEST['t'];
$uid = $_REQUEST['u'];
$key = 'wCXyYiw#bHxK-<cH];"a:Yd=40^zx)';
$expected_hash = hash_hmac('sha256', $time, $key);
$hash_equals = hash_equals($expected_hash, $hash);
$expired = true;


if ($time >= strtotime('-1 month')) {
  $expired = false;
}
?>


<?php if ($expired): ?>
  <p>Sorry this link has expired. <a href="/dc/lookup">Please try to lookup by email.</a></p>
<?php else: ?>
  <?php if ($hash_equals): ?>
<main id="step-4">
  <div class="container">

    <section class="dc-checkout-summary">
      <div class="row">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
        <h2 class="text-center ">Customer Information</h2>
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
              <th scope="row">Phone</th>
              <td><span id="summary-phone"></span></td>
            </tr>
            <tr>
              <th scope="row">Configuration ID</th>
              <td><span id="summary-config-id"></span></td>
            </tr>
          </tbody>
        </table>
        </div>

        <?php include('../includes/configuration-details.php'); ?>

    </section>


  </div>
</main>

<script type="text/javascript">
$(document).ready(function() {
  getLookupUid('<?php echo $uid; ?>')
    .then(getCart)
    .then(renderCartLabels)
    .then(renderShippingElements)
    .then(renderPermitElements)
    .then(renderInstallationElements)
    .then(cartRenderDone);
});
</script>

  <?php else: ?>
    <p class="my-5 text-center">Sorry, there was a problem with this link. <a href="/dc/lookup">Please try to lookup by email.</a><p>
  <?php endif; ?>
<?php endif; ?>

<?php include('../includes/lookup-footer.php'); ?>