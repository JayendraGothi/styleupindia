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
                    <th>Cashback Earned</th>
                    <th>Status</th>
                    <th>Estimated Confirmation Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $key => $order) { ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $order->order_id ?></td>
                        <td><?php echo format_date($order->date) ?></td>
                        <td><?php echo $order->merchant ?></td>
                        <td><?php echo $order->amount ?></td>
                        <td><?php echo $order->cashback ?></td>
                        <td><?php echo str_status($order->status) ?></td>
                        <td><?php echo format_date(add_months($order->date)) ?></td>
                        <td class="float">
                            <?php if (is_rejected($order->status)){?>
                            <div class="icon">
                                <button class="btn btn-danger btn-sm">WHY?</button>
                            </div>
                            <div class="message">
                                <div class="arrow_box"></div>
                                <?php echo $order->rejection_reason ?>
                            </div>
                            <?php }?>
                        </td>
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