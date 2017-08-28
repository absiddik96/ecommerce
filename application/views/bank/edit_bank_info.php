<?php $this->load->view('admin/header'); ?>

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url('Admin_panel/update_bank_info/'.$bank_info->id.'?url='.$pre_url); ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Bank Info</strong></h3>
                    </div>

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissable" >
                            <a href="#" class="close" data-dismiss="alert"><i class="fa fa-close"></i></a>
                            <strong><?php echo validation_errors(); ?></strong>
                        </div>
                    <?php endif; ?>

                    <?php if ($success = $this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissable">
                            <strong><?php echo $success; ?></strong>
                        </div>
                    <?php endif; ?>

                    <?php if ($failed = $this->session->flashdata('fail')) : ?>
                        <div class="alert alert-danger alert-dismissable">
                            <strong><?php echo $failed; ?></strong>
                        </div>
                    <?php endif; ?>

                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bank Name</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="bank_name" type="text" value="<?php echo $bank_info->bank_name; ?>" class="form-control" placeholder="Bank Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-6 control-label">Account Name</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="ac_name" type="text" class="form-control" value="<?php echo $bank_info->ac_name; ?>" placeholder="Account Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Account Number</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="ac_number" type="text" class="form-control"
                                    value="<?php echo $bank_info->ac_number; ?>" placeholder=" Account Number"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">IBAN / Routing Number</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="iban_number" type="text" class="form-control" value="<?php echo $bank_info->iban_number; ?>" placeholder="IBAN / Routing Number"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Swift Code</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="swift_code" type="text" class="form-control" value="<?php echo $bank_info->swift_code; ?>" placeholder="Swift Code"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bank Address</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <textarea name="bank_address" type="text" rows="5" class="form-control" placeholder="Bank Address"><?php echo $bank_info->bank_address; ?></textarea>

                                </div>
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"></label>
                            <div class="col-md-6 col-xs-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Clear Form</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<?php $this->load->view('admin/footer'); ?>
