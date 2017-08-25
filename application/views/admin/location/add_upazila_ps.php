
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-name">Add Upazila / Police Station</h3>
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
                        <div class="col-md-5">
                            <form method="post" action="<?php echo base_url('admin/addUpazilaPS') ?>" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Country</label>
                                    <div class="col-md-8">
                                        <select name="country" class="form-control" id="country">
                                            <option value="">Select Country ...</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option value="<?php echo $country->id ?>"><?php echo $country->country_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Division / Province / State</label>
                                    <div class="col-md-8">
                                        <select name="division_state" class="form-control" id="division_state" disabled="">
                                            <option value="">Select Division / Province / State ...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">District / Citye</label>
                                    <div class="col-md-8">
                                        <select name="district_city" class="form-control" id="district_city" disabled="">
                                            <option value="">Select District / City ...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Upazila / Police Station Name</label>
                                    <div class="col-md-8">
                                        <input name="upazila_ps_name" class="form-control" type="text" placeholder="Enter Upazila / Police Station">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" value="Add">
                                        <input class="btn btn-danger" type="reset" value="Reset">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>
    </div>
</div>
