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
                <div class="col-lg-12 text-left">
                    <?php if (!is_null($bank)) { ?>
                        <h2 class="form-signin-heading text-center">Bank Details</h2>
                        <table class="table table-bordered">
                            <tr>
                                <th>Bank Holder</th>
                                <td><?php echo $bank->holder_name ?></td>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td><?php echo $bank->name ?></td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td><?php echo $bank->account_number ?></td>
                            </tr>
                            <tr>
                                <th>Branch</th>
                                <td><?php echo $bank->branch ?></td>
                            </tr>
                            <tr>
                                <th>IFSC Code</th>
                                <td><?php echo $bank->ifsc_code ?></td>
                            </tr>
                        </table>
                        <a class="btn btn-primary pull-right"
                           href="<?php echo base_url(); ?>index.php/bank/update/<?php echo $bank->id ?>">Edit</a>
                    <?php } else { ?>
                        <div>
                            <?php echo validation_errors('<div class="alert-danger fade in">', '</div>'); ?>
                            <form method="post" action="<?php echo base_url() ?>index.php/bank/add">
                                <h2 class="form-signin-heading text-center">Bank Details</h2>

                                <div class="form-group">
                                    <label>Name of Bank Account Holder</label>
                                    <input type="text" class="form-control" name="holder_name"
                                           placeholder="Bank Holder Name"
                                           value="<?php echo set_value('holder_name'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Bank Name"
                                           value="<?php echo set_value('name'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Bank Branch</label>
                                    <input type="text" class="form-control" name="branch" placeholder="Branch">
                                </div>
                                <div class="form-group">
                                    <label>Bank Account Number</label>
                                    <input type="text" class="form-control" name="account_number"
                                           placeholder="Account Number">
                                </div>
                                <div class="form-group">
                                    <label>IFSC Code</label>
                                    <input type="text" class="form-control" name="ifsc_code"
                                           placeholder="IFSC Code">
                                </div>
                                <?php if (!is_null($bank)) { ?>
                                    <input name="submit" type="submit" class="btn btn-primary" value="Update"/>
                                <?php } else { ?>
                                    <input name="submit" type="submit" class="btn btn-primary" value="Save"/>
                                <?php } ?>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
