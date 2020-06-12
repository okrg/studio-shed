<?php
header("Status: 301 Moved Permanently");
header("Location:https://design.studio-shed.com/lookup/");
exit;
?>
<?php include('../includes/lookup-header.php'); ?>
<main id="lookup">
  <div class="container">
    <section class="dc-logged-out">
      <form class="form-signin" action="/dc/gen-auth.php" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Config Lookup</h1>
      <p>Enter customer email address</p>
      <div class="my-3">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Customer email address" required="" autofocus="">
      </div>
      <button id="start-lookup" class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      </form>
    </section>
  </div>
</main>
<div class="modal" id="linksModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>


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

  function getLookupData(email) {
    $('p.text-danger').remove();

    if(email == '') {
      $('#start-lookup').before('<p class="text-center text-danger">Please enter an email address.</p>');
      return false;
    }
    $.ajax({
      url: '/dc_api/find_magic_link/',
      method: 'POST',
      data: { email: email }
    }).done(function (result) {
      if(result.length == 0 ) {
        //no configuration for this email
        noMagicLinks();
      } else if (result.length > 1) {
        listMagicLinks(result);
      } else {
        triggerMagicLink(result[0].uid);
      }
    });
  }

  function noMagicLinks() {
    $('#start-lookup').before('<p class="text-center text-danger">No configurations were found for this email address. Please confirm you entered the correct address and try again.</p>');
  }

  function listMagicLinks(links) {
    $('#linksModal').modal('show');
    $('#linksModal .modal-body').empty();
    $('#linksModal .modal-body').append('<h5 class="text-center">Select a configuration</h5>');
    console.log(links);
    for (index = 0; index < links.length; ++index) {
      console.log(links[index]);
      if( links[index].model ) {
      $('#linksModal .modal-body').append(
        '<div><a href="#" data-uid="' +
        links[index].uid + '" class="btn btn-outline-primary trigger-magic-link"><img class="img-fluid shed-prev" src="'
        + links[index].imageUrl + '"/>'
        + links[index].depth + '&times;'
        + links[index].length + ' '
        + links[index].model + '<span>Base price: '
        + parseInt(links[index].total).toLocaleString('en-US', { style: 'currency', currency: 'USD', minimumFractionDigits: 0 }) + '</span><span>Created: '
        + links[index].created + '</span></a></div>');
      }
    }

  }
  function triggerMagicLink(uid) {
    console.log('triggerMagicLink');
    console.log(uid);
    $.ajax({
      url: '/dc_api/trigger_lookup_link/',
      method: 'POST',
      data: {
        uid: uid,
        email: $('#inputEmail').val()
      }
    }).done(function (result) {
      console.log(result);
      if(result.code == 'success') {
        window.location = result.link;
      } else {
      $('#linksModal').modal('show');
      $('#linksModal .modal-body').empty();
      $('#linksModal .modal-body').append('<h5 class="text-center">Error</h5><p class="text-center">'+result.error+'</p>');
      }
    });
  }
  $('#start-lookup').click(function(e) {
    e.preventDefault();
    getLookupData($('#inputEmail').val());
  });

  $('.modal-body').on('click', 'a.trigger-magic-link', function(e) {
    e.preventDefault();
    var magicLinkUid = $(this).attr('data-uid');
    triggerMagicLink(magicLinkUid);
  });

});

</script>


<script type="text/javascript">
$(document).ready(function() {
  getLookupUid(0);
});
</script>

<?php include('../includes/lookup-footer.php'); ?>