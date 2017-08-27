
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Brand</h2>
</div>
<!-- END PAGE TITLE -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update Brand</h3>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <form method="post" action="<?php echo base_url('admin/updateBrand/' . $brand->id) ?>" class="form-inline" enctype="multipart/form-data">
                                <?php if (validation_errors()) { ?>

                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <strong><?php echo validation_errors(); ?></strong>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label style="padding-right:15px;padding-left:16px" class="control-label">Brand Name</label>
                                    <input value="<?php echo $brand->brand_name; ?>" name="brand_name" class="form-control" type="text" placeholder="Enter Brand Name">
                                </div><br><br>
                                <div class="form-group">
                                    <label style="padding-right:20px;padding-left:16px" class="control-label">Brand Logo;</label>
                                    <img style="height: 50px" id="brand_logo" src="<?php echo base_url("uploads/brand_logo/".$brand->brand_logo); ?>">
                                    <input type="file" class="fileinput btn-primary" name="brand_logo" id="filename" title="Browse file" style="left: -148.25px; top: 5px;">
                                </div><br><br>
                                <div style="padding-right:15px;padding-left:16px" class="form-group">
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
