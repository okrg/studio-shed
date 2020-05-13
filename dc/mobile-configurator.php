<?php include('includes/header.php'); ?>

<?php
  $model = strtolower($_GET['model']);
  switch($model) {
    default:
    case 'signature':
      $idearoomDiv = 'idearoomConfigurator';
      $ideaRoomModel = 'studioshedsignature';
      break;
    case 'summit':
      $idearoomDiv = 'idearoomConfigurator';
      $ideaRoomModel = 'studioshedsummit';
      break;
    case 'portland':
      $idearoomDiv = 'shedConfigurator';
      $ideaRoomModel = 'studioshedportland';
      break;
  }

?>

<div class="dc-configurator">
  <div id="<?php echo $idearoomDiv; ?>" style="margin: 0 auto;"></div>
    <!--<script type="application/javascript" src="vendor/modernizr.js"></script>-->
    <script id="idearoomStartup" type="application/javascript" src="https://<?php echo $ideaRoomModel; ?>.idearoomstaging.com/idearoom.js"></script>
</div>


