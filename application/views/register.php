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
                <div class="col-lg-10 col-lg-offset-1 text-left">
                    <form class="form-signin" action="<?php echo base_url() ?>index.php/login/register" method="post">
                        <?php echo validation_errors('<div class="alert-danger fade in">', '</div>'); ?>
                        <?php echo form_open('index.php/login/register'); ?>
                        <h2 class="form-signin-heading text-center">Register</h2>

                        <div class="form-group">
                            <label>Full Name*</label>
                            <input type="text" class="form-control email" name="full_name"
                                   placeholder="Enter Your First Name">
                        </div>
                        <div class="form-group">
                            <label>Email Address*</label>
                            <input type="email" class="form-control email" name="email"
                                   placeholder="Enter Your Email Address">
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" class="form-control email" name="password" placeholder="Enter A Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password*</label>
                            <input type="password" class="form-control email" name="password_confirm"
                                   placeholder="Enter Password Again">
                        </div>

                        <input name="submit" type="submit" class="btn btn-primary" value="Register"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row marketing">
    <div class="col-lg-6">
        <h4>Subheading</h4>

        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>

        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet
            fermentum.</p>

        <h4>Subheading</h4>

        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>

    <div class="col-lg-6">
        <h4>Subheading</h4>

        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>

        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet
            fermentum.</p>

        <h4>Subheading</h4>

        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>
</div>