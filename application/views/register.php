<div class="jumbotron">
    <div class="row">
        <div class="col-lg-6">
            <h1>Register</h1>
            <br/>
            <p class="lead">
                Join Our Community for free and
                start earning!
            </p>
            <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-testimonial" data-slide-to="1"></li>
                    <li data-target="#carousel-testimonial" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="carousel-caption">
                            <div class="col-md-10 col-md-offset-1 text">
                                "Wow, I shopped for Rs.3000 and got enormous Rs.450 Cashback from styleupindia with Just 1 extra click. I recommend styleupindia to everyone who shop online."
                                <div class="text-muted pull-right">-Unnati Jhaveri</div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-caption">
                            <div class="col-md-10 col-md-offset-1 text">
                                "Wow, I shopped for Rs.3000 and got enormous Rs.450 Cashback from styleupindia with Just 1 extra click. I recommend styleupindia to everyone who shop online."
                                <div class="text-muted pull-right">-Unnati Jhaveri</div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-caption">
                            <div class="col-md-10 col-md-offset-1 text">
                                "Wow, I shopped for Rs.3000 and got enormous Rs.450 Cashback from styleupindia with Just 1 extra click. I recommend styleupindia to everyone who shop online."
                                <div class="text-muted pull-right">-Unnati Jhaveri</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 white">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-left">
                    <form class="form-signin" action="<?php echo base_url() ?>index.php/login/register" method="post">
                        <?php echo validation_errors('<div class="alert-danger fade in">', '</div>'); ?>
                        <?php echo form_open('index.php/login/register'); ?>
                        <h2 class="form-signin-heading text-center"></h2>

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