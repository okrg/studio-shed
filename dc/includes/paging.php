<?php
  $page =  strtok(basename($_SERVER["REQUEST_URI"]), '?');
  
  switch($page) {
    case "step-1.php":
      $prev = array(
        'label' => 'Design Center Home',
        'link' => '/dc/index.php',
        'step' => 0
      );
      $next = array(
        'label' => 'Location &amp; Permit Details',
        'link' => '/dc/step-2.php',
        'class' => 'btn-primary',
        'step' => 2
      );
      break;
    case "step-2.php":
      $prev = array(
        'label' => 'Configuration',
        'link' => '/dc/step-1.php',
        'step' => 1
      );
      $next = array(
        'label' => 'Installation Details',
        'link' => '/dc/step-3.php',
        'class' => 'btn-primary',
        'step' => 3
      );
      break;
    case "step-3.php":
      $prev = array(
        'label' => 'Location &amp; Permit Details',
        'link' => '/dc/step-2.php',
        'step' => 2
      );
      $next = array(
        'label' => 'Complete Order',
        'link' => '/dc/checkout.php',
        'class' => 'btn-primary',
        'step' => 4
      );
      break;
    case "step-4.php":
      $prev = array(
        'label' => 'Installation Details',
        'link' => '/dc/step-3.php',
        'step' => 3
      );
      $next = array(
        'label' => 'Design Center Home',
        'link' => '/dc/index.php',
        'class' => 'btn-link',
        'step' => 0
      );
      break;
    case "checkout.php":
      $prev = array(
        'label' => 'Installation Details',
        'link' => '/dc/step-3.php',
        'step' => 3
      );
      $next = array(
        'label' => 'Design Center Home',
        'link' => '/dc/index.php',
        'class' => 'btn-link',
        'step' => 0
      );

    break;
  }
?>

<div class="dc-paging">
  <nav class="paging-nav">
    <a class="btn btn-link" href="javascript:void(0);" data-menu-step="<?=$prev['step'];?>">
      < Back
    </a>
    <a class="btn <?php echo $next['class']; ?>" href="javascript:void(0);" data-menu-step="<?=$next['step'];?>">
      <?php echo $next['label'];?> <i class="fas fa-arrow-right"></i>
    </a>
  </nav>
</div>