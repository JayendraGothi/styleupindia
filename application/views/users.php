<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Style Up India | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo asset_url(); ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo asset_url(); ?>css/dashboard.css" rel="stylesheet">

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
                <li role='presentation'><a
                        href="<?php echo base_url() ?>index.php/admin">Welcome(<?php echo $full_name; ?>)</a></li>
                <li role='presentation'><a href="<?php echo base_url() ?>index.php/login/logout">Logout</a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 main">
            <h1 class="page-header">All Cashback Orders</h1>

            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Banks</th>
                            <th>Branch</th>
                            <th>Account Number</th>
                            <th>IFSC Code</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $key => $user) { ?>
                            <tr>
                                <td><?php echo $user->full_name ?></td>
                                <td><?php echo $user->email ?></td>
                                <td><?php echo $user->name ?></td>
                                <td><?php echo $user->branch ?></td>
                                <td><?php echo $user->account_number ?></td>
                                <td><?php echo $user->ifsc_code ?></td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url() ?>index.php/order/user/<?php echo $user->id; ?>">
                                        View
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
</body>
</html>
