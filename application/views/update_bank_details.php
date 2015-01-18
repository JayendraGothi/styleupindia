<div class="jumbotron">
    <div class="row">
        <div class="col-lg-6">
            <h1>Claim Your Cashback</h1>

            <p class="lead">Now that you have shopped from our partner sites. Its time to get wat you deserve. Claim
                your
                cashback here.</p>
        </div>
        <div class="col-lg-6 white text-left">
            <div>
                <?php echo validation_errors('<div class="alert alert-danger fade in">', '</div>'); ?>
                <form method="post" action="<?php echo base_url() ?>index.php/bank/update/<?php echo $id ?>">
                    <h2 class="form-signin-heading text-center">Bank Details</h2>

                    <div class="form-group">
                        <label>Name of Bank Account Holder</label>
                        <input type="text" class="form-control" name="holder_name" placeholder="Bank Holder Name"
                               value="<?php echo set_value('holder_name', (isset($holder_name)) ? $holder_name : ''); ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Bank Name"
                               value="<?php echo set_value('name', (isset($name)) ? $name : ''); ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Bank Branch</label>
                        <input type="text" class="form-control" name="branch" placeholder="Branch"
                               value="<?php echo set_value('branch', (isset($branch)) ? $branch : ''); ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Bank Account Number</label>
                        <input type="text" class="form-control" name="account_number" placeholder="Account Number"
                               value="<?php echo set_value('account_number', (isset($account_number)) ? $account_number : ''); ?>"/>
                    </div>
                    <div class="form-group">
                        <label>IFSC Code</label>
                        <input type="text" class="form-control" name="ifsc_code" placeholder="IFSC Code"
                               value="<?php echo set_value('ifsc_code', (isset($ifsc_code)) ? $ifsc_code : ''); ?>"/>
                    </div>
                    <input name="submit" type="submit" class="btn btn-primary" value="Update"/>
                </form>
            </div>
        </div>
    </div>
</div>



