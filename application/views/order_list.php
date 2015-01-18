<div class="jumbotron clearfix">
    <div class="col-md-10 col-md-offset-1 main">
        <div class="row">
            <div class="col-md-9 text-left">
                <h2>My Profile</h2>
            </div>
            <a href="<?php echo base_url(); ?>index.php/order/add" class="btn btn-primary pull-right">Add New Order</a>
        </div>
        <div class="row">
            <br/>
        </div>

        <div class="row">
            <table class="table table-stripped white-table ">
                <thead>
                <tr>
                    <th width="70">Sr.</th>
                    <th>Order No.</th>
                    <th>Order Date</th>
                    <th>Order Merchant</th>
                    <th>Order Amount</th>
                    <th>Status</th>
                    <th>Estimated Confirmation Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $key => $order) { ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $order->order_id ?></td>
                        <td><?php echo $order->date ?></td>
                        <td><?php echo $order->merchant ?></td>
                        <td><?php echo $order->amount ?></td>
                        <td><?php echo str_status($order->status) ?></td>
                        <td><?php echo add_months($order->date) ?></td>
                    </tr>
                <?php } ?>
                <?php if (sizeof($orders) <= 0){ ?>
                    <tr>
                        <td colspan="7">You haven't claimed any cashback yet</td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive">

        </div>
    </div>
</div>