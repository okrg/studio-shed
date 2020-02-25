$(document).ready(function() {

  $.ajaxSetup({
      headers: {
        'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader('x-api-key', 'e4XaFZRT1TyvLAy3KHdTnU20MluyYotL');
      }
  });



  function getUidCookie(input) {
     var promise = new Promise(function(resolve, reject){
      console.log('first');
      //Try to read uid cookie
      if (typeof Cookies.get('uid') !== 'undefined') {
        var uid = Cookies.get('uid');
        window.dc_uid = uid;
        resolve({uid:uid, input: input});
      } else {
        //redirect
        window.location = '/dc/login.php';
      }
     });
     return promise;
  }


  function getCart(data) {
     var promise = new Promise(function(resolve, reject){
        console.log('getCart');
        console.log(data);
        uid = data.uid;
        input = data.input;
        console.log(uid);
        console.log(input);

          $.ajax({
            url: "/dc_api/get_record/",
            method: "GET",
            data: {uid:uid}
          }).done(function (result) {
            json = JSON.stringify(result);
            //console.log('Setting to localStorage with key:', key);
            //localStorage.setItem(key, json);
            window.cart = cart = JSON.parse(json);
            resolve(cart);
          });
        /*
        if ( localStorage.getItem(key) ) {
          console.log('Getting from localStorage instead');
          // If it's in local storage execute callback immediately  
          window.cart = cart = JSON.parse(localStorage.getItem(key));
          resolve(cart);
        } else {
          console.log('No results locally, making XHR request...');
          $.ajax({
            url: "/dc_api/get_record/",
            method: "GET",
            data: {uid:key}
          }).done(function (result) {
            json = JSON.stringify(result);
            console.log('Setting to localStorage with key:', key);
            localStorage.setItem(key, json);
            window.cart = cart = JSON.parse(json);
            resolve(cart);
          });
        }
        */
     });
     return promise;
  }

  function renderCartLabels(cart) {
     var promise = new Promise(function(resolve, reject){
        console.log('third');
        console.log(cart);
        $('#cart-total-label').text( cartTotalLabel(cart) );
        $('#cart-total-price').text( cartTotalPrice(cart) );
        $('#cart-model-label').text( cartModelLabel(cart) );
        $('#cart-location-label').text( cartLocationLabel(cart) );
        $('#cart-installation-label').text( cartInstallationLabel(cart) );
        $('#cart-foundation-label').text( cartFoundationLabel(cart) );
        $('#cart-order-label').text( cartOrderLabel(cart) );

        if(cart.city && cart.shipping) {
          $('#estimate-step-2').removeClass('unchecked').addClass('checked');
        }

        if(cart.installation && cart.foundation) {
          $('#estimate-step-3').removeClass('unchecked').addClass('checked');
        }

        if(cart.checkout) {
          $('#estimate-step-4').removeClass('unchecked').addClass('checked');
        }

        $('#final-estimate').text( cartTotalPrice(cart) );
        $('#initial-payment').text( cartInitialPayment(cart) );
        $('#stripe-fee').val( cartStripeFee(cart) );

        $('#intro-first-name').text( cart.firstName );
        $('#intro-config').text( cartModelLabel(cart) );
        $('#intro-location').text( cartLocationLabel(cart) );
        $('#intro-installation').text( cartFoundationLabel(cart) + ' & ' + cartInstallationLabel(cart));
        $('#intro-order').text( cartOrderLabel(cart) );


        var paidDate = new Date(cart.paymentIntentCreated * 1000);
        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        var year = paidDate.getFullYear();
        var month = months[paidDate.getMonth()];
        var date = paidDate.getDate();
        var paidDateString = month + ' ' + date + ', ' + year;

        $('#summary-name').text( cart.firstName + ' ' + cart.lastName );
        $('#summary-location').text( cart.city );
        $('#summary-email').text( cart.email );
        $('#summary-config-id').text( cart.uniqueid );


        //Size
        $('#summary-config-size').text( cart.size );
        $('#summary-config-size-price').text( formatMoney(cart.sizePrice) );

        //Siding
        $('#summary-config-siding').text( cart.siding );
        $('#summary-config-siding-price').text( formatMoney(cart.sidingPrice) );

        //Left
        $('#summary-config-left').text( cart.left );
        $('#summary-config-left-price').text( formatMoney(cart.leftPrice) );

        //Back
        $('#summary-config-back').text( cart.back );
        $('#summary-config-back-price').text( formatMoney(cart.backPrice) );

        //Front
        $('#summary-config-front').text( cart.front );
        $('#summary-config-front-price').text( formatMoney(cart.frontPrice) );

        //Right
        $('#summary-config-right').text( cart.right );
        $('#summary-config-right-price').text( formatMoney(cart.rightPrice) );

        //Siding Color
        $('#summary-config-siding-color').text( cart.sidingColor );
        $('#summary-config-siding-color-price').text( formatMoney(cart.sidingColorPrice) );

        //Door Color
        $('#summary-config-door-color').text( cart.doorColor );
        $('#summary-config-door-color-price').text( formatMoney(cart.doorColorPrice) );

        //Eaves Color
        $('#summary-config-eaves-color').text( cart.eavesColor );
        $('#summary-config-eaves-color-price').text( formatMoney(cart.eavesColorPrice) );

        //Accessory
        $('#summary-config-accessory').text( cart.accessory );
        $('#summary-config-accessory-price').text( formatMoney(cart.accessoryPrice) );

        //Shipping
        $('#summary-config-shipping').text( cart.shipping + ' to ' + cart. city + ' (' + cart.zip + ')' );
        $('#summary-config-shipping-price').text( formatMoney(cart.shippingPrice) );

        //Permit Plans Set
        $('#summary-config-permit-plans').text( cart.permitPlans ? 'Yes' : 'No' );
        $('#summary-config-permit-plans-price').text( formatMoney(cart.permitPlansPrice) );

        //Foundation Type
        $('#summary-config-foundation').text( cart.foundation );

        //Installation
        $('#summary-config-installation').text( cart.installation );
        $('#summary-config-installation-price').text( formatMoney(cart.installationPrice) );

        $('#summary-config-total-price').text( cartTotalPrice(cart) );

        $('#summary-config-initial-payment-date').text( 'Paid ' + paidDateString );
        $('#summary-config-initial-payment-price').text( cartInitialPayment(cart) );


        resolve(cart);

     });
     return promise;
  }

  function renderPermitElements(cart) {
    //get shipping fields and populate


    var promise = new Promise(function(resolve, reject){
      console.log('renderPermitElements');
      console.log(cart);
      if(cart.permitPlans) {
        $('#permitPlanSelect').prop('checked', true);
      }      
      resolve(cart);
   });
   return promise;
  }


  function renderShippingElements(cart) {
    //get shipping fields and populate
    var promise = new Promise(function(resolve, reject){
      console.log('renderShippingElements');
      console.log(cart);
      $('#zip-label').val(cart.zip);
      $('#shipping-time-label').text(cart.shipping);
      $('#shipping-cost-label').text(formatMoney(cart.shippingPrice));
      $('#city-label').text(cart.city);
      $('#permit-time-label').text(cart.permitTime);
      $('#permit-cost-label').text(cart.permitCost);
      $('#permit-notes-city-label').text(cart.city).fadeIn();
      if(cart.permitNotes) {
        $('#permit-notes-text').text(cart.permitNotes).parent().removeClass('fade');
      }
      resolve(cart);
   });
   return promise;
  }


  function renderInstallationElements(cart) {
    var promise = new Promise(function(resolve, reject){
        console.log('renderInstallationElements');
        console.log(cart);
        //Figure out instllation based on size and model
        installChart = {
          "model": {
            "10x8": {
              "shellOnly": 2596,
              "shellPlus": 6669
            },
            "10x10": {
              "shellOnly": 2703,
              "shellPlus": 6947
            },
            "10x12": {
              "shellOnly": 3244,
              "shellPlus": 8336
            },
            "10x14": {
              "shellOnly": 2596,
              "shellPlus": 6669
            },
            "10x16": {
              "shellOnly": 2596,
              "shellPlus": 6669
            },
            "10x18": {
              "shellOnly": 4379,
              "shellPlus": 11254
            },
          }
        }

        shellOnly = installChart['model'][cart.depth+'x'+cart.length]['shellOnly'];
        shellPlus = installChart['model'][cart.depth+'x'+cart.length]['shellPlus'];

        //mark previously chosen foundations
        $('a.option-foundation[data-foundation="'+cart.foundation+'"]').addClass('selected');

        //mark previously chosen installations
        $('a.option-installation[data-installation="'+cart.installation+'"]').addClass('selected');


        $('#select-certified-install-1')
        .attr('data-installation-price', shellOnly)
        .find('span.cost').text('+ ' + formatMoney(shellOnly));
        $('#select-certified-install-2')
        .attr('data-installation-price', shellPlus)
        .find('span.cost').text('+ ' + formatMoney(shellPlus));
        resolve(cart);

     });
     return promise;
  }

  function updateFoundationSelection(data) {
    var promise = new Promise(function(resolve, reject){
      console.log('calling updateFoundationSelection with this:');
      console.log(data);
      $('a.option-foundation').removeClass('selected');
      $('a.option-foundation[data-foundation="'+data.input.foundation+'"]').addClass('selected');
      resolve(data);
    });
    return promise;
  }

  function updateInstallationSelection(data) {
    var promise = new Promise(function(resolve, reject){
      console.log('updateInstallationSelection');
      console.log(data);
      $('a.option-installation').removeClass('selected');
      $('a.option-installation[data-installation="'+data.input.installation+'"]').addClass('selected');
      resolve(data);
    });
    return promise;
  }


  function cartRenderDone() {
     console.log('render done!');
  }

  function cartTotalLabel(cart) {
    if(cart.shippingPrice || cart.installPrice) {
      return "Estimated total:";
    }
    return "Starting at:";
  }

  function cartTotalPrice(cart) {
    fig =  cart.total
    + ( parseInt(cart.shippingPrice) || 0 )
    + ( parseInt(cart.installationPrice) || 0 )
    + ( parseInt(cart.foundationPrice) || 0 )
    + ( parseInt(cart.permitPlansPrice) || 0 )
    + ( parseInt(cart.servicePrice) || 0 );
    return fig.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
  }

  function cartInitialPayment(cart) {
    fig =  cart.total
    + ( parseInt(cart.shippingPrice) || 0 )
    + ( parseInt(cart.installationPrice) || 0 )
    + ( parseInt(cart.foundationPrice) || 0 )
    + ( parseInt(cart.permitPlansPrice) || 0 )
    + ( parseInt(cart.servicePrice) || 0 );
    fig = fig/2;
    return fig.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
  }

  function cartStripeFee(cart) {
    fig =  cart.total
    + ( parseInt(cart.shippingPrice) || 0 )
    + ( parseInt(cart.installationPrice) || 0 )
    + ( parseInt(cart.foundationPrice) || 0 )
    + ( parseInt(cart.permitPlansPrice) || 0 )
    + ( parseInt(cart.servicePrice) || 0 );
    fig = (fig/2)*100;
    return fig;
  }


  function cartModelLabel(cart) {
    return cart.depth + ' x ' + cart.length + ' ' + cart.model + ' studio shed';
  }

  function cartLocationLabel(cart) {
    if(cart.city) {
      return 'Shipping to ' + cart.city;
    }
    return 'Specify your location';
  }



  function cartInstallationLabel(cart) {
    if(cart.installation) {
      return cart.installation + ' installation';
    }
    return 'Select installation type';
  }


  function cartFoundationLabel(cart) {
    if(cart.foundation) {
      return cart.foundation + ' foundation';
    }
    return 'Select foundation type';
  }

  function cartOrderLabel(cart) {
    if(cart.paymentIntentCreated) {
      return 'Initial payment submitted';
    }
    return 'Submit your initial payment';
  }


  function formatMoney(number) {
    return parseInt(number).toLocaleString('en-US', { style: 'currency', currency: 'USD' });
  }


  function updateRecordPermitPlans(data){
    console.log('calling updateRecordFoundation with this:');
    console.log(data);
    return $.ajax({
      url: "/dc_api/update_record_permit_plans/",
      method: "POST",
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify(data)
    });
  }



  function updateRecordFoundation(data){
    console.log('calling updateRecordFoundation with this:');
    console.log(data);
    return $.ajax({
      url: "/dc_api/update_record_foundation/",
      method: "POST",
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify(data)
    });
  }


  function updateRecordInstallation(data){
    console.log('calling updateRecordInstallation with this:');    
    console.log(data);
    return $.ajax({
      url: "/dc_api/update_record_installation/",
      method: "POST",
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify(data)
    });
  }


  function fetchLocationDetails(zip) {
    return $.ajax({
      url: "/dc_api/get_location_details/",
      method: "POST",
      data: { zip:zip }
    });
  }


  function updateRecordLocation(data, textStatus, jqXHR){
    data.uid = window.dc_uid;
    console.log('calling updateRecordLocation with this:');
    console.log(textStatus);
    console.log(data);
    return $.ajax({
      url: "/dc_api/update_record_location/",
      method: "POST",
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify(data)
    });
  }

  function renderLocationLabels(data, textStatus, jqXHR){
    console.log('calling renderLocationLabels with this:');
    console.log(textStatus);
    console.log(data);
    var request = $.ajax({
      url: "/dc_api/get_record/",
      method: "GET",
      data: {uid:data.uid}
    });
    request.done(function(data){
      console.log('final result');
      console.log(data);
      key = data.uniqueid;
      json = JSON.stringify(data);
      //console.log('Setting to localStorage with key:', key);
      //localStorage.setItem(key, json);
      window.cart = cart = JSON.parse(json);
      $('#shipping-time-label').text(cart.shipping).fadeIn();
      $('#shipping-cost-label').text(formatMoney(cart.shippingPrice)).fadeIn();
      $('#city-label').text(cart.city).fadeIn();
      $('#cart-location-label').text( cartLocationLabel(cart) );
      $('#permit-time-label').text(cart.permitTime).fadeIn();
      $('#permit-cost-label').text(cart.permitCost).fadeIn();
      $('#permit-notes-city-label').text(cart.city).fadeIn();
      if(cart.permitNotes) {
        $('#permit-notes-text').text(cart.permitNotes).parent().removeClass('fade');
      }
      $('#submit-zip-spinner').delay(500).fadeOut(function() {
        $(this).prev().attr('disabled', false); 
        $('#estimate-step-2').removeClass('unchecked').addClass('checked');
      });
    });

    request.fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });
  }


  function updateRecord(uid, key, value, price) {
    request = $.ajax({
      url: "/dc_api/update_record/",
      method: "POST",
      data: {
        uid: uid,
        key: key,
        value: value,
        price: price
      },
      dataType: "json"
    });

    request.done(function(data){
      console.log( 'data loaded:');
      console.log(data);
    });

    request.fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });
  }



  function getRecord(uid) {
    return $.ajax({
      url: "/dc_api/get_record/",
      method: "GET",
      data: {uid:uid}
    });
  }


  function getRecordDebug(uid) {
    request = $.ajax({
      url: "/dc_api/get_record/",
      method: "GET",
      data: {
        uid: uid
      }
    });
    request.done(function(data){
      console.log( "data loaded:");
      console.log(data);
    });
    request.fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });
  }

  function createRecord(json) {
    request = $.ajax({
      url: '/dc_api/save_record/',
      method: 'POST',
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify(json)
    });
    request.done(function(data){
      console.log( 'data loaded:');
      console.log(data);
    });
    request.fail(function(jqXHR, textStatus) {
      console.log('Request failed: ' + textStatus);
    });
  }


  function lookupEmail(email) {
    request = $.ajax({
      url: "/dc_api/lookup_email/",
      method: "GET",
      data: {email:email}
    });
    request.done(function(data){
      console.log( "data loaded:");
      console.log(data);
    });
    request.fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });
  }


  function getLocationDetails(zip) {
    request = $.ajax({
      url: "/dc_api/get_location_details/",
      method: "POST",
      data: {zip:zip}
      //dataType: "json"
    });
    request.done(function(data){
      console.log( 'data loaded:');
      console.log(data);
    });

    request.fail(function(jqXHR, textStatus) {
      console.log("Request failed: " + textStatus);
    });
  }

  var obj = {
    "customer": {
      "contact": true,
      "newsletter": true,
      "phone": "2085595350",
      "firstName": "Rolz",
      "lastName": "G",
      "email": "rolando.garcia@businessol.com"
    },
    "product": {
      "uniqueid": "rolo-123456789",
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

  //Action stages
  //createRecord(obj);
  //getRecord('craig-200218154413');
  //lookupEmail('rolando.garcia@businessol.com');
  //getLocationDetails('92108');
  //updateRecord('craig-200218154413', 'zip', '92018', 0);
  //updateRecord('craig-200218154413', 'shipping', '5 weeks',  3000);
  //updateRecord('craig-200218154413', 'foundation', 'concrete',  500);
  //updateRecord('craig-200218154413', 'plans', 'permit plan set',  2500);
  //updateRecord('craig-200218154413', 'service', 'certified install',  5000);

  getUidCookie()
    .then(getCart)
    .then(renderCartLabels)
    .then(renderShippingElements)
    .then(renderPermitElements)
    .then(renderInstallationElements)
    .then(cartRenderDone);








  //Button binds

  $('.dc-permit-set input#permitPlanSelect').click(function(e) {
    if( $(this).is(':checked') ) {
      input = {
        permitPlans: true,
        permitPlansPrice: 3995
      };
    } else {
      input = {
        permitPlans: false,
        permitPlansPrice: 0
      };
    }
    getUidCookie(input)
      .then(updateRecordPermitPlans)
      .then(getCart)
      .then(renderCartLabels);
  });

  $('.dc-foundation a.option-foundation').click(function(e) {
    e.preventDefault();
    input = {
      foundation: $(this).attr('data-foundation'),
      foundationPrice: 0
    };
    getUidCookie(input)
      .then(updateRecordFoundation)
      .then(updateFoundationSelection)
      .then(getCart)
      .then(renderCartLabels);
  });


  $('.dc-installation a.option-installation').click(function(e) {
    e.preventDefault();
    input = {
      installation: $(this).attr('data-installation'),
      installationPrice: $(this).attr('data-installation-price'),
    };
    getUidCookie(input)
      .then(updateRecordInstallation)
      .then(updateInstallationSelection)
      .then(getCart)
      .then(renderCartLabels);
  });


  $('#submit-zip-lookup').click(function (e) {
    console.log('zip lookup submitted');
    //stop submitting the form to see the disabled button effect
    e.preventDefault();
    $('#submit-zip-lookup').attr('disabled', true);
    $('#submit-zip-spinner').css('display', 'inline-block');
    var zip = $('#zip-label').val();
    fetchLocationDetails(zip).then(updateRecordLocation).then(renderLocationLabels);
  });

  $('#consent-check').on('change', function() {
    if (this.checked) {
     $('button#submit').prop('disabled', false).removeClass('disabled');
    } else {
      $('button#submit').prop('disabled', true).addClass('disabled');
    }
  });


  if( $('main#step-3').length ) {
    $('#estimate-step-2').removeClass('unchecked').addClass('checked');
  }

  if( $('main#step-4').length ) {
    $('#estimate-step-2').removeClass('unchecked').addClass('checked');
    $('#estimate-step-3').removeClass('unchecked').addClass('checked');
  }





});
