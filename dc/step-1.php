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
<main id="step-1">
  <div class="container">

    <?php include('includes/configuration-details.php'); ?>

    <div class="dc-intro">
      <h2>Step 1 of 4: Design Configuration</h2>
      <p>Bring your backyard dreams to life by designing your dream Studio Shed. Choose your size, configuration, siding, and colors.</p>
    </div>

    <div class="dc-configurator">

      <div id="mobile-portland">
        <div class="alert alert-warning">Please use your desktop computer to log into the design center and modify your Portland series configuration.</div>
      </div>

      <div id="<?php echo $idearoomDiv; ?>" style="margin: 0 auto;"></div>
        <!--<script type="application/javascript" src="vendor/modernizr.js"></script>-->
        <script id="idearoomStartup" type="application/javascript" src="https://<?php echo $ideaRoomModel; ?>.idearoomstaging.com/idearoom.js"></script>
    </div>

    <section class="dc-popular">
      <h3>Need help deciding Try these popular configurations</h3>
      <div class="inside owl-carousel owl-theme">
        <div class="pr-box item">
          <div class="inner">
            <p class="headline">
              <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/trico/">Trico</a>
            </p>
            <p class="sub-headline">Simple and Stylish Storage</p>
            <p class="option-text">Starting at $8,285</p>
            <div class="thumb-wrap">
              <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/trico/">
                <img src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/uploads/2017/01/Trico-10x12-FR-1-300x200.png" alt=" - Trico-10x12-FR" />
              </a>
            </div>
          </div>
        </div>
        <div class="pr-box item">
          <div class="inner">
            <p class="headline">
              <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/pagoda/">Pagoda</a>
            </p>
            <p class="sub-headline">The Original with All-New Updates</p>
            <p class="option-text">Starting at $9,800</p>
            <div class="thumb-wrap">
              <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/pagoda/">
                <img src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/uploads/2017/01/Pagoda-10x12-Costco-FR_edit-300x200.png" alt=" - Pagoda-10x12-Costco-FR_edit" />
              </a>
            </div>
          </div>
        </div>
        <div class="pr-box item">
          <div class="inner">
            <p class="headline">
              <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/boreas/">Boreas</a>
            </p>
            <p class="sub-headline">French Doors and a Flexible Layout</p>
            <p class="option-text">Starting at $9,900</p>
            <div class="thumb-wrap">
              <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/boreas/">
                <img src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/uploads/2017/01/Boreas-10x12-Costco-FR_edit2-300x200.png" alt=" - Boreas-10x12-Costco-FR_edit2" />
              </a>
            </div>
          </div>
        </div>
        <div class="pr-box item">
          <div class="inner">
            <p class="headline">
              <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/solitude/">Solitude</a>
            </p>
            <p class="sub-headline">Your Turnkey Backyard Sanctuary</p>
            <p class="option-text">Starting at $11,800</p>
            <div class="thumb-wrap">
              <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/solitude/">
                <img src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/uploads/2017/01/Solitude-10x12-Costco-FR-1-300x200.png" alt=" - Solitude-10x12 FR">
                </a>
              </div>
            </div>
          </div>
          <div class="pr-box item">
            <div class="inner">
              <p class="headline">
                <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/flora/">Telluride</a>
              </p>
              <p class="sub-headline">Light-Filled Backyard Retreat or Studio</p>
              <p class="option-text">Starting at $12,495</p>
              <div class="thumb-wrap">
                <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/flora/">
                  <img src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/uploads/2017/01/Telluride-10x12-Home-Depot-3d-FR-300x200.png" alt=" - Telluride-10x12 3d FR">
                  </a>
                </div>
              </div>
            </div>
            <div class="pr-box item">
              <div class="inner">
                <p class="headline">
                  <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/medano/">Medano</a>
                </p>
                <p class="sub-headline">The Ultimate Backyard Retreat</p>
                <p class="option-text">Starting at $13,700</p>
                <div class="thumb-wrap">
                  <a target="_blank" href="https://www.studio-shed.com/products/signature-series/shed-types/medano/">
                    <img src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/uploads/2017/01/Medano-10x12-FR-300x200.png" alt=" - Medano-10x12-FR">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>

    <!--
    <section class="dc-stories">
      <h3>Want to more inspiration? See customer stories</h3>
      <div class="row">
        <div class="col-sm-4">
          <a href="#">
            <img src="img/story-man-cave.png" class="img-fluid" />
          </a>
          <h4><a href="#">Man Cave</a></h4>          
          <p>Design the ultimate Man Cave with Studio Shed. The perfect place to get away after a long day that is still just right outside your back door.</p>
        </div>
        <div class="col-sm-4">
          <a href="#">
            <img src="img/story-home-office.png" class="img-fluid" />
          </a>
          <h4><a href="#">Home Office Spaces</a></h4>
          <p>Our modern world requires that we work in new ways. A Studio Shed backyard office is a place you can commute to in seconds, without the distractions of an office in your home.</p>
        </div>
        <div class="col-sm-4">
          <a href="#">
            <img src="img/story-music-studio.png" class="img-fluid" />
          </a>
          <h4><a href="#">Music Studios</a></h4>
          <p>Design the ultimate Man Cave with Studio Shed. The perfect place to get away after a long day that is still just right outside your back door.</p>
        </div>
      </div>
      <h5><a href="#">See All Shed Stories</a></h5>
    </section>
    -->

    <section class="dc-faq">
      <div class="row">
        <div class="col-sm-8 offset-2">
          <h2 class="text-center mb-5">Frequently Asked Questions</h2>
          <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading0">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">What is the difference between your product lines?</a>
              </h4>
              </div>
              <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
              <div class="panel-body mb-4">
                <p>Our Signature Series line is focused on single room studios in sizes from 8’x8’ up to 12’x20’. It has integrated structural transom windows and exposed rafter ends.</p>
                <p>The Summit Series is available in sizes from 14×18 to 20×50. They feature taller ceilings, enclosed eaves, thicker walls, and customizable interior layouts sure to fit any type of need.</p>
                <p>Our Portland Series features a gable-style roof offering a more traditional option. It retains the same high-quality mix of materials and clean design as our other product lines, and fits with a wide variety of residential aesthetics.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading1">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">What is included in the interior kits?</a>
              </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
              <div class="panel-body mb-4">
                <p>For our Signature Series, our Lifestyle interior includes finished flooring, electrical wiring and fixtures, insulation, and drywall interior on installed units.</p>
                <p>The Summit Series models are configurable with bathrooms, kitchens, and even bedrooms on larger models. Studio Shed provides the cabinets, countertops, fixtures, and electrical components. The only item not included is the rough plumbing connections, as these details will vary by site and location. It is typical for our installation teams to work directly with you on a quote for this portion of the project based on your unique site details.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading2">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">Can I make customizations to the product?</a>
              </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body mb-4">
                <p>Some limited customization may be possible depending on the size and configuration of your order. Any customizations are subject to additional fees and lead time. The best way to determine if your custom request is feasible is to save the closest thing to what you desire in our 3D configurator for follow-up with our design department.</p>
              </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <?php include('includes/paging.php'); ?>
    <?php include('includes/contact.php'); ?>
  </div>
</main>
<script type="text/javascript">
$(document).ready(function() {
  getUidCookie()
    .then(getCart)
    .then(renderCartLabels)
    .then(renderShippingElements)
    .then(renderPermitElements)
    .then(renderInstallationElements)
    .then(cartRenderDone);

  $('li[data-progress-step="1"]').addClass('current');
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
  });
});
</script>
<?php include('includes/footer.php'); ?>