<?php include('../includes/logged-out-header.php'); ?>
<main id="logout">
  <div class="container">
    <section class="dc-logged-out">
      <form class="form-signin" action="/dc/gen-auth.php" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">LOGIN REQUIRED</h1>
      <p>Enter your admin email to continue.</p>
      <div class="my-3">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Your email address" required="" autofocus="">
      </div>
      <button id="start-login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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

  function getMagicLink(email) {
    $('p.text-danger').remove();

    if(email == '') {
      $('#start-login').before('<p class="text-center text-danger">Please enter an email address.</p>');
      return false;
    }

    $.ajax({
      url: '/dc_api/trigger_magic_lookup_link/',
      method: 'POST',
      data: {
        email: $('#inputEmail').val()
      }
    }).done(function (result) {
      console.log(result);
      if(result.code == 'success') {
        $('#linksModal').modal('show');
        $('#linksModal .modal-body').empty();
        $('#linksModal .modal-body').append('<h5 class="text-center">You’re almost there.</h5><p class="text-center">Check your inbox for a link to log in.</p>');
        //$('#linksModal .modal-body').append('<a href="'+result.link+'">Link</a>');
      } else {
        $('#linksModal').modal('show');
        $('#linksModal .modal-body').empty();
        $('#linksModal .modal-body').append('<h5 class="text-center">There was an error</h5><p class="text-center">'+result.response+'</p>');
      }
    });

  }


  $('#start-login').click(function(e) {
    e.preventDefault();
    getMagicLink($('#inputEmail').val());
  });


});

</script>
<?php include('../includes/logged-out-footer.php'); ?>