<div class="jumbotron">
  <div class="row">
    <div class="col-lg-6">
      <h1>Claim Your Cashback</h1>

      <p class="lead">Now that you have shopped from our partner sites. Its time to get wat you deserve. Claim
        your
        cashback here.</p>


    </div>
    <div class="col-lg-6 white">
      <div class="row">
        <div class="col-lg-12 text-left">
          <div>
            <?php if ($password_set) { ?>
                <h5>Password Change Please login Through Login Page</h5>
            <?php }else {?>
              <?php echo validation_errors('<div class="alert alert-danger fade in">', '</div>'); ?>
              <form method="post" action="">
                <h2 class="form-signin-heading text-center">Reset Password</h2>

                <div class="form-group">
                  <label>Password*</label>
                  <input type="password" class="form-control email" name="password" placeholder="Enter A Password">
                </div>
                <div class="form-group">
                  <label>Confirm Password*</label>
                  <input type="password" class="form-control email" name="password_confirm"
                         placeholder="Enter Password Again">
                </div>
                <input name="submit" type="submit" class="btn btn-primary" name='submit' value="Submit"/>
              </form>
            <?php }?>
          </div>
          <!-- /container -->
        </div>
      </div>
    </div>
  </div>
</div>