<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title><?php echo isset($title) ? $title : "" ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo asset_url(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo asset_url(); ?>/css/main.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo asset_url(); ?>css/home-page.css" rel="stylesheet">
    <link href="<?php echo asset_url(); ?>css/jquery-ui.min.css" rel="stylesheet">


    <script src="<?php echo asset_url(); ?>js/jquery-2.1.1.min.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <?php if (!isset($full_name)) { ?>
                <a class="navbar-brand" href="<?php echo login_url() ?>">StyleUpIndia</a>
            <?php } else { ?>
                <a class="navbar-brand" href="<?php echo base_url() ?>index.php/order/add">StyleUpIndia</a>
            <?php } ?>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($full_name)) { ?>
                <li role='presentation'><a href="<?php echo login_url() ?>">Login</a></li>
            <?php } else { ?>
                <li role='presentation'><a href="<?php echo base_url() ?>index.php/order">My
                        Profile(<?php echo $full_name; ?>)</a></li>
                <li role="presentation"><a href="<?php echo base_url() ?>index.php/order/add">Apply For CashBack</a>
                </li>
                <li role="presentation"><a href="<?php echo base_url() ?>index.php/bank">Bank Details</a></li>
                <li role='presentation'><a href="<?php echo base_url() ?>index.php/login/logout">Logout</a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
    <?= $body ?>
</div>
<div class="clearfix footer">
    <div class="col-lg-4">
        <h4>Useful Links</h4>
        <ul class="info-links">
            <li><a href="<?php echo base_url() ?>index.php/info">Any Missing Cashback</a></li>
            <li><a href="<?php echo base_url() ?>index.php/info/termsandconditions">Terms and Conditions</a></li>
            <li><a href="<?php echo base_url() ?>index.php/info/disclaimer">Disclaimer</a></li>
        </ul>
    </div>

    <div class="col-lg-4">
        <h4>Facebook</h4>

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=630882777003810&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-like" data-href="https://www.facebook.com/styleupindia" data-layout="standard" data-action="like"
             data-show-faces="true" data-share="true" data-width="330px"></div>
    </div>

    <div class="col-lg-4">
        <h4>Twitter</h4>

        <a href="https://twitter.com/styleupindia" class="twitter-follow-button" data-show-count="false"
           data-size="large">Follow @styleupindia</a>
        <script>!function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p + '://platform.twitter.com/widgets.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, 'script', 'twitter-wjs');</script>
        <a href="https://twitter.com/share" class="twitter-share-button" data-via="styleupindia"
           data-size="large">Tweet</a>
        <script>!function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p + '://platform.twitter.com/widgets.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, 'script', 'twitter-wjs');</script>
    </div>
</div>
<div class="clearfix footer copyright text-center">
    © 2015 Styleupindia.com
</div>
<script src="<?php echo asset_url(); ?>js/bootstrap.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery-ui.js"></script>
</body>
</html>
