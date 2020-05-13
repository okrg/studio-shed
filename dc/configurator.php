<?php include('includes/logged-out-header.php'); ?>
<main id="logout">
  <div class="container">
    <section class="dc-logged-out">
      <form class="form-signin" action="#">
      <input type="hidden" name="inputUid" id="inputUid" value="<?php echo uniqid(); ?>" />
      <h1 class="h3 mb-3 font-weight-normal">DC Demo Test</h1>
      <div class="my-3">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required="" autofocus="">
      </div>
      <div class="my-3">
        <label for="inputFirstName" class="sr-only">First Name</label>
        <input type="text" name="firstName" id="inputFirstName" class="form-control" placeholder="First Name" required="" autofocus="">
      </div>
      <div class="my-3">
        <label for="inputLastName" class="sr-only">Last Name</label>
        <input type="text" name="lastName" id="inputLastName" class="form-control" placeholder="Last Name" required="" autofocus="">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="start-demo">Start Demo</button>
      </form>
    </section>
  </div>
</main>
<script type="text/javascript">
$(document).ready(function() {
  Cookies.remove('uid');
  $.ajaxSetup({
      headers: {
        'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader('x-api-key', 'e4XaFZRT1TyvLAy3KHdTnU20MluyYotL');
      }
  });

  var obj = {
    "customer": {
      "contact": true,
      "newsletter": true,
      "phone": "2085595350",
      "firstName": null,
      "lastName": null,
      "email": null
    },
    "product": {
      "uniqueid": null,
      "depth": 10,
      "length": 18,
      "front": "F18-60L-D36R-BL",
      "back": "B18-18L-BL",
      "left": "L10x-18C-BL",
      "right": "R10x-W1L-BL",
      "sidingColor": "Volcano Gray",
      "doorColor": "Fireworks",
      "metalColor": "Bronze",
      "doorStyleKey": "full-lite-glass-door",
      "elevation": "iso",
      "configUrl": "http://localhost:8081/configurator.html?depth=10&length=18&trim=Lap%2FMetal&sidingColor=Volcano+Gray&doorColor=Fireworks&eaveColor=Natural+Stain&metalColor=&floorOption=Vermont+Maple&bathroomFloorOption=&cabinetColor=&countertopColor=&options%5B%5D=Shortened+Eaves&options%5B%5D=Dark+Bronze+Aluminum&front=F18-60L-D36R-BL&back=B18-18L-BL&left=L10x-18C-BL&right=R10x-W1L-BL&foundation=Foundation&doorStyleKey=full-lite-glass-door",
      "imageUrl": null,
      "cart": {
        "items": [
          {
            "name": "Size",
            "sku": null,
            "description": "10' x 18' Base Price",
            "price": 13840,
            "category": "building-size"
          },
          {
            "name": "Siding",
            "sku": null,
            "description": "Lap/Metal",
            "price": 0,
            "category": "exterior-siding"
          },
          {
            "name": "Left",
            "sku": "L10x-18C-BL",
            "description": "Centered 18\" x 36\" Operable Window",
            "price": 525,
            "category": "exterior-wall"
          },
          {
            "name": "Back",
            "sku": "B18-18L-BL",
            "description": "Left Justified 18\" x 36\" Operable Window",
            "price": 525,
            "category": "exterior-wall"
          },
          {
            "name": "Front",
            "sku": "F18-60L-D36R-BL",
            "description": "Left Justified 60\" x 30\" Fixed Over Operable Window, Right Justified 36\" Door",
            "price": 1395,
            "category": "exterior-wall"
          },
          {
            "name": "Right",
            "sku": "R10x-W1L-BL",
            "description": "Left Justified Vistalite (Fixed Vertical Window)",
            "price": 950,
            "category": "exterior-wall"
          },
          {
            "name": "Door Color",
            "sku": null,
            "description": "Fireworks",
            "price": 300,
            "category": "exterior-color"
          },
          {
            "name": "Eaves Color",
            "sku": null,
            "description": "Natural Stain",
            "price": 1260,
            "category": "exterior-color"
          },
          {
            "name": "Siding Color",
            "sku": null,
            "description": "Volcano Gray",
            "price": 0,
            "category": "exterior-color"
          },
          {
            "name": "Accessory",
            "sku": null,
            "description": "Dark Bronze Aluminum",
            "price": 1440,
            "category": "exterior-accessory"
          },
          {
            "name": "Accessory",
            "description": "Full-Lite Glass Door",
            "price": 390,
            "category": "exterior-accessory"
          },
          {
            "name": "Accessory",
            "sku": null,
            "description": "Back Eaves Shortened to 6\"",
            "price": 180,
            "category": "interior-accessory"
          },
          {
            "name": "Foundation",
            "sku": null,
            "description": "",
            "price": 0,
            "priceListText": "TBD",
            "category": "foundation"
          },
          {
            "name": "Service",
            "sku": null,
            "description": "",
            "price": 0,
            "priceListText": "TBD",
            "category": "service"
          },
          {
            "name": "Shipping",
            "sku": null,
            "description": "",
            "price": 0,
            "priceListText": "TBD",
            "category": "shipping"
          }
        ],
        "total": 20805,
        "baseTotal": 20805,
        "payment": 10402.5,
        "discount": 0,
        "discountAmount": 0,
        "discountPercent": 0
      }
    },
    "params": {
      "utm_source": "(direct)",
      "utm_medium": "(none)",
      "utm_campaign": "(not set)",
      "gclid": "undefined",
      "visitor_id": "c32b183e-bb73-40e6-8c27-2bbd241368c2"
    }
  };
  $('#start-demo').click(function(e) {
    e.preventDefault();
    obj.product.uniqueid = 'demo-' + $('#inputUid').val();
    obj.customer.firstName = $('#inputFirstName').val();
    obj.customer.lastName = $('#inputLastName').val();
    obj.customer.email = $('#inputEmail').val();

    request = $.ajax({
      url: '/dc_api/save_record/',
      method: 'POST',
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify(obj)
    });
    request.done(function(data){
      console.log( 'data loaded:');
      console.log(data);      
      Cookies.set('uid', obj.product.uniqueid);
      window.location = data.redirectPath;
    });
    request.fail(function(jqXHR, textStatus) {
      console.log('Request failed: ' + textStatus);
    });

  });

});

</script>
<?php include('includes/logged-out-footer.php'); ?>