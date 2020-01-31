$(document).ready(function() {
  $.ajaxSetup({
    async: false
  });

  function fetchShippingInfo(zip) {
    return $.getJSON('/dc-api/get-shipping-costs.php?zip'+zip);
  }

  function fetchPermitNotes(data, textStatus, jqXHR) {
    console.log(data);
    $('#shipping-time-label').text(data.shipping_time).fadeIn();
    $('#shipping-cost-label').text(data.shipping_cost).fadeIn();
    return $.getJSON('/dc-api/get-permit-notes.php?city='+data.shipping_city);
  }
  function refreshDisplay(data, textStatus, jqXHR){
    console.log(data);
    $('#permit-time-label').text(data.permit_time).fadeIn();
    $('#permit-cost-label').text(data.permit_cost).fadeIn();
    console.log('All Done!');
  }
  (function() {
    fetchShippingInfo().then(fetchPermitNotes).then(refreshDisplay);
  }());


  $('#submit-zip-lookup').click(function (e) {
    console.log('zip lookup submitted');
    //stop submitting the form to see the disabled button effect
    e.preventDefault();
    $('#submit-zip-lookup').attr('disabled', true);
    $('#submit-zip-spinner').css('display', 'inline-block');


    $.getJSON('/dc-api/get-permit-notes.php?city=San+Diego&state=CA', function (data) {
    
    $('#permit-time-label, #permit-cost-label, #city-label, #time-label, #cost-label').fadeOut(function() {
      $('#time-label').text('4 weeks').delay(1000).fadeIn();
      $('#cost-label').text('$1,250').delay(2000).fadeIn();
      
      $('#submit-zip-spinner').delay(2000).fadeOut(function() {
        $(this).prev().attr('disabled', false);
        $('#city-label').text('San Diego, CA').fadeIn();
        $('#estimate-step-2').removeClass('unchecked').addClass('checked');
      })
    });



    });




  });


  if( $('main#step-3').length ) {
    $('#estimate-step-2').removeClass('unchecked').addClass('checked');
  }

  if( $('main#step-4').length ) {
    $('#estimate-step-2').removeClass('unchecked').addClass('checked');
    $('#estimate-step-3').removeClass('unchecked').addClass('checked');
  }

});