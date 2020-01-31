$(document).ready(function() {
  $.ajaxSetup({
    async: false
  });

  function fetchShippingInfo(zip) {
    return $.getJSON('/dc-api/get-shipping-costs.php?zip='+zip);
  }

  function fetchPermitNotes(data, textStatus, jqXHR) {
    console.log(data);
    $('#shipping-time-label').text(data.shipping_time).fadeIn();
    $('#shipping-cost-label').text(data.shipping_cost).fadeIn();
    $('#city-label').text(data.shipping_city_label).fadeIn();
    return $.getJSON('/dc-api/get-permit-notes.php?city='+data.shipping_city_code);
  }
  function refreshDisplay(data, textStatus, jqXHR){
    console.log(data);
    $('#permit-time-label').text(data.permit_time).fadeIn();
    $('#permit-cost-label').text(data.permit_cost).fadeIn();
    $('#permit-notes-text').text(data.permit_notes).parent().parent().removeClass('fade');
    //$('.permit-disclaimer').fadeIn();
    console.log('All Done!');

    $('#submit-zip-spinner').delay(500).fadeOut(function() {
      $(this).prev().attr('disabled', false);      
      $('#estimate-step-2').removeClass('unchecked').addClass('checked');
    });
  }



  $('#submit-zip-lookup').click(function (e) {
    console.log('zip lookup submitted');
    //stop submitting the form to see the disabled button effect
    e.preventDefault();
    $('#submit-zip-lookup').attr('disabled', true);
    $('#submit-zip-spinner').css('display', 'inline-block');
    var zip = $('#zip-label').val();
    fetchShippingInfo(zip).then(fetchPermitNotes).then(refreshDisplay);
  });


  if( $('main#step-3').length ) {
    $('#estimate-step-2').removeClass('unchecked').addClass('checked');
  }

  if( $('main#step-4').length ) {
    $('#estimate-step-2').removeClass('unchecked').addClass('checked');
    $('#estimate-step-3').removeClass('unchecked').addClass('checked');
  }

});