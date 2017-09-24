<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url($action."/".$user_id); ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Add Mobile Bank</strong></h3>
                    </div>

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissable" >
                            <a href="#" class="close" data-dismiss="alert"><i class="fa fa-close"></i></a>
                            <strong><?php echo validation_errors(); ?></strong>
                        </div>
                    <?php endif; ?>

                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Country</label>
                            <div class="col-md-6 col-xs-12">
                                <select name="country_id" class="form-control" id="country">
                                    <option value="">Select Country ...</option>
                                    <?php foreach ($countries as $country) { ?>
                                        <option value="<?php echo $country->id?>"><?php echo $country->country_name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Mobile Bank</label>
                            <div class="col-md-6 col-xs-12">
                                <select name="account_id" class="form-control">
                                    <option value="">Select Mobile Bank</option>
                                    <?php foreach ($mb_types as $mb_type) { ?>
                                        <option value="<?php echo $mb_type->id?>"><?php echo $mb_type->mobile_bank_name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Account Number</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="Static form control">
                                    <input name="phone_number" type="text" class="form-control" placeholder="Account Number"/>
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
