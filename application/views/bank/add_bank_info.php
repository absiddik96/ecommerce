<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url($action."/".$user_id); ?>">
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

                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bank Name</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="bank_name" type="text" class="form-control" placeholder="Bank Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-6 control-label">Account Name</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="ac_name" type="text" class="form-control" placeholder="Account Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Account Number</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="ac_number" type="text" class="form-control" placeholder=" Account Number"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">IBAN / Routing Number</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="iban_number" type="text" class="form-control" placeholder="IBAN / Routing Number"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Swift Code</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="swift_code" type="text" class="form-control" placeholder="Swift Code"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bank Address</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <textarea name="bank_address" type="text" rows="5" class="form-control" placeholder="Bank Address"></textarea>

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
