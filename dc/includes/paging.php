<?php
  $page =  $_SERVER["REQUEST_URI"];

  switch($page) {
    case "/dc/step-1.php":
      $prev = array('label' => 'Design Center Home', 'link' => '/dc/index.php');
      $next = array('label' => 'Location &amp; Permit Details', 'link' => '/dc/step-2.php');
      break;
    case "/dc/step-2.php":
      $prev = array('label' => 'Configuration', 'link' => '/dc/step-1.php');
      $next = array('label' => 'Installation Details', 'link' => '/dc/step-3.php');
      break;
    case "/dc/step-3.php":
      $prev = array('label' => 'Location &amp; Permit Details', 'link' => '/dc/step-2.php');
      $next = array('label' => 'Complete Order', 'link' => '/dc/step-4.php');
      break;
    case "/dc/step-4.php":
      $prev = array('label' => 'Installation Details', 'link' => '/dc/step-3.php');
      $next = array('label' => 'Design Center Home', 'link' => '/dc/index.php');
      break;
    case "/dc/checkout.php?":
      $prev = array('label' => 'Complete Order', 'link' => '/dc/step-4.php');
      $next = array('label' => 'Design Center Home', 'link' => '/dc/index.php');
      break;
  }
?>

<div class="dc-paging">
  <nav class="paging-nav">
    <a class="btn btn-link" href="<?php echo $prev['link'];?>">
      < Back
    </a>
    <a class="btn btn-primary" href="<?php echo $next['link'];?>">
      <?php echo $next['label'];?> <i class="fas fa-arrow-right"></i>
    </a>
  </nav>
</div>