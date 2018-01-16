<!-- PAGE CONTENT WRAPPER -->
<form action="<?php echo base_url('admin/addDiscount'); ?>" method="post">
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-colorful">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Discount</h3>
                        </div>
                        <div class="panel-body">
                            <?php if (validation_errors()) { ?>

                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong><?php echo validation_errors(); ?></strong>
                                </div>
                            <?php } ?>
                            <?php if ($success = $this->session->flashdata('success')) { ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong><?= $success; ?></strong>
                                </div>
                            <?php } elseif ($fail = $this->session->flashdata('fail')) { ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong><?= $fail; ?></strong>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm-12">

                            <div class="form-horizontal">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Store</label>
                                    <div class="col-sm-6">
                                        <select name="store" id="store" class="ui fluid search dropdown">
                                            <option value="">Select Store</option>
                                            <?php foreach ($stores as $store): ?>
                                                <option value=" <?= $store->id ?> "><?= $store->store_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Discount Type</label>
                                    <div class="col-sm-6">
                                        <select name="discount_type" id="discount_type" class="ui fluid search dropdown">
                                            <option value="">Select Discount Type</option>
                                            <option value=" ">Select Discount Type</option>
                                            <option value="1">Percentage</option>
                                            <option value="2">Amount</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Discount</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="discount" value="">
                                    </div>
                                </div>



                            </div>
                            <br><br>
                        </div>
                        <div class="panel-footer">
                            <input  class="pull-right btn btn-primary" type="submit" name="" value="Submit">
                        </div>
                    </div>
                    <!-- END DEFAULT DATATABLE -->
                </div>
            </div>
        </div>
    </div>
</form>
