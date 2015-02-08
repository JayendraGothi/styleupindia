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
    <div class="col-md-12">
        <div class="navbar-header">
            <?php if (!isset($full_name)) {?>
                <a class="navbar-brand" href="<?php echo login_url() ?>">StyleUpIndia</a>
            <?php }else{ ?>
                <a class="navbar-brand" href="<?php echo base_url() ?>index.php/order/add">StyleUpIndia</a>
            <?php } ?>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($full_name)) {?>
                <li role='presentation'><a href="<?php echo login_url()?>">Login</a></li>
            <?php }else{ ?>
                <li role='presentation'><a href="<?php echo base_url()?>index.php/admin">Welcome(<?php echo $full_name; ?>)</a></li>
                <li role='presentation'><a href="<?php echo base_url()?>index.php/user">Users</a></li>
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
                            <th>Order Id</th>
                            <th>Order Date</th>
                            <th>Order Merchant</th>
                            <th>Order Amount</th>
                            <th>Cashback Earned</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Rejection Reason</th>
                            <th>Confirmation Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $key => $order) { ?>
                            <tr>
                                <td><?php echo $order->full_name ?></td>
                                <td><?php echo $order->order_id ?></td>
                                <td><?php echo $order->date ?></td>
                                <td><?php echo $order->merchant ?></td>
                                <td><?php echo $order->amount ?></td>
                                <td><?php echo $order->cashback ?></td>
                                <td><?php echo str_status($order->status) ?></td>
                                <td><?php echo $order->notes ?></td>
                                <td><?php echo $order->rejection_reason ?></td>
                                <td><?php echo add_months($order->date) ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                            data-toggle="modal" data-target="#updateModal"
                                            data-id="<?php echo $order->id; ?>">
                                        Update
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <form method="post" action="<?php echo base_url(); ?>index.php/admin/status" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="myselect">
                                        <option value="0">Pending</option>
                                        <option value="1">Under Process</option>
                                        <option value="2">Approved</option>
                                        <option value="3">Credited</option>
                                        <option value="4">Rejected</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Cashback Credited</label>
                                    <input type="text" name="cashback"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="notes" id="" class="form-control"></textarea>
                                </div>
                                <div class="form-group rejection_reason hide">
                                    <label>Rejection_reason</label>
                                    <textarea name="rejection_reason" id="" class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="order_id" id="order_id">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="submit" value="Save">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#updateModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var recipient = button.data('id');
                console.log(recipient);
                var modal = $(this);
                modal.find('#order_id').val(recipient);
            });
        });

        $( "#myselect" ).change(function(){
            var value = $(this).val();
            if (value == 4){
                $(".rejection_reason").removeClass('hide');
            }else{
                $(".rejection_reason").addClass('hide');
            }
        });
    </script>
</body>
</html>
