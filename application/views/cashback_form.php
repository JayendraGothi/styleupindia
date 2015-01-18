<div class="jumbotron">
    <div class="row">
        <div class="col-lg-6">
            <h1>Claim Your Cashback</h1>

            <p class="lead">Now that you have shopped from our partner sites. Its time to get wat you deserve. Claim
                your
                cashback here.</p>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered white-table">
                        <tr>
                            <th colspan="2" class="text-center">
                                Profile
                            </th>
                        </tr>
                        <tr>
                            <th>Total Pending Amount</th>
                            <td>Rs. <?php echo $totals['total_pending']; ?></td>
                        </tr>
                        <tr>
                            <th>Total Confirmed</th>
                            <td>Rs. <?php echo $totals['total_confirmed']; ?></td>
                        </tr>
                        <tr>
                            <th>Total Paid</th>
                            <td>Rs. <?php echo $totals['total_paid']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 white">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div>
                        <?php echo validation_errors('<div class="alert alert-danger fade in">', '</div>'); ?>
                        <form method="post" action="">
                            <h2 class="form-signin-heading text-center">Apply For Cashback</h2>

                            <div class="form-group">
                                <label>Order Id*</label>
                                <input type="text" class="form-control" name="order_id" placeholder="Eg J12345"
                                       value="<?php echo set_value('order_id'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Order Date*</label>
                                <input type="date" class="form-control" name="date" placeholder="Eg 12/07/2015"
                                       value="<?php echo set_value('date'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Order Merchant*</label>
                                <input type="text" class="form-control" name="merchant"
                                       placeholder="Flipkart,Amazon etc"
                                       value="<?php echo set_value('merchant'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Order Amount*</label>
                                <input type="text" class="form-control" name="amount" placeholder="Eg Rs.456"
                                       value="<?php echo set_value('amount'); ?>"/>
                            </div>
                            <input name="submit" type="submit" class="btn btn-primary" name='submit' value="Submit"/>
                        </form>
                    </div>
                    <!-- /container -->
                </div>
            </div>
        </div>
    </div>
</div>