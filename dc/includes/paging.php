<?php
  $page =  strtok(basename($_SERVER["REQUEST_URI"]), '?');
  
  switch($page) {
    case "step-1.php":
      $prev = array(
        'label' => 'Design Center Home',
        'link' => '/dc/index.php'
      );
      $next = array(
        'label' => 'Location &amp; Permit Details',
        'link' => '/dc/step-2.php',
        'class' => 'nextStep'
      );
      break;
    case "step-2.php":
      $prev = array(
        'label' => 'Configuration',
        'link' => '/dc/step-1.php'
      );
      $next = array(
        'label' => 'Installation Details',
        'link' => '/dc/step-3.php',
        'class' => 'nextStep'
      );
      break;
    case "step-3.php":
      $prev = array(
        'label' => 'Location &amp; Permit Details',
        'link' => '/dc/step-2.php'
      );
      $next = array(
        'label' => 'Complete Order',
        'link' => '#',
        'class' => 'paymentIntent'
      );
      break;
    case "step-4.php":
      $prev = array(
        'label' => 'Installation Details',
        'link' => '/dc/step-3.php'
      );
      $next = array(
        'label' => 'Design Center Home',
        'link' => '/dc/index.php',
        'class' => 'nextStep'
      );
      break;
  }
?>

<div class="dc-paging">
  <nav class="paging-nav">
    <a class="btn btn-link" href="<?php echo $prev['link'];?>">
      < Back
    </a>
    <a class="btn btn-primary <?php echo $next['class']; ?>" href="<?php echo $next['link'];?>">
      <?php echo $next['label'];?> <i class="fas fa-arrow-right"></i>
    </a>
  </nav>
</div>