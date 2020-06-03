var cart;
var configuratorState = 'none';
var stripeFee;
$.ajaxSetup({
  headers: {
    'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
  },
  beforeSend: function(xhr) {
    xhr.setRequestHeader('x-api-key', 'e4XaFZRT1TyvLAy3KHdTnU20MluyYotL');
  }
});

function getLookupUid(uid) {
  var promise = new Promise(function(resolve, reject){
    if (typeof Cookies.get('sslookup') !== 'undefined') {
      var sslookup = Cookies.get('sslookup');
      resolve({
        uid:uid
      });
    } else {
      window.location = '/dc/lookup/login.php';
    }
  });
  return promise;
}


function getUidCookie(input) {
  var promise = new Promise(function(resolve, reject){
    //Try to read uid cookie
    if (typeof Cookies.get('uid') !== 'undefined') {
      var uid = Cookies.get('uid');
      window.dc_uid = uid;
      resolve({
        uid:uid,
        input: input
      });
    } else {
      window.location = '/dc/login.php';
    }
  });
  return promise;
}

/**
 * Get the record from the api
 */
function getCart(data) {
  var promise = new Promise(function(resolve, reject){
    uid = data.uid;
    input = data.input;
    $.ajax({
      url: "/dc_api/get_record/",
      method: "GET",
      data: {
        uid:uid
      }
    }).done(function (result) {
      json = JSON.stringify(result);
      window.cart = cart = JSON.parse(json);

      if(cart.code && cart.code == 'configurationError') {
        //window.alert('There was an unexpected error with your configuration. Please try reloading the page or recreating your configuration again or contact us for assistance at: answers@studioshed.com');
        //window.location.href='/dc/logout.php';
      }

      if(cart.city && cart.installation && cart.foundation) {
        cart.checkoutReady = true;
      } else {
        cart.checkoutReady = false;
      }

      if(cart.paymentIntentCreated){
        cart.orderComplete = true;
        lockInputs();
      } else {
        cart.orderComplete = false;
      }


      if (typeof Cookies.get('welcome') !== 'undefined') {
        model = cart.model.charAt(0).toUpperCase() + cart.model.slice(1);
        Cookies.remove('welcome');
        window.dataLayer.push({
          event: 'configurator.save',
          productSeries: model
        });
      }

      if( $('#idearoomConfigurator').length ) {
        if( /[?&]designermode=/.test(location.search) ) {
          //do nothing
        } else {
          var configURL = window.cart.configUrl;
          var queryString = configURL.substring( configURL.indexOf('?') + 1 );
          //window.location = '/dc/step-1.php?designermode=true&' + queryString;
        }
      }
      resolve(cart);
    });
  });
  return promise;
}

function renderCartLabels(cart) {
  var promise = new Promise(function(resolve, reject){
      $('#header-total-label').text( cartTotalLabel(cart) );
      $('#header-total-price').text( cartTotalPrice(cart) );

      $('#cart-total-label').text( cartTotalLabel(cart) );
      $('#cart-total-price').text( cartTotalPrice(cart) );
      $('#cart-model-label').text( cartModelLabel(cart) );
      $('#cart-model-price').text( cartModelPrice(cart) );

      $('a[data-menu-step="0"]').bind( 'click', function(e){
        e.preventDefault();
        window.location = '/dc/index.php';
      });

      $('a[data-menu-step="1"]').bind( 'click', function(e){
        e.preventDefault();
        var configURL = window.cart.configUrl;
        if(cart.model == 'portland') {
          var queryString = configURL.substring( configURL.indexOf('#') + 1 );
          window.location = '/dc/step-1.php?designermode=true&model=' + cart.model + '#' + queryString;
        } else {
          var queryString = configURL.substring( configURL.indexOf('?') + 1 );
          window.location = '/dc/step-1.php?designermode=true&model=' + cart.model + '&' + queryString;
        }
      });
      $('a[data-menu-step="2"]').bind( 'click', function(e){
        e.preventDefault();
        window.location = '/dc/step-2.php';
      });
      $('a[data-menu-step="3"]').bind( 'click', function(e){
        e.preventDefault();
        window.location = '/dc/step-3.php';
      });
      $('a[data-menu-step="4"]').bind( 'click', function(e){
        e.preventDefault();
        //window.location = '/dc/checkout.php';
        if(window.cart.paymentIntentCreated){
          window.location = '/dc/thank-you.php?c=' + cart.paymentIntentCreated + '&uid=' + cart.uniqueid ;
        } else {
          window.location = '/dc/checkout.php';
        }
      });

      $('#cart-location-label').text( cartLocationLabel(cart) );
      $('#cart-location-price').text( cartLocationPrice(cart) );
      $('#cart-permits-label').text( cartPermitPlansLabel(cart) );
      $('#cart-permits-price').text( cartPermitPlansPrice(cart) );
      $('#cart-installation-label').text( cartInstallationLabel(cart) );
      $('#cart-installation-price').text( cartInstallationPrice(cart) );
      $('#cart-foundation-label').text( cartFoundationLabel(cart) );
      $('#cart-order-label').text( cartOrderLabel(cart) );
      $('#final-estimate').text( cartTotalPrice(cart) );
      $('#initial-payment').text( cartInitialPayment(cart) );

      //$('#stripe-fee').val( cartStripeFee(cart) );
      stripeFee = cartStripeFee(cart);

      $('#intro-first-name').text( cart.firstName );
      $('#intro-config').text( cartModelLabel(cart) );
      $('#intro-location').text( cartLocationLabel(cart) );
      $('#intro-installation').text( cartFoundationLabel(cart) + ' & ' + cartInstallationLabel(cart));
      $('#intro-order').text( cartOrderLabel(cart) );

      if(cart.paymentIntentCreated) {
        var paidDate = new Date(cart.paymentIntentCreated * 1000);
        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        var year = paidDate.getFullYear();
        var month = months[paidDate.getMonth()];
        var date = paidDate.getDate();
        var paidDateString = month + ' ' + date + ', ' + year;
      }

      $('#summary-name').text( cart.firstName + ' ' + cart.lastName );
      $('#summary-location').text( cart.city );
      $('#summary-email').text( cart.email );
      $('#summary-phone').text( cart.phone );
      $('#summary-config-id').text( cart.uniqueid );
      $('#summary-config-render').attr('src', cart.imageUrl );
      $('#summary-config-model').text( cart.model );

      if(cart.size) {
        $('#summary-config-size').text( cart.size );
        $('#summary-config-size-price').text( formatMoney(cart.sizePrice) );
      }

      if(cart.siding) {
        $('#summary-config-siding').text( cart.siding );
        $('#summary-config-siding-price').text( formatMoney(cart.sidingPrice) );
      }

      $('#summary-config-left').text( cart.left);
      $('#summary-config-left-sku').text( cart.leftSKU);
      $('#summary-config-left-price').text( formatMoney(cart.leftPrice) );

      $('#summary-config-back').text( cart.back );
      $('#summary-config-back-sku').text( cart.backSKU);
      $('#summary-config-back-price').text( formatMoney(cart.backPrice) );

      $('#summary-config-front').text( cart.front );
      $('#summary-config-front-sku').text( cart.frontSKU);
      $('#summary-config-front-price').text( formatMoney(cart.frontPrice) );

      $('#summary-config-right').text( cart.right );
      $('#summary-config-right-sku').text( cart.rightSKU);
      $('#summary-config-right-price').text( formatMoney(cart.rightPrice) );

      if(cart.sidingColor) {
        $('#summary-config-siding-color').text( cart.sidingColor );
        $('#summary-config-siding-color-price').text( formatMoney(cart.sidingColorPrice) );
      }

      if(cart.doorColor) {
        $('#summary-config-door-color').text( cart.doorColor );
        $('#summary-config-door-color-price').text( formatMoney(cart.doorColorPrice) );
      }

      if(cart.model == 'portland') {
        $('#summary-config-eaves-color').text( cart.eaveColor );
        $('#summary-config-eaves-color-price').text( formatMoney(cart.eaveColorPrice) );
      } else {
        $('#summary-config-eaves-color').text( cart.eavesColor );
        $('#summary-config-eaves-color-price').text( formatMoney(cart.eavesColorPrice) );
      }

      if(cart.accessory0Price) {
        $('#summary-config-accessory0').text( cart.accessory0 );
        $('#summary-config-accessory0-price').text( formatMoney(cart.accessory0Price) );
      } else {
        $('#accessory0-row').hide();
      }

      if(cart.accessory1Price) {
        $('#summary-config-accessory1').text( cart.accessory1 );
        $('#summary-config-accessory1-price').text( formatMoney(cart.accessory1Price) );
      } else {
        $('#accessory1-row').hide();
      }

      if(cart.accessory2Price) {
        $('#summary-config-accessory2').text( cart.accessory2 );
        $('#summary-config-accessory2-price').text( formatMoney(cart.accessory2Price) );
      } else {
        $('#accessory2-row').hide();
      }

      if(cart.accessory3Price) {
        $('#summary-config-accessory3').text( cart.accessory3 );
        $('#summary-config-accessory3-price').text( formatMoney(cart.accessory3Price) );
      } else {
        $('#accessory3-row').hide();
      }

      if(cart.accessory4Price) {
        $('#summary-config-accessory4').text( cart.accessory4 );
        $('#summary-config-accessory4-price').text( formatMoney(cart.accessory4Price) );
      } else {
        $('#accessory4-row').hide();
      }

      if(cart.accessory5Price) {
        $('#summary-config-accessory5').text( cart.accessory5 );
        $('#summary-config-accessory5-price').text( formatMoney(cart.accessory5Price) );
      } else {
        $('#accessory5-row').hide();
      }

      if(cart.interior) {
        $('#summary-config-interior').text( cart.interior );
        $('#summary-config-interior-sku').text( cart.interiorSKU );
        $('#summary-config-interior-price').text( formatMoney(cart.interiorPrice) );
      } else {
        $('#interior-row').hide();
      }
      if(cart.flooring) {
        $('#summary-config-flooring').text( cart.flooring );
        $('#summary-config-flooring-price').text( formatMoney(cart.flooringPrice) );
      } else {
        $('#flooring-row').hide();
      }

      if(cart.finish) {
        $('#summary-config-finish').text( cart.finish );
        $('#summary-config-finish-price').text( formatMoney(cart.finishPrice) );
      } else {
        $('#finish-row').hide();
      }


      if(cart.city && cart.zip) {
        $('#summary-config-shipping').text( cart.city + ' (' + cart.zip + ')' );
      }
      if(cart.shippingPrice) {
        $('#summary-config-shipping-price').text( formatMoney(cart.shippingPrice) );
      } else {
        $('#summary-config-shipping-price').text('TBD');
      }

      if(cart.permitPlansPrice) {
        $('#summary-config-permit-plans').text( cart.permitPlans ? 'Yes' : 'No' );
        $('#summary-config-permit-plans-price').text( formatMoney(cart.permitPlansPrice) );
      } else {
        $('#summary-config-permit-plans-price').text('TBD');
      }

      if(cart.foundation) {
        $('#summary-config-foundation').text( cart.foundation );
      } else {
        $('#summary-config-foundation').text('TBD');
      }
      if(cart.installationPrice) {
        $('#summary-config-installation').text( cart.installation );
        $('#summary-config-installation-price').text( formatMoney(cart.installationPrice) );
      } else {
        $('#summary-config-installation').text('TBD');
      }

      $('#summary-config-total-price').text( cartTotalPrice(cart) );

      if(cart.paymentIntentCreated) {
        $('#summary-config-initial-payment-date').text( 'Paid ' + paidDateString );
        $('#summary-config-initial-payment-price').text( cartInitialPayment(cart) );
      } else {
        $('#summary-config-initial-payment-date').text('TBD').parent().removeClass('badge-success').addClass('badge-secondary');
      }

      if(cart.city && cart.shippingPrice) {
        $('li[data-progress-step="2"]').addClass('active');
      }

      if(cart.installation && cart.foundation) {
        $('li[data-progress-step="3"]').addClass('active');
      }

      if(cart.paymentIntentId) {
        $('li[data-progress-step="4"]').addClass('active');
      }

      if(cart.city === undefined) {
        $('#step-location').prepend('<span class="badge badge-pill badge-primary">Next Step</span> ');
      }

      if(cart.city != undefined && cart.installation === undefined) {
        $('#step-installation').prepend('<span class="badge badge-pill badge-primary">Next Step</span> ');
      }

      if(cart.city != undefined && cart.installation != undefined && cart.paymentIntentId === undefined) {
        $('#step-order').prepend('<span class="badge badge-pill badge-primary">Next Step</span> ');
      }

      if (typeof Cookies.get('checkout') !== 'undefined') {
        model = cart.model.charAt(0).toUpperCase() + cart.model.slice(1);
        paymentIntentAmount = cart.paymentIntentAmount.toFixed(2).toString();
        Cookies.remove('checkout');
        window.dataLayer.push({
          event: 'configurator.checkout',
          productSeries: model,
          checkoutValue: paymentIntentAmount
        });
      }

      resolve(cart);

   });
   return promise;
}


function renderPermitElements(cart) {
  var promise = new Promise(function(resolve, reject){
    //Exception to special price for Summit permit plans
    if(cart.model == 'summit') {
      $('#select-permit-plans-true')
      .attr('data-permitPlans-price', '0')
      .find('span.cost').text('Included');
    }
    if(cart.permitPlans) {
      $('a.option-permitPlans[data-permitPlans="true"]').addClass('selected');
    } else {
      $('a.option-permitPlans[data-permitPlans="false"]').addClass('selected');
    }
    resolve(cart);
 });
 return promise;
}


function renderShippingElements(cart) {
  //get shipping fields and populate
  var promise = new Promise(function(resolve, reject){
    $('#zip-label').val(cart.zip);
    $('#shipping-time-label').text(cart.shipping);
    $('#shipping-cost-label').text('$'+cart.shippingPrice);
    $('#city-label').text(cart.city);

    $('#permit-notes-city-label').text(cart.city).fadeIn();

    $('#permit-message').text('You may be required to obtain local building permits.');
    $('#permit-time-label').text('Typically 2-3 weeks');
    $('#permit-cost-label').text('Typical range is $400 - $1,800');

    if (cart.permitTime) {
      $('#permit-time-label').text(cart.permitTime);
    }

    if (cart.permitCost) {
      $('#permit-cost-label').text(cart.permitCost);
    }

    if(cart.permitNotes) {
      $('#permit-notes-text').text(cart.permitNotes);
      $('.dc-permit-notes').removeClass('fade');
    } else {
      $('#permit-notes-text').text('');
      $('.dc-permit-notes').addClass('fade');
    }

    if( (cart.length*cart.depth) <= 120) {
      $('#permit-message').text('Based off your location and configuration, build permits may not be required. Please check with your local municipality.');
    }

    resolve(cart);
 });
 return promise;
}


function renderInstallationElements(cart) {
  var promise = new Promise(function(resolve, reject){
    //Figure out installation code
    $.ajax({
      url: "/dc_api/get_installation_rates",
      method: "GET",
      data: {
        model: cart.model,
        state: cart.state,
        zip: cart.zip,
        length: cart.length,
        depth: cart.depth
      }
    }).done(function (rates) {
      //mark previously chosen foundations
      $('a.option-foundation[data-foundation="'+cart.foundation+'"]').addClass('selected');
      //mark previously chosen installations
      $('a.option-installation[data-installation="'+cart.installation+'"]').addClass('selected');

      $('#select-certified-install-1')
      .attr('data-installation-price', rates.shell)
      .find('span.cost').text('+ ' + formatMoney(rates.shell));

      $('#select-certified-install-2')
      .attr('data-installation-price', rates.lifestyle)
      .find('span.cost').text('+ ' + formatMoney(rates.lifestyle));
      resolve(cart);
    });
  });
 return promise;
}


function updatePermitPlansSelection(data) {
  var promise = new Promise(function(resolve, reject){
    $('a.option-permitPlans').removeClass('selected');
    $('a.option-permitPlans[data-permitPlans="'+data.input.permitPlans+'"]').addClass('selected');
    resolve(data);
  });
  return promise;
}


function updateFoundationSelection(data) {
  var promise = new Promise(function(resolve, reject){
    $('a.option-foundation').removeClass('selected');
    $('a.option-foundation[data-foundation="'+data.input.foundation+'"]').addClass('selected');
    resolve(data);
  });
  return promise;
}


function updateInstallationSelection(data) {
  var promise = new Promise(function(resolve, reject){
    $('a.option-installation').removeClass('selected');
    $('a.option-installation[data-installation="'+data.input.installation+'"]').addClass('selected');
    resolve(data);
  });
  return promise;
}


function cartRenderDone(cart) {
  if(cart.checkoutReady) {
    //do nothing
  } else {
    $('#cart').empty().append('<h6 class="text-center">Finish choosing your location and installation details to complete your order.</h6>');
    $('#checkout').empty();
  }
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    if(cart.model == 'portland') {
      $('#shedConfigurator').empty();
      $('#mobile-portland').show();
    }
  }
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
  return fig.toLocaleString('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 0 });
  //return fig;
}

function cartInitialPayment(cart) {
  fig =  cart.total
  + ( parseInt(cart.shippingPrice) || 0 )
  + ( parseInt(cart.installationPrice) || 0 )
  + ( parseInt(cart.foundationPrice) || 0 )
  + ( parseInt(cart.permitPlansPrice) || 0 )
  + ( parseInt(cart.servicePrice) || 0 );
  fig = fig/2;
  return fig.toLocaleString('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 2 });
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
  return cart.depth + ' x ' + cart.length + ' ' + cart.model + ' series';
}

function cartModelPrice(cart) {
  if(!cart.total) {
    cart.total = 0.00;
  }
  return cart.total.toLocaleString('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 0 });
}

function mobileConfiguratorLink(cart) {
  var configURL = window.cart.configUrl;
  var queryString = configURL.substring( configURL.indexOf('?') + 1 );
  return '/dc/mobile-configurator.php?designermode=true&model=' + cart.model + '&' + queryString;
}


function cartLocationLabel(cart) {
  if(cart.city) {
    return 'Shipping to ' + cart.city;
  }
  return 'Specify your location';
}
function cartLocationPrice(cart) {  
  if(cart.shippingPrice) {
    return parseInt(cart.shippingPrice).toLocaleString('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 0 });
  }
}

function cartPermitPlansLabel(cart) {
  if(cart.permitPlans) {
    return 'Permit plans set included';
  }
  return 'No permit plans set included';
}
function cartPermitPlansPrice(cart) {
  if(cart.permitPlansPrice) {
    return parseInt(cart.permitPlansPrice).toLocaleString('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 0 });
  }
}


function cartInstallationLabel(cart) {
  if(cart.installation) {
    return cart.installation + ' installation';
  }
  return 'Select installation type';
}

function cartInstallationPrice(cart) {
  if(cart.installationPrice) {
    return parseInt(cart.installationPrice).toLocaleString('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 0 });
  }
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
  amt = parseInt(number) || 0;
  return amt.toLocaleString('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 0 });
}


function updateRecordPermitPlans(data){
  if(cart.orderComplete) {
    return false;
  }  
  return $.ajax({
    url: "/dc_api/update_record_permit_plans/",
    method: "POST",
    dataType: 'json',
    contentType: 'application/json',
    data: JSON.stringify(data)
  });
}



function updateRecordFoundation(data){
  if(cart.orderComplete) {
    return false;
  }
  return $.ajax({
    url: "/dc_api/update_record_foundation/",
    method: "POST",
    dataType: 'json',
    contentType: 'application/json',
    data: JSON.stringify(data)
  });
}


function updateRecordInstallation(data){
  if(cart.orderComplete) {
    return false;
  }
  return $.ajax({
    url: "/dc_api/update_record_installation/",
    method: "POST",
    dataType: 'json',
    contentType: 'application/json',
    data: JSON.stringify(data)
  });
}


function fetchLocationDetails(zip,cart) {
  var promise = new Promise(function(resolve, reject){
    $.ajax({
      url: "/dc_api/get_location_details/",
      method: "POST",
      data: {
        zip: zip,
        length: cart.length,
        interior: cart.interiorSKU,
        depth: cart.depth,
        area: cart.area
      }
    }).done(function (data) {
      if(data.shipping_city === null) {
        reject(data);
        alert('ZIP code was not valid. Please check and try again.');
      } else {
        resolve(data);
      }
    });
  });
  return promise;
}


function updateRecordLocation(data, textStatus, jqXHR){
  if(cart.orderComplete) {
    return false;
  }
  if(data.shipping_city === null) {
    alert('Zip code not found');
    return false;
  }
  data.uid = window.dc_uid;
  return $.ajax({
    url: "/dc_api/update_record_location/",
    method: "POST",
    dataType: 'json',
    contentType: 'application/json',
    data: JSON.stringify(data)
  });
}

function renderLocationLabels(data, textStatus, jqXHR){
  var request = $.ajax({
    url: "/dc_api/get_record/",
    method: "GET",
    data: {uid:data.uid}
  });
  request.done(function(data){
    key = data.uniqueid;
    json = JSON.stringify(data);
    window.cart = cart = JSON.parse(json);
    $('#shipping-time-label').text(cart.shipping).fadeIn();
    $('#shipping-cost-label').text(formatMoney(cart.shippingPrice)).fadeIn();
    $('#city-label').text(cart.city).fadeIn();
    $('#cart-location-label').text( cartLocationLabel(cart) );
    $('#permit-time-label').text(cart.permitTime).fadeIn();
    $('#permit-cost-label').text(cart.permitCost).fadeIn();
    $('#permit-notes-city-label').text(cart.city).fadeIn();
    if(cart.permitNotes) {
      $('#permit-notes-text').text(cart.permitNotes);
      $('.dc-permit-notes').removeClass('fade');
    }
  });
  request.fail(function(jqXHR, textStatus) {
    console.log("Fail: " + textStatus);
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
  });

  request.fail(function(jqXHR, textStatus) {
    console.log("Fail: " + textStatus);
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
  });

  request.fail(function(jqXHR, textStatus) {
    console.log("Fail: " + textStatus);
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
  });

  request.fail(function(jqXHR, textStatus) {
    console.log("Fail: " + textStatus);
  });
}


function lookupEmail(email) {
  request = $.ajax({
    url: "/dc_api/lookup_email/",
    method: "GET",
    data: {email:email}
  });

  request.done(function(data){
  });

  request.fail(function(jqXHR, textStatus) {
    console.log("Fail: " + textStatus);
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
  });

  request.fail(function(jqXHR, textStatus) {
    console.log("Fail: " + textStatus);
  });
}

function lockInputs() {
  $('main#step-1 .dc-intro').remove();
  $('main#step-1 .dc-configurator').remove();
  $('main#step-1 .dc-popular').remove();
  $('main#step-1 #configuration-details').show();

  $('#submit-zip-lookup').prop('disabled', true);
  $('#zip-label').prop('disabled', true);

  $('#select-permit-plans-false').addClass('disabled');
  $('#select-permit-plans-true').addClass('disabled');

  $('#select-concrete-slab').addClass('disabled');
  $('#select-wood-frame').addClass('disabled');
  $('#select-foundation-tbd').addClass('disabled');

  $('#select-diy-install').addClass('disabled');
  $('#select-certified-install-1').addClass('disabled');
  $('#select-certified-install-2').addClass('disabled');

}


$(document).ready(function() {

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

  $('.dc-permit-set a.option-permitPlans').click(function(e) {
    e.preventDefault();
    input = {
      permitPlans: $(this).attr('data-permitPlans'),
      permitPlansPrice: $(this).attr('data-permitPlans-price'),
    };
    getUidCookie(input)
      .then(updateRecordPermitPlans)
      .then(updatePermitPlansSelection)
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
    e.preventDefault();
    $('#submit-zip-lookup').attr('disabled', true);
    $('#submit-zip-spinner').css('display', 'inline-block');
    var zip = $('#zip-label').val();

    var isValidZip = /(^\d{5}$)|(^\d{5}-\d{4}$)/.test(zip);
    if(isValidZip) {

      fetchLocationDetails(zip, cart)
      .then(updateRecordLocation)
      .then(getCart)
      .then(renderCartLabels)
      .then(renderShippingElements);

    } else {
      alert('ZIP code was not valid. Please check and try again.');
    }

    $('#submit-zip-spinner').delay(500).fadeOut(function() {
      $(this).prev().attr('disabled', false); 
    });
  });

  $('#consent-check').on('change', function() {
    if (this.checked) {
     $('button#submit').prop('disabled', false).removeClass('disabled');
    } else {
      $('button#submit').prop('disabled', true).addClass('disabled');
    }
  });

  $('body').click(function(e) {
    if (e.target.id == 'configurator-parent' || $(e.target).parents('#configurator-parent').length) {
      if(configuratorState == 'none'){
        configuratorState = 'unsaved';
        $(window).bind('beforeunload', function(){
          return true;
        });
      }

    }
  });

  $('body').on('click', '.checkoutButton a.buttono', function() {
    configuratorState = 'saved';
    $(window).unbind('beforeunload');
  });


  $('.progressbar li').click(function(e){
    $(this).find('a').get(0).click();
  });


  $('#navbarModelsBtn').on ('click', function() {  $('#navbarCollapse').collapse('hide'); });
  $('#navbarMenuBtn').on ('click', function() { $('#modelsCollapse').collapse('hide'); });

});