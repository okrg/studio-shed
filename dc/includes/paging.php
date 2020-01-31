<?php
  $page =  $_SERVER["REQUEST_URI"];

  switch($page) {
    case "/dc/step-1":
      $prev = array('label' => 'Design Center Home', 'link' => '/dc/');
      $next = array('label' => 'Location &amp; Permit Details', 'link' => '/dc/step-2');
      break;
    case "/dc/step-2":
      $prev = array('label' => 'Configuration', 'link' => '/dc/step-1');
      $next = array('label' => 'Installation Details', 'link' => '/dc/step-3');
      break;
    case "/dc/step-3":
      $prev = array('label' => 'Location &amp; Permit Details', 'link' => '/dc/step-2');
      $next = array('label' => 'Complete Order', 'link' => '/dc/step-4');
      break;
    case "/dc/step-4":
      $prev = array('label' => 'Installation Details', 'link' => '/dc/step-3');
      $next = array('label' => 'Design Center Home', 'link' => '/dc/');
      break;
    case "/dc/checkout?":
      $prev = array('label' => 'Complete Order', 'link' => '/dc/step-4');
      $next = array('label' => 'Design Center Home', 'link' => '/dc/');
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