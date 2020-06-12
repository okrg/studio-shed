<?php
header("Status: 301 Moved Permanently");
header("Location:https://design.studio-shed.com/lookup/auth.php?". $_SERVER['QUERY_STRING']);
exit;
?>
<?php include('../includes/logged-out-header.php'); ?>

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
$key = 'wCXyYiw#bHxK-<cH];"a:Yd=40^zx)';
$expected_hash = hash_hmac('sha256', $time, $key);
$hash_equals = hash_equals($expected_hash, $hash);
$expired = true;

if ($time >= strtotime('-1 month')) {
  $expired = false;
}
?>

<?php if ($expired): ?>
  <p>Sorry this link has expired. <a href="/dc">Please try to login again.</a></p>
<?php else: ?>
  <?php if ($hash_equals): ?>
    <script type="text/javascript">
      Cookies.set('sslookup', '<?php echo $hash; ?>', { expires: 30 });
      window.location = "/dc/lookup";
    </script>
  <?php endif; ?>
<?php endif; ?>

<?php include('../includes/logged-out-footer.php'); ?>