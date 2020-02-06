<?php include('includes/logged-out-header.php'); ?>
<main id="logout">
  <div class="container">
    <section class="dc-logged-out">
      <form class="form-signin" action="/dc/index.php">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div class="my-3">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </section>
  </div>
</main>
<?php include('includes/logged-out-footer.php'); ?>