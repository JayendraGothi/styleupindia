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
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <?php if (!isset($full_name)) {?>
                <a class="navbar-brand" href="<?php echo login_url() ?>">StyleUpIndia</a>
            <?php }else{ ?>
                <a class="navbar-brand" href="<?php echo base_url() ?>index.php/order/add">StyleUpIndia</a>
            <?php } ?>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($full_name)) {?>
                <li role="presentation"><a href="<?php echo login_url() ?>">Apply For CashBack</a></li>
                <li role="presentation"><a href="<?php echo login_url() ?>">Bank Details</a></li>
                <li role='presentation'><a href="<?php echo login_url()?>">Login</a></li>
            <?php }else{ ?>
                <li role='presentation'><a href="<?php echo base_url()?>index.php/order">Welcome(<?php echo $full_name; ?>)</a></li>
                <li role="presentation"><a href="<?php echo base_url() ?>index.php/order/add">Apply For CashBack</a></li>
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
<div class="marketing clearfix">
    <div class="col-lg-4">
        <h4>Subheading</h4>

        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>

        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet
            fermentum.</p>

        <h4>Subheading</h4>

        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>

    <div class="col-lg-4">
        <h4>Subheading</h4>

        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>

        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet
            fermentum.</p>

        <h4>Subheading</h4>

        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>

    <div class="col-lg-4">
        <h4>Subheading</h4>

        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>

        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet
            fermentum.</p>

        <h4>Subheading</h4>

        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>
</div>
</body>
</html>
