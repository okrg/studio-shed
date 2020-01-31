<?php include('includes/header.php'); ?>
<main id="step-2">
  <div class="container">
    <?php include('includes/estimate.php'); ?>


    <div class="dc-intro">
      <h2>Step 2 of 4: Location &amp; Permit Details</h2>
      <p>Short introduction about this page and basic instructions on how to use it.</p>
    </div>

    <section class="dc-location">
      <div class="row mb-5">
        <div class="col-sm-12 col-lg-6 offset-lg-2">
          <h3>Specify Your Location</h3>
        </div>
        <div class="col-sm-12 col-lg-4">
          
          <form id="zip-lookup">
            <input class="form-control" type="text" id="zip-label" placeholder="Enter Your ZIP Code" value="92101"></input>
            <input class="btn btn-primary btn-sm" type="button" value="Submit" id="submit-zip-lookup"></input>
            <i id="submit-zip-spinner" class="fa fa-spin fa-sync"></i>
          </form>
          <span id="city-label"></span>

        </div>
      </div>
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
    </section>


    <section class="dc-permit">
      <div class="row">
        <div class="col-sm-8 offset-2">
          <h2 class="text-center mb-5">Based off your location and shed configuration, you may be required to obtain local building permits.</h2>
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
                <!--<div class="permit-disclaimer">(Paid to the local permit authority)</div>-->
                </a>
              </h4>
              </div>
              <div id="permits1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="pheading1">
              <div class="panel-body mb-4">
                <p>Text that describes permit costs. Sed efficitur a massa eget rutrum. Ut sed mattis ante, a lacinia mi. In hac habitasse platea dictumst. Morbi a ligula eget lorem faucibus volutpat nec sed nibh. Ut non semper dui. Pellentesque sed tellus dictum, euismod urna et, convallis lorem. Nam vehicula leo eget dui lacinia gravida. Etiam eu augue vehicula, tempor augue ac, egestas mi. Quisque id nunc feugiat, mollis ipsum id, vulputate libero. Proin elit justo, pharetra ac vestibulum ac, euismod et tortor. Phasellus vehicula sem ac dapibus auctor. Nulla molestie malesuada sapien, pulvinar auctor erat tincidunt eu.</p>
              </div>
              </div>
            </div>

            <div class="dc-permit-notes card fade">
              <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Additional Notes about Permits</h6>
                <div id="permit-notes-text"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dc-permit-set">
      <div class="row">
        <div class="col-sm-8 offset-2">
          <div class="panel-group accordion" id="permit-plans" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="plheading0">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#permit-plans" href="#plans0" aria-expanded="true" aria-controls="plans0">
                Permit Plan Set
                <span id="permit-plan-label">$1,300</span>
                </a>
              </h4>
              </div>
              <div id="plans0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="plheading0">
              <div class="panel-body mb-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in sem aliquam, efficitur eros eu, vehicula elit. Donec metus sapien, sollicitudin vitae nibh eu, efficitur efficitur dui. In vitae dolor ex. Phasellus feugiat ligula ac orci ullamcorper, sit amet egestas dui auctor. Fusce sed laoreet purus. Curabitur aliquam sit amet nulla vel placerat. Donec id laoreet ligula, nec pharetra libero. Nunc imperdiet lorem ac rhoncus lacinia. Praesent cursus turpis eu metus ultrices laoreet. Nulla posuere ante ligula, eu elementum purus euismod sed. Ut ornare sit amet risus vitae cursus. Mauris posuere sed odio vitae viverra.</p>
                <div class="row">
                  <div class="col-sm-12 col-lg-6">
                    <strong>Permit plan set includes:</strong>
                    <ul>
                      <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in sem aliquam, efficitur eros eu, vehicula elit.</li>
                      <li>Donec metus sapien, sollicitudin vitae nibh eu, efficitur efficitur dui.</li>
                      <li>In vitae dolor ex. Phasellus feugiat ligula ac orci ullamcorper, sit amet egestas dui auctor.</li>
                      <li>Fusce sed laoreet purus. Curabitur aliquam sit amet nulla vel placerat.</li>
                    </ul>
                  </div>
                  <div class="col-sm-12 col-lg-6">
                    <img src="img/permit-plans.png" class="img-fluid" />
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-8 offset-2">
          <a href="#" class="btn btn-video-trigger"><i class="fas fa-play"></i>Permit Process Overview</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-8 offset-2">
          <a href="#" class="btn btn-video-trigger"><i class="fas fa-file-alt"></i>How to Obtain a Site Survey</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-8 offset-2">
          <a href="#" class="btn btn-video-trigger"><i class="fas fa-file-alt"></i>Typical Factors to Consider for Permits</a>
        </div>
      </div>
    </section>



    <section class="dc-faq">
      <div class="row">
        <div class="col-sm-8 offset-2">
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

    <?php include('includes/paging.php'); ?>

    <?php include('includes/contact.php'); ?>

  </div>
</main>
<?php include('includes/footer.php'); ?>