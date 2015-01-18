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
                <div class="col-lg-10 col-lg-offset-1">
                    <form class="form-signin" action="<?php echo base_url() ?>index.php/login/process" method="post">
                        <?php
                        if (!is_null($msg)) {
                            echo "<div class='alert alert-warning'>" . $msg . "</div>";
                        }
                        ?>

                        <h2 class="form-signin-heading">Login</h2>
                        <br/>
                        <input type="email" id="inputEmail" class="form-control email" placeholder="Email address"
                               required autofocus
                               name="email">
                        </br>
                        <input type="password" id="inputPassword" class="form-control email" placeholder="Password"
                               required
                               name="password">

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12 text-left">
                                <button class="btn btn-sm btn-primary" type="submit">Sign in</button>
                            </div>
                        </div>
                        <br>
                        <div class="row text-left">
                            <div class="col-md-6">
                                <a type="button" class="pointer">Forgot Password?</a>
                            </div>
                            <div class="col-md-6">
                                <a type="button" class="btn btn-success pull-right" href="<?php echo base_url()?>index.php/login/register">New? Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>