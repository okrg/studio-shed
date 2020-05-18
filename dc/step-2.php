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
            <input tabindex="-1" class="form-control" type="text" id="zip-label" placeholder="Enter Your ZIP" value="92101" />
            <input tabindex="-1" class="btn btn-primary btn-sm" type="button" value="Submit" id="submit-zip-lookup" />
            <i id="submit-zip-spinner" class="fa fa-spin fa-sync"></i>
            <span id="city-label"></span>
          </form>


        </div>
      </div>
    </section>

    <section class="dc-permit-set">
      <div class="row mb-5">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
          <h2 class="text-center mb-5">
            <span id="permit-message"></span>
          </h2>
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
              <a href="#" tabindex="-1" id="select-permit-plans-false" data-permitPlans="false" data-permitPlans-price="0" class="btn btn-outline-primary btn-block option option-permitPlans">
                <span class="label">DIY Permit Plans</span>
                <span class="cost">+ $0</span>
              </a>
            </div>
            <div class="col-md-6">
              <a href="#" tabindex="-1" id="select-permit-plans-true" data-permitPlans="true" data-permitPlans-price="3995" class="btn btn-outline-primary btn-block option option-permitPlans">
                <span class="label">Include the Permit Plan Set</span>
                <span class="cost">+ $3,995</span>
              </a>
            </div>
          </div>
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
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">How do I know if I need a permit?</a>
              </h4>
              </div>
              <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
              <div class="panel-body mb-4">
                <p>Local regulations for accessory buildings and studios vary widely across the country, and even within localities. The best way to confirm is to place a call to your local building department. While permitting your project will take more time and involve some additional cost, it will also become properly recorded additional square footage for your residence, which is desirable when selling or appraising your home.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading1">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">Who is responsible for the different parts of the permit process?</a>
              </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
              <div class="panel-body mb-4">
                <p>Studio Shed will prepare a full plan-set document package showing every detail of your Studio Shed structure or dwelling, compliance with all applicable codes, electrical and plumbing layouts, foundation details, and compliance with specific items such as Title 24 energy code in California. The homeowner may need to assist in gathering information to facilitate the creation of this document, such as obtaining a site survey if required, or similar site-specific need. The homeowner is also responsible for the delivery of the permit package to the local municipality.</p>
                <p>If there are comments or revisions from the building department, Studio Shed will address these and make appropriate changes for a timely resubmittal. The homeowner is responsible for applicable permit fees charged by their local municipality.</p>
              </div>
              </div>
            </div>

            <div class="panel panel-default mb-5">
              <div class="panel-heading" role="tab" id="heading2">
              <h4 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">How long does the permit process take?</a>
              </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body mb-4">
                <p>This varies widely by location and can range from 1-day (yes, true) to several months in some areas. Once an order is finalized, it typically takes 3-4 weeks to create a detailed enough plan set to support likely permit approval. Review is at the discretion of the building department, and this is the most lengthy part of the process. Once the permit is approved, your Studio Shed will be ready for shipment in approximately 4 weeks.</p>
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

  $('#zip-label').keypress(function (e) {
    if (e.which == 13) {
      $('#submit-zip-lookup').trigger('click');
      return false;
    }
  });

  $('li[data-progress-step="2"]').addClass('current');
  getUidCookie()
    .then(getCart)
    .then(renderCartLabels)
    .then(renderShippingElements)
    .then(renderPermitElements)
    .then(cartRenderDone);
});
</script>
<?php include('includes/footer.php'); ?>