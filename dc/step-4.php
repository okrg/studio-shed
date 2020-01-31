<?php include('includes/header.php'); ?>
<main id="step-4">
  <div class="container">
    <?php include('includes/estimate.php'); ?>

    <section class="dc-intro">
      <h2>Step 4 of 4: Complete Your Order</h2>
      <p>Short introduction about this page and basic instructions on how to use it.</p>
    </section>

    <section class="dc-payment-checkout">
      <div class="row">
        <div class="col-md-8 offset-2">
        <h2 class="text-center ">Final Estimate: <span id="final-estimate">&mdash;</span></h2>
        <h2 class="text-center initial-payment">Initial Payment: <span id="initial-payment">&mdash;</span></h2>
        <p class="text-center">*You will be charged the initial payment of 50% of the final estimate. The remaining amount, including taxes, will be charged upon final shipment.</p>
        <form class="" action="/dc/checkout" method="get">
          <div class="form-group mb-2 w-75 mx-auto">
            <input type="text" placeholder="Enter Referral Code" class="form-control" />
          </div>
          <div class="form-group mb-2 text-center">
          <button type="submit" class="btn btn-primary">Checkout <i class="fas fa-arrow-right"></i></button>
         </div>
        </form>
        </div>
      </div>
    </section>

    <section class="dc-payment-contact">
      <div class="row">
        <div class="col-md-8 offset-2">
          <h2 class="text-center initial-payment">Contact us to help you get started</h2>
          <p class="text-center">Quisque tincidunt est a felis ullamcorper, at varius leo vulputate. Ut mi turpis, feugiat quis lacinia ac, sollicitudin ut ante.  Sed massa augue, sollicitudin in bibendum tristique, tincidunt eu nisi.</p>
          <div class="contact-buttons text-center">
            <a href="#" class="btn btn-primary mb-3 mr-5">Schedule a Call <i class="fas fa-arrow-right"></i></a>
            <a href="#" class="btn btn-primary mb-3">Send a Message <i class="fas fa-arrow-right"></i></a>
          </div>
          <div class="contact-links text-center">
            <div><a href="mailto: answers@studioshed.com">answers@studioshed.com</a></div>
            <div><a href="tel:888-900-3933">(888) 900-3933</a></div>
          </div>
        </div>
      </div>
    </section>

    <section class="dc-finance">
      <div class="row">
        <div class="col-md-8 offset-2">
          <h2 class="text-center initial-payment">Financing available from Guaranteed Rate</h2>
          <p class="text-center">Quisque tincidunt est a felis ullamcorper, at varius leo vulputate. Ut mi turpis, feugiat quis lacinia ac, sollicitudin ut ante.  Sed massa augue, sollicitudin in bibendum tristique, tincidunt eu nisi.</p>
          <div class="finance-embed">
            <span>Embedded Loan Calculator (if possible)</span>
          </div>
          <div class="finance-cta text-center">
            <h2>Do you want to apply for finance?</h2>
            <a href="#" class="btn btn-primary mt-4">Apply Now <i class="fas fa-arrow-right"></i></a>
          </div>
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

    <?php include('includes/contact.php'); ?>

    <?php include('includes/paging.php'); ?>


  </div>
</main>
<?php include('includes/footer.php'); ?>