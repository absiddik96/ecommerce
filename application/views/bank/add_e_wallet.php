<?php $this->load->view('admin/header'); ?>

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin_panel/add_ewallet/'.$user_id.'?url='.$pre_url); ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Add E-Wallet</strong></h3>
                    </div>

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissable" >
                            <a href="#" class="close" data-dismiss="alert"><i class="fa fa-close"></i></a>
                            <strong><?php echo validation_errors(); ?></strong>
                        </div>
                    <?php endif; ?>

                    <?php if ($success = $this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissable" >
                            <a href="#" class="close" data-dismiss="alert"><i class="fa fa-close"></i></a>
                            <strong><?php echo $success; ?></strong>
                        </div>
                    <?php endif; ?>

                    <?php if ($failed = $this->session->flashdata('fail')) : ?>
                        <div class="alert alert-danger alert-dismissable" >
                            <a href="#" class="close" data-dismiss="alert"><i class="fa fa-close"></i></a>
                            <strong><?php echo $failed; ?></strong>
                        </div>
                    <?php endif; ?>

                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Select E-Wallet Type</label>
                            <div class="col-md-6 col-xs-12">
                                    <select name="ew_type_id" class="form-control">
                                        <option value="">Select E-Wallet</option>
                                        <?php foreach ($ew_types as $ew_type) { ?>
                                            <option value="<?php echo $ew_type->id?>"><?php echo $ew_type->ew_title?></option>
                                        <?php }?>
                                    </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-6 control-label">E-Wallet Email / Number</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="e_wallet_email" type="text" class="form-control" placeholder="E-Wallet Email / Number"/>
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
