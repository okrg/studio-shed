<?php include('includes/header.php'); ?>
<main id="step-2">
  <div class="container">
    <?php include('includes/estimate.php'); ?>


    <div class="dc-intro">
      <h2>Step 2 of 4: Location &amp; Permit Details</h2>
      <p>Time to focus on location. Calculate your shipping time and cost while figuring out your permits.</p>
    </div>

    <section class="dc-location dc-permit">
      <div class="row mb-5">
        <div class="col-sm-12 col-lg-4 offset-lg-2">
          <h3>Specify Your Location</h3>
        </div>
        <div class="col-sm-12 col-lg-4">
          <form id="zip-lookup">
            <input class="form-control" type="text" id="zip-label" placeholder="Enter Your ZIP" value="92101" />
            <input class="btn btn-primary btn-sm" type="button" value="Submit" id="submit-zip-lookup" />
            <i id="submit-zip-spinner" class="fa fa-spin fa-sync"></i>
            <span id="city-label"></span>
          </form>
          

        </div>
      </div>
      <!--
      <div class="row mb-5">
        <div class="col-sm-12 col-lg-6 offset-lg-2">
          <h3>Estimated Shipping Time</h3>
        </div>
        <div class="col-sm-12 col-lg-4">
          <span id="shipping-time-label">&mdash;</span>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-sm-12 col-lg-6 offset-lg-2">
          <h3>Shipping Costs</h3>
        </div>
        <div class="col-sm-12 col-lg-4">
          <span id="shipping-cost-label">&mdash;</span>
        </div>
      </div>
      
      <div class="row mb-0">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
          <a href="#" class="btn btn-video-trigger"><i class="fas fa-play"></i>Shipping and delivery overview video</a>
        </div>
      </div>
      -->

    </section>

    <section class="dc-permit-set">
      <div class="row mb-5">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
          <h2 class="text-center mb-5">
            <span id="permit-message"></span>
          </h2>
          
          <!--
          <div class="panel-group accordion" id="permit-notes" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="pheading0">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#permit-notes" href="#permits0" aria-expanded="true" aria-controls="permits0">
                Typical Permit Time
                <span id="permit-time-label">&mdash;</span>
                </a>
              </h4>
              </div>
              <div id="permits0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="pheading0">
              <div class="panel-body mb-4">
                <p>Text that describes permit times. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in sem aliquam, efficitur eros eu, vehicula elit. Donec metus sapien, sollicitudin vitae nibh eu, efficitur efficitur dui. In vitae dolor ex. Phasellus feugiat ligula ac orci ullamcorper, sit amet egestas dui auctor. Fusce sed laoreet purus.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="pheading1">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#permit-notes" href="#permits1" aria-expanded="true" aria-controls="permits1">
                Estimated Permit Cost
                <div id="permit-cost-label">&mdash;</div>
                </a>
              </h4>
              </div>
              <div id="permits1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="pheading1">
              <div class="panel-body mb-4">
                <p>Text that describes permit costs. Sed efficitur a massa eget rutrum. Ut sed mattis ante, a lacinia mi. In hac habitasse platea dictumst. Morbi a ligula eget lorem faucibus volutpat nec sed nibh. Ut non semper dui. Pellentesque sed tellus dictum, euismod urna et, convallis lorem. Nam vehicula leo eget dui lacinia gravida. Etiam eu augue vehicula, tempor augue ac, egestas mi. Quisque id nunc feugiat, mollis ipsum id, vulputate libero. Proin elit justo, pharetra ac vestibulum ac, euismod et tortor. Phasellus vehicula sem ac dapibus auctor. Nulla molestie malesuada sapien, pulvinar auctor erat tincidunt eu.</p>
              </div>
              </div>
            </div>
            --> 






        <div class="dc-permit-notes fade">
          <div class="card">
            <div class="card-body">
              <h5 class="card-subtitle mb-2 text-center">Information about building permits in <span id="permit-notes-city-label"></span></h5>
              <div id="permit-notes-text"></div>
            </div>
          </div>
        </div>





          </div>
        </div>


        <div class="row">
          <div class="col-sm-12 col-lg-8 offset-lg-2">
            <h2 class="text-center">Permit Plan Set by Studio Shed</h2>
              <div class="row mb-3">
                <div class="col-sm-12 col-lg-6">
                  <p>This supporting product is only necessary if you are required to permit your Studio Shed.</p>
                  <p>These permit plans are engineer-stamped architectural plans with foundation detail specific to your site.</p>

                  <p><strong>Includes:</strong> site, architectural, energy, structural, and electrical plans compliant with local codes for wind, snow, seismi, and soil.</p>
                  <p><strong>Excludes:</strong> submittal and other site work.</p>

                </div>
                <div class="col-sm-12 col-lg-6">
                  <img src="img/permit-plans.png" class="img-fluid" />
                </div>
              </div>

            <div class="row mb-5">
              <div class="col-md-6">
                <a href="#" id="select-permit-plans-false" data-permitPlans="false" data-permitPlans-price="0" class="btn btn-outline-primary btn-block option option-permitPlans">
                  <span class="label">DIY Permit Plans</span>
                  <span class="cost">+ $0</span>
                </a>
              </div>
              <div class="col-md-6">
                <a href="#" id="select-permit-plans-true" data-permitPlans="true" data-permitPlans-price="3995" class="btn btn-outline-primary btn-block option option-permitPlans">
                  <span class="label">Include the Permit Plan Set</span>
                  <span class="cost">+ $3,995</span>
                </a>
              </div>
            </div>
        </div>
      </div>




      <div class="row mb-2">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
          <a href="#" class="btn btn-video-trigger"><i class="fas fa-play"></i>Permit Process Overview</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
          <a href="#" class="btn btn-video-trigger"><i class="fas fa-file-alt"></i>How to Obtain a Site Survey</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
          <a href="#" class="btn btn-video-trigger"><i class="fas fa-file-alt"></i>Typical Factors to Consider for Permits</a>
        </div>
      </div>
    </section>



    <section class="dc-faq">
      <div class="row">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
          <h2 class="text-center mb-5">Frequently Asked Questions</h2>
          <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading0">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                Mauris scelerisque lacus consectetur elit consectetur, non faucibus massa iaculis?
                </a>
              </h4>
              </div>
              <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
              <div class="panel-body px-3 mb-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in sem aliquam, efficitur eros eu, vehicula elit. Donec metus sapien, sollicitudin vitae nibh eu, efficitur efficitur dui. In vitae dolor ex. Phasellus feugiat ligula ac orci ullamcorper, sit amet egestas dui auctor. Fusce sed laoreet purus. Curabitur aliquam sit amet nulla vel placerat. Donec id laoreet ligula, nec pharetra libero. Nunc imperdiet lorem ac rhoncus lacinia. Praesent cursus turpis eu metus ultrices laoreet. Nulla posuere ante ligula, eu elementum purus euismod sed. Ut ornare sit amet risus vitae cursus. Mauris posuere sed odio vitae viverra.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading1">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                Aliquam quis nisi id ex dapibus consequat in vitae magna?
                </a>
              </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
              <div class="panel-body px-3 mb-4">
                <p>Sed efficitur a massa eget rutrum. Ut sed mattis ante, a lacinia mi. In hac habitasse platea dictumst. Morbi a ligula eget lorem faucibus volutpat nec sed nibh. Ut non semper dui. Pellentesque sed tellus dictum, euismod urna et, convallis lorem. Nam vehicula leo eget dui lacinia gravida. Etiam eu augue vehicula, tempor augue ac, egestas mi. Quisque id nunc feugiat, mollis ipsum id, vulputate libero. Proin elit justo, pharetra ac vestibulum ac, euismod et tortor. Phasellus vehicula sem ac dapibus auctor. Nulla molestie malesuada sapien, pulvinar auctor erat tincidunt eu.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading2">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                Nunc arcu enim, rutrum at nisi eu, iaculis ultricies neque. Nam in scelerisque urn?
                </a>
              </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body px-3 mb-4">
                <p>Nunc auctor nisl hendrerit, semper quam nec, varius neque. Pellentesque ac dui nec arcu molestie posuere non ut quam. Phasellus tempus viverra dui, at venenatis orci sollicitudin rhoncus. Duis nec libero finibus, malesuada libero sit amet, ultricies ex. Sed sodales rutrum fermentum.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading3">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                Nullam non urna placerat, aliquet velit vel, eleifend turpis. Integer rhoncus ut purus non pharetra?
                </a>
              </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
              <div class="panel-body px-3 mb-4">
                <p>Cras scelerisque finibus magna sed tempus. Donec porta pulvinar urna, nec faucibus felis vulputate a. Mauris fermentum fringilla arcu, eu feugiat erat vulputate non. In posuere odio leo, id cursus felis condimentum a. Sed convallis, lacus ut facilisis accumsan, lacus dolor placerat massa, tempus dapibus neque diam ut quam. Sed mollis, neque eget tincidunt volutpat, erat leo cursus tortor, et ultrices metus libero ut arcu. Duis euismod mauris et ex aliquet, nec lobortis diam elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce dolor enim, fringilla in facilisis pretium, interdum a nulla. Maecenas scelerisque commodo sem, sed eleifend velit euismod non.</p>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <?php include('includes/contact.php'); ?>

    <?php include('includes/paging.php'); ?>

  </div>
</main>
<script type="text/javascript">
$(document).ready(function() {
  $('#progress-step-2').addClass('current');
});
</script>
<?php include('includes/footer.php'); ?>