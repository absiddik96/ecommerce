
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-name">Update District / City</h3>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <form method="post" action="<?php echo base_url('admin/updateDistrictCity/'.$district_city->id) ?>" class="form-inline" role="form" enctype="multipart/form-data">
                                <?php if (validation_errors()) { ?>

                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <strong><?php echo validation_errors(); ?></strong>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label style="padding-right:69px;padding-left:16px" class="control-label">District / City Name</label>
                                    <input name="district_city_name" value="<?php  echo $district_city->district_city_name;?>" class="form-control" type="text" placeholder="Enter District / City">
                                </div><br><br>
                                <div style="padding-right:33px;padding-left:16px" class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Update">
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
