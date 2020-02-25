<?php include('includes/header.php'); ?>

<?php
require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_QhcInpwY7RzwSEINOicTQPNM00pNL7f8Av');

if(isset($_REQUEST['stripeFee'])) {
  $amount = (int)$_REQUEST['stripeFee'];
  $intent = \Stripe\PaymentIntent::create([
    'amount' => $amount,
    'currency' => 'usd',
  ]);
}
?>
<script type="text/javascript">
  var stripe = Stripe('pk_test_fOnxYRdPKxD6UIEVyOm1LA5p00JLrteEOh');
  var clientSecret = '<?php echo $intent->client_secret; ?>';
  var elements = stripe.elements();
</script>


<main id="step-4">
  <div class="container">

    <section class="dc-checkout-intro">
      <h2 class="text-center mb-5">Checkout</h2>
      <div class="row">
        <div class="col-md-8 offset-2">
        <h2 class="text-center ">Final Estimate: <span id="final-estimate">&mdash;</span></h2>
        <h2 class="text-center initial-payment">Initial Payment: <span id="initial-payment">&mdash;</span></h2>
        <p class="text-center">*You will be charged the initial payment of 50% of the final estimate. The remaining amount, including taxes, will be charged upon final shipment.</p>
        </div>
      </div>
    </section>

    <section class="dc-checkout-form">
      <div class="row">
        <div class="col-md-8 offset-2">

          <div id="checkout">
      <form id="payment-form" method="POST" action="/orders">
        <section>
          <h2>Shipping &amp; Billing Information</h2>
          <fieldset class="with-state">
            <label>
              <span>Name</span>
              <input name="name" id="billing-name" class="field" required>
            </label>
            <label>
              <span>Email</span>
              <input name="email" id="billing-email" type="email" class="field" required>
            </label>
            <label>
              <span>Address</span>
              <input name="address" id="billing-address" class="field">
            </label>
            <label>
              <span>City</span>
              <input name="city" id="billing-city" class="field">
            </label>
            <label class="state">
              <span>State</span>
              <input name="state" id="billing-state" class="field">
            </label>
            <label class="zip">
              <span>ZIP</span>
              <input name="postal_code" id="billing-zip" class="field">
            </label>
          </fieldset>
        </section>
        <section>
          <h2>Payment Information</h2>
          <nav id="payment-methods">
            <ul>
              <li>
                <input type="radio" name="payment" id="payment-card" value="card" checked>
                <label for="payment-card">Card</label>
              </li>
            </ul>
          </nav>
          <div class="payment-info visible">
            <fieldset>
              <label>
                <span>Card</span>
                <div id="card-element" class="field"></div>
              </label>
            </fieldset>
          </div>
          <div class="payment-info redirect">
            <p class="notice">You’ll be redirected to the banking site to complete your payment.</p>
          </div>
          <div class="payment-info receiver">
            <p class="notice">Payment information will be provided after you place the order.</p>
          </div>
        </section>

        <div id="consent" class="field consent">
          <input class="form-check-input" type="checkbox" id="consent-check" required name="consent">
          <label class="form-check-label" for="consent-check">
            I understand and agree to the <a href="#terms" data-toggle="modal" data-target="#termsModal">Terms and Conditions</a>.
          </label>
        </div>


        <button disabled class="payment-button disabled" type="submit" id="submit">Pay</button>

        <div id="card-errors" class="element-errors"></div>

      </form>
      
      </div>
      <div id="confirmation">
        <div class="status processing">
          <h1>Completing your order…</h1>
          <p>We’re just waiting for the confirmation from your bank… This might take a moment but feel free to close this page.</p>
          <p>We’ll send your receipt via email shortly.</p>
        </div>
        <div class="status success">
          <h1>Thanks for your order!</h1>
          <p>Woot! You successfully made a payment with Stripe.</p>
          <p class="note">We just sent your receipt to your email address, and your items will be on their way shortly.</p>
        </div>
        <div class="status receiver">
          <h1>Thanks! One last step!</h1>
          <p>Please make a payment using the details below to complete your order.</p>
          <div class="info"></div>
        </div>
        <div class="status error">
          <h1>Oops, payment failed.</h1>
          <p>It looks like your order could not be paid at this time. Please try again or select a different payment option.</p>
          <p class="error-message"></p>
        </div>
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

    <?php include('includes/paging.php'); ?>

  </div>
</main>


<!-- Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="termsModalTitle">Terms and Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div id="content" class="container one-column">
    <h2>1. PAYMENT, CANCELLATIONS, SHIPPING AND DELIVERY, FORMS OF PAYMENT</h2>
<p>(A) Payment. You the customer (Customer) agree to pay Studio Shed in accordance with the following (Payment Terms):</p>
<p>(i) <strong>Unpermitted units</strong>: 100% payment due in full at time of order. &nbsp;<strong>Permitted units</strong>: 50% deposit due at time of Order, 50% due four weeks (28 days) prior to the estimated ship date.</p>
<p>Failure to comply with the Payment Terms will result in the loss or exclusion of any promotional discounts extended by Studio Shed as part of the Price (see below), including but not limited to free shipping, product discount or any other promotional offers. &nbsp;Failure to pay on-time will also likely result in the delay of the shipment.</p>
<p>Interest shall accrue on any past due sums at the greater of 18% A.P.R. or the highest interest rate allowed by law.</p>
<p><strong>All prices are subject to change if Product is not shipped within three (3) months of Order date for unpermitted product and six (6) months for permitted product.</strong></p>
<p>(B) Cancellations. Cancellations may be made within 48 hours of time an Order is received. Any cancellation made after 48 hours of the time the Order is received will be subject to a minimum $1,500 cancellation fee plus any costs incurred by Studio Shed related to the Order. Refunds will be processed within thirty (30) days from the date the Order is cancelled.</p>
<p>(C) Shipping &amp; Delivery. Shipping and delivery are handled through a certified freight company. Product is packaged in a warehouse.</p>
<p>(D) Forms of Payment. Work will not begin on any Order until funds have cleared. Studio Shed accepts all major forms of payment including: wire transfers, cash, debit cards and credit cards.</p>
<h2>2. ORDERS</h2>
<p>It is the Customer’s responsibility to make sure the product ordered meets local codes or rules that may apply. Orders remain in a pending status until acknowledged and accepted by Studio Shed and Studio Shed has received a valid form of payment. Studio Shed’s acceptance of Customer’s Order is expressly conditioned upon Customer’s acceptance of the terms and conditions herein. Any modification to the terms and conditions must be accepted by Studio Shed in writing.</p>
<h2>3. PRICES AND QUOTATIONS</h2>
<p>Unless specifically agreed to in advance by Studio Shed, all Product prices shall be Studio Shed’s list prices in effect at the time Customer’s Order is received (the “Price”). The Price does not include sales or other taxes, if applicable. In addition to the Price, Customer agrees to pay (either directly to the appropriate governmental entity or to Studio Shed) any sales or other tax due under any applicable law. &nbsp; Changes to Customer’s Order may result in Price changes, including but not limited to, changes as a result of permitting and engineering specifications necessitated by local building or other codes. &nbsp;Changes within four (4) weeks of the ship date will be subject to a minimum $150 change fee. To the extent changes within four (4) weeks of the ship date require a change to the Ship Date, Customer may incur the loss or exclusion of any promotional discounts extended by Studio Shed as part of the Price, including but not limited to free shipping, product discount or any other promotional offers.&nbsp;Orders changed after Order is confirmed could be subject to product price differences and a processing fee of $125.00 per change. &nbsp;Changes to shipping schedule may result in weekly storage fees of $500.00 per week.</p>
<h2>4. DIY AND INSTALLATION SERVICES</h2>
<p><strong>There are two ways to order Product, either Do-It-Yourself (“DIY”) or Installation Service.</strong></p>
<p>(A) Do-It-Yourself. As the name implies, DIY requires Customer to install the Product yourself. If Customer order a DIY kit, Customer are solely responsible for all necessary permits and any applicable architectural or engineering work (unless Customer have purchased Studio Shed’s Full Permit Plan Set and Engineer Stamped Drawings), foundational work (including site preparation), as well as the installation and assembly of the Product. Studio Shed accepts no responsibility or liability related to a DIY installation. Customer is solely responsible for complying with all applicable building and safety codes in the installation of the Product.</p>
<p>(B) Installation Service. If Customer chooses Studio Shed’s Installation Services (the “Installation Services”):</p>
<p>(i) Certified Installer. Customer authorizes Studio Shed to do the following on Customer’s behalf to:</p>
<p>(a) Arrange for the Installation Services to be performed by an independent contractor (licensed when legally required) (“Certified Installer”).</p>
<p>(b) Issue a work order to the Certified Installer to perform the Installation Services.</p>
<p>(c) Have the Certified Installer’s work inspected, should Studio Shed in its discretion choose to do so but Customer agrees that Studio Shed has no obligation to do so.</p>
<p>(d) Pay the Certified Installer after the completion of the work and after receipt of a certificate, signed by Customer or on Customer’s behalf, stating that the work has been satisfactorily completed (the “Certificate of Completion”).</p>
<p>(ii) At the time of completion of the Installation Services, Customer and the Certified Installer will perform a final walk-through inspection and execute a Certificate of Completion. If Customer is not available at the time of completion of the Installation Services, the Certified Installer will perform a final walk-through inspection without Customer and execute a Certificate of Completion on Customer’s behalf. Studio Shed will rely upon the Certificate of Completion (whether signed by Customer or the Certified Installer on Customer’s behalf) in paying the Certified Installer for the Installation Services. Final payment to Studio Shed is due upon the final walk-through inspection.</p>
<p>(iii) The Certified Installer is an Independent Contractor. CUSTOMER AGREES THAT THE CERTIFIED INSTALLER WILL PERFORM THE INSTALLATION SERVICES ACTING AS AN INDEPENDENT CONTRACTOR AND THAT STUDIO SHED SHALL HAVE NO LIABILITY FOR ANY ACT OF THE CERTIFIED INSTALLER. &nbsp;CUSTOMER FURTHER UNDERSTANDS AND AGREES STUDIO SHED DOES NOT GUARANTEE ANY TIMEFRAMES ASSOCIATED WITH INSTALLED PRODUCT.</p>
<p>(iv) Services Not Included. Unless otherwise agreed to by Studio Shed in writing, Customer agrees that the Price for Installation Services does not include architectural/engineering services, the permit fee, foundational work including site preparation or structural changes to the land upon which the Product is to be installed (the “Premises”) or any other services beyond the ordinary and routine installation of the Product.&nbsp; Installers may bill Customer directly for installation sites that are more than 100 feet from the site at which the Product is offloaded (carry distance).</p>
<p>(C) Customer’s Responsibilities. Unless otherwise agreed by Studio Shed in writing:</p>
<p>(i) Customer represents and warrants that Customer’s site is free and clear of debris, the work area is free of vermin, and pre-existing physical or environmental hazards, and building/zoning code violations.</p>
<p>(ii) Customer represents and warrants that, if the Product will be installed on a concrete slab, that the concrete slab is both square and level within 1/4″ of an inch. If the slab is not square and/ or out of level by more than 1/4″, Customer will be billed by the Certified Installer for any added labor time resulting from the said slab being out of level, or, Studio Shed may, at its option, elect to delay installation of the Product until the concrete foundation is square and level.</p>
<p>(iii) If installation will be on a wood-framed floor system or foundation, Customer represents and warrants that the area the floor will be constructed on is level within 4″. If the area where the Product is to be installed is out of level more than 4″, Customer will be billed by the Certified Installer to level said area, or Studio Shed may, at its option, elect not to install the Product until the floating floor area is level.</p>
<p>(iv) Customer represents and warrants that any security system at the installation site will not interfere with performance of the Installation Services.</p>
<p>(v) Customer agrees to facilitate the location of utility lines and identifying property lines.</p>
<p>(vi) Customer agrees not to impede the delivery of the Product including, but not limited to, moving cars, objects or any other personal property that may be in the way. Customer agrees to provide the Certified Installer with access to work areas during working hours and to provide access to sanitary facilities or to pay the rental costs for such facilities.</p>
<p>(vii) Customer agrees to provide power to the work areas. If power is not available within 150 feet of the installation site, Customer may be billed by the Certified Installer for the use of a generator to supply power.</p>
<p>(viii) Customer agrees not to allow unattended minors at the work area while the Certified Installer is present.</p>
<p>(ix) Customer agrees to control and keep pets away from work areas.</p>
<p>(x) Customer agrees that the site has clearance of at least 2′ (2 feet) around installation site. &nbsp;Additional costs may incur and will be billed to Customer by Installer.</p>
<p>(xi) Customer promises to acquire at Customer’s own cost and expense, all required permits and to keep such permits on display at all times. In the event that the Certified Installer determines that a building permit is necessary and Customer has not obtained a building permit or Customer has obtained a building permit but the building permit is deficient, then the Certified Installer and Studio Shed may suspend all installation responsibilities of either or both of them until such time as the appropriate building permit is issued. Neither Studio Shed nor the Certified Installer shall have any obligation to make sure that Customer has an appropriate building permit.</p>
<p>(xii) Customer agrees that if Customer or anyone Customer controls interferes with or delays performance of the Installation Services, Customer may be subject to transportation/storage charges or other resulting charges.</p>
<p>(xiii) Any condition of the site or work area that is not in the condition represented or promised by Customer or any other condition that is not as represented, agreed to or promised by Customer above is an “Unfit Condition” (as further defined in Section 4(a) below).</p>
<p>(a) Unfit Conditions. The Price for Installation Service assumes sound existing substructures, superstructure and points of attachments. If any condition is not as represented or promised by Customer as set forth in Section 4(b)(v) above or if there are any defective substructures, superstructures, points of attachments or the existence of any other defect, weakness, or dangerous condition including, but not limited to, un-level, not square, mold, mildew, rot, asbestos or infestation (collectively, “Unfit Conditions”), then Studio Sheds may, at its election, suspend Installation Services until such Unfit Conditions are remedied by Customer to Studio Shed’s satisfaction at Customer’s sole cost and expense or it may increase the Price by the cost and reasonable profit to Studio Shed of having to provide additional products, services, and/or Installation Services as a result of the Unfit Conditions. If Studio Sheds elects to increase its Price Customer will be required to execute a change order reflecting the Price change and to pay the additional Price at the time of the execution of the change order. In the event that Customer does not execute a change order and pay the additional price at the time of execution of the change order or eliminate all Unfit Conditions yourself, then Studio Sheds is excused from any further performance of Installation Services and shall be entitled to retain all monies previously paid by Customer and shall have no obligation to restore the Premises to their original condition.</p>
<p>(xiii) Claims. Customer agrees that any claim against Studio Shed or the Certified Installer relating to Customer’s purchase or the Installation Services must be made to Studio Shed within thirty (30) calendar days of the date Customer first becomes aware of the problem or such claim will be deemed waived. Studio Shed will attempt resolution of any claim(s) within sixty (60) calendar days of receipt of Customer’s notice.</p>
<p>(xiv) CUSTOMER AGREES TO PROVIDE STUDIO SHED WITH THE EXACT LOCATION REQUIREMENTS AND ORIENTATION FOR PURCHASED PRODUCTS PRIOR TO INSTALLATION. PRICES QUOTED BY STUDIO SHED FOR INSTALLED PRODUCT ASSUME A LEVEL WORK AREA NOT MORE THAN 100 FEET FROM THE POINT OF DELIVERY. IF THE LOCATION, ORIENTATION, OR ANYTHING ELSE RELATED TO THE PRODUCT CHANGES DURING INSTALLATION, CUSTOMER WILL BE RESPONSIBLE FOR ANY AND ALL CHARGES ASSOCIATED WITH THE ADDED INSTALLATION COSTS AND WILL BE BILLED DIRECTLY BY THE CERTIFIED INSTALLER.</p>
<h2>5. PERMITS</h2>
<p>In the event Customer’s Product requires a permit, Studio Shed offers a flat rate – $11.00 / square foot – to create an architectural plan set and (when necessary) provide a stamp from a third party engineering firm. If Customer purchases this product, Customer authorizes Studio Shed on Customer’s behalf to provide Customer with a set of plans to assist Customer in attaining a permit from Customer’s local municipality. Customer is responsible for paying fees associated with all application and permit fees, and taxes, to the appropriate governmental agency. &nbsp;If Customer does not purchase the architectural plan set, and the Product requires a permit or Product modifications to meet municipal codes,&nbsp;Customer will be charged $125 / hour, plus engineering fees (if applicable) and any Product change fees as outlined in Section 3 (Prices and Quotations).</p>
<h2>6. DELIVERY AND FORCE MAJEURE</h2>
<p>Any and all shipping, delivery, and installation dates are estimates only, and Studio Shed does not guarantee that the Product will be shipped, delivered, or installed in accordance with such estimates. Without limiting the generality of the foregoing, Studio Shed may delay delivery of the Product without any liability therefore as a result of any delay caused by events outside Studio Shed’s reasonable control including, but not limited to, work stoppages, labor difficulties, Studio Shed’s inability to obtain necessary materials, components, labor, or manufacturing facilities, or anything else that would in any way impair Studio Shed’s ability to deliver the Product in the quantities ordered at the prices quoted. &nbsp;Installation Services: Customer agrees that any deliveries that are more than 150′ from the installation site may incur additional charges, and will be billed to Customer by Installer.</p>
<p><strong>QUOTED SHIPPING RATES ARE FOR MAJOR METROPOLITAN AREAS; SURCHARGES FOR RURAL OR LIMITED ACCESS DELIVERIES COULD APPLY AND WILL BE COMMUNICATED TO CUSTOMER PRIOR TO SHIPMENT.</strong></p>
<h2>7. SHIPMENT AND TITLE</h2>
<p>Customer is deemed to have received the Product when Customer picks up the Product from Studio Shed’s warehouses or upon delivery of the Product to Customer’s delivery address. Studio Shed shall bear all risk of loss and casualty to the Product until such time as the Product has been received or deemed to have been received by Customer. Customer shall bear all risk of loss and casualty to the Product upon and after the Product has been received or deemed to have been received by Customer. If the Product is delivered to Customer’s delivery address, Customer is solely responsible for and will insure against loss or casualty incurred during and after the unloading process at such location. Customer is solely responsible to inspect the Product upon receipt for any visible damages incurred during shipping before signing off with the delivery service.&nbsp;If upon inspecting the shipment Customer notices&nbsp;visible&nbsp;damage, Customer is to notify Studio Shed&nbsp;immediately. Adhering to freight law, Studio Shed prohibits the rejection of any and all pieces, damaged or undamaged. In the event of concealed damage, Customer is to notify Studio Shed at first&nbsp;opportunity.</p>
<p>Upon signing the delivery papers by Customer or on Customer’s behalf, Customer is solely responsible for the Product and any and all costs associated with the Product with the exception of concealed damage.</p>
<h2>8. RETURNS</h2>
<p>Product may be returned only with the prior written authorization of Studio Shed, in Studio Shed’s sole discretion. If Studio Shed authorizes a return, a return authorization number will be assigned to Customer by Studio Shed. The return authorization number must be marked on the shipping container for the Product being returned. Any Product so returned shall be subject to a restocking fee of at minimum of 30% of the purchase Price. Customer will be responsible for all return shipping costs. Customer shall bear the risk of loss during shipment with respect to any such returned Product and shall be responsible for insuring the Product for its purchase price. Any Product returned to Studio Shed without prior authorization shall be returned to Customer, freight collect. Studio Shed may place in storage any Product for which shipment is delayed by Customer’s inability or unwillingness to pay for and receive the Product. Such storage by Studio Shed shall be for Customer’s account at Customer’s expense, and the Product so stored shall be at Customer’s risk while stored.</p>
<h2>9. LIMITED WARRANTY</h2>
<p>Studio Shed warrants to the original purchaser of the Product that, should there be any defects in the material or workmanship during the initial 12 months (one year) from Customer’s receipt of the Product, Studio Shed will either repair or replace the covered defects. Visual imperfections outside the Product’s standard manufacturing and quality specification parameters including scratches, blemishes, or other imperfections, unless readily observable more than 4 feet away, are not covered. Customer must notify Studio Shed of any claim of defects in the material or workmanship within twelve (12) months after Customer’s receipt of the Product. Said notice must be in writing via online form, set forth specifically the basis for the claim, and include a photograph of the defect(s). The failure to satisfy the requirements above will constitute irrevocable acceptance of the Product. All warranty claim notices should filled out <a href="https://studioshed.wufoo.com/forms/z6zbvqz02z5jol/">via online form here</a>. This warranty gives Customer specific legal rights. (Customer may also have other rights which may vary from state to state). Failure to follow the Construction Manual or any related instructions, and any abuse or misuse of the Product including unauthorized alterations, will void this Limited Warranty. Studio Shed is not responsible for damage caused by the location of the Product on or over inappropriate soils or terrain or by the use of improper replacement parts. Studio Shed assumes no responsibility and expressly disclaims all liabilities for damages due to misuse, neglect, improper maintenance or adjustments, and normal wear and tear of the Product. Studio Shed reserves the right to change and/or improve the design and/or specifications of the Product without notice or obligation to modify previously produced units. No installation or other instructions, advice, Product information, or marketing materials, whether oral or written, obtained by Customer at any time from Studio Shed or any vendor or retailer of Studio Shed Products shall create any Studio Shed express warranty not expressly stated in this Section.</p>
<p>STUDIO SHED MAKES NO EXPRESS WARRANTIES EXCEPT AS STATED IN THIS SECTION. ANY AND ALL EXPRESS OR IMPLIED WARRANTIES, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE, SHALL TERMINATE THREE HUNDRED SIXTY FIVE (365) DAYS FROM CUSTOMER’S RECEIPT OF THE PRODUCT. (SOME STATES DO NOT ALLOW LIMITATIONS ON HOW LONG AN IMPLIED WARRANTY LASTS, SO THE ABOVE LIMITATION MAY NOT APPLY TO CUSTOMER.)</p>
<h2>10. INDEMNIFICATION</h2>
<p>Customer agrees to defend, with counsel approved by Studio Shed, all actions against Studio Shed, its officers, directors, managers, shareholders, members, employees, agents, beneficiaries, successors, and other representatives (the “Indemnified Parties”) with respect to, and to pay, protect, and indemnify and save harmless all Indemnified Parties from and against, any and all liabilities, losses, damages, costs, expenses (including reasonable attorneys’ fees and expenses), causes of action, suits, claims, demands, or judgments of any nature arising from or relating to the injury to or death of any person, or damage to or loss of property, caused by or incurred in connection with Customer’s use or misuse of the Product.</p>
<p>LIMITATION OF LIABILITY. IN NO EVENT SHALL STUDIO SHED BE LIABLE FOR LOST PROFITS, BUSINESS INTERUPTION, LOST BUSINESS OPPORTUNITIES, OR ANY OTHER INDIRECT, SPECIAL, PUNITIVE, EXEMPLARY, INCIDENTAL, OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR RELATING TO THE THESE TERMS AND CONDITIONS OR CUSTOMER’S PURCHASE OF PRODUCT (WHETHER IN CONTRACT, WARRANTY, TORT (INCLUDING NEGLIGENCE WHETHER ACTIVE, PASSIVE, OR IMPUTED), PRODUCT LIABILITY, STRICT LIABILITY, OR OTHER THEORY), EVEN IF STUDIO SHED HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>
<p>IN NO EVENT SHALL THE STUDIO SHED’S AGGREGATE LIABILITY WHETHER IN CONTRACT, WARRANTY, OR TORT, INCLUDING NEGLIGENCE WHETHER ACTIVE, PASSIVE, OR IMPUTED, PRODUCT LIABILITY, STRICT LIABILITY, OR OTHER THEORY, EXCEED THE PRICE PAID BY CUSTOMER TO STUDIO SHED.</p>
<p>(Certain state laws do not allow the exclusion or limitation of certain damages. If these laws apply, some or all of the above exclusions or limitations may not apply to Customer, and Customer may have additional rights to those contained herein. In such states, Studio Shed’s liability is limited to the greatest extent permitted by law.)</p>
<h2>11. TRADEMARKS AND TRADENAMES</h2>
<p>Customer acknowledges and agrees that all brand names, trade names, and trademarks incorporated onto or associated with the Product (collectively, the “Marks”) purchased hereunder are the exclusive property of Studio Shed and that Customer shall not acquire any rights in any of the Marks by purchasing the Product. Customer shall not make any use of the Marks at any time except as otherwise authorized by Studio Shed in writing.</p>
<h2>12. PROPRIETARY INFORMATION/NONDISCLOSURE</h2>
<p>Customer acknowledges and agrees that any knowledge or information, including drawings, designs, specifications, plans, and data, that Studio Shed may have disclosed or may hereafter disclosed to Customer incident to the placing and filling of an Order shall, at all times, remain the exclusive property of Studio Shed, and Customer shall acquire no interest in, or right with respect to, such proprietary information unless otherwise stated in writing by Studio Shed. Customer further acknowledges and agrees that such proprietary information constitutes valuable, special, and unique business assets of Studio Shed and that Customer shall not now or at any time in the future use any such information in any manner or disclose any such information to any person or entity, except as expressly permitted in writing by Studio Shed.</p>
<h2>13. GOVERNING LAW AND JURISDICTION</h2>
<p>ALL MATTERS ARISING OUT OF OR RELATING TO THESE TERMS AND CONDITIONS OR CUSTOMER’S PURCHASE OF PRODUCT SHALL BE GOVERNED BY THE LAWS OF THE STATE OF COLORADO, WITHOUT REGARD TO CONFLICTS OF LAWS RULES. EXCLUSIVE JURISDICTION OVER AND VENUE OF ANY SUIT WILL BE IN THE STATE COURTS LOCATED IN BOULDER COUNTY, COLORADO OR THE UNITED STATES DISTRICT COURT FOR THE DISTRICT OF COLORADO LOCATED IN DENVER, COLORADO.</p>
<h2>14. ENTIRE AGREEMENT</h2>
<p>These terms and conditions together with the Order constitute the parties’ entire agreement relating to the subject matter hereof and supersede all prior or contemporaneous oral or written communications, proposals, and representations with respect to such subject matter. No modification to these terms and conditions will be binding unless in writing and signed by each party.</p>
<h2>15. NO WAIVER</h2>
<p>No waiver of any provision of these terms and conditions or delay by either party in enforcement of any right hereunder shall be construed as a continuing waiver or create an expectation of non-enforcement of that or any other provision or right.</p>
<h2>16. SEVERABILITY</h2>
<p>In the event any provision herein should be held unenforceable by a court of competent jurisdiction, such court is hereby authorized to amend such provision so that it will be enforceable to the fullest extent permitted by law, and all remaining provisions shall continue in full force without being affected, impaired, or invalidated thereby in any way.</p>
<h2>17. NO ASSIGNMENT</h2>
<p>Customer agrees that Customer may not to assign or transfer any of Customer’s rights arising out of or related to these terms and conditions or Customer’s purchase of Product.</p>
<h2>18. ATTORNEYS FEES</h2>
<p>Customer agrees that if Customer fails to timely pay to Studio Sheds any sums due hereunder and Studio Sheds sues to collect such sums, Customer will be liable for reasonable fees, including but limited to collection fees and any attorney’s fees, so incurred by Studio Sheds.</p>
<p>Customer hereby agrees to Order the Product at the stated costs and have read and agree to the TERMS AND CONDITIONS, incorporated herein under this reference. Customer understands and agrees that Studio Shed reserves the right to change, discontinue or substitute materials. Customer understands and agrees that the Product delivered does not include any foundational work, site preparation, steps, wheels, or any other materials or work product not specifically defined in the Order.</p>
<h2></h2>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="accept-btn">Accept Terms and Conditions</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  var style = {
    base: {
      // Add your base input styles here. For example:
      fontSize: '16px',
      color: '#32325d',
    },
  };

  // Create an instance of the card Element.
  var card = elements.create('card', {style: style});

  // Add an instance of the card Element into the `card-element` <div>.
  card.mount('#card-element');

  card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  var submitButton = document.getElementById('submit');

  submitButton.addEventListener('click', function(ev) {
    ev.preventDefault();
    $('#card-errors').text('').removeClass('visible');
    stripe.confirmCardPayment(clientSecret, {
      payment_method: {
        card: card,
        billing_details: {
          name: window.cart.firstName + ' ' + window.cart.lastName,
          email: window.cart.email
        }
      }
    }).then(function(result) {
      if (result.error) {
        // Show error to your customer (e.g., insufficient funds)
        console.log(result.error.message);
        $('#card-errors').text(result.error.message).addClass('visible');
      } else {
        // The payment has been processed!
        //console.log(result);

        if (result.paymentIntent.status === 'succeeded') {
          //console.log(result);
          //post Results to Record
          var json = {
            uid: window.dc_uid,
            record: 'checkout',
            input: {
              paymentIntentAmount: result.paymentIntent.amount,
              paymentIntentCreated: result.paymentIntent.created,
              paymentIntentId: result.paymentIntent.id
            }
          };
          var request = $.ajax({
            url: "/dc_api/update_record_checkout/",
            method: "POST",
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify(json)
          });
          request.done(function(data){
            //console.log(data);
            window.location='/dc/thank-you.php?c='+result.paymentIntent.created+'&uid='+window.dc_uid;
          });

          request.fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
          });

          // Show a success message to your customer
          // There's a risk of the customer closing the window before callback
          // execution. Set up a webhook or plugin to listen for the
          // payment_intent.succeeded event that handles any business critical
          // post-payment actions.
        }
      }
    });
  });


  $('#accept-btn').click(function(){
    $('#termsModal').modal('hide');
    $('#consent-check').prop('checked', true);
  });


});
</script>




<?php include('includes/footer.php'); ?>