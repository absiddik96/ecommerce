
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-name">Update Village / Moholla</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-5">
                            <form method="post" action="<?php echo base_url('admin/updateVillageMoholla/'.$village_moholla->id) ?>" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <?php if (validation_errors()) { ?>

                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <strong><?php echo validation_errors(); ?></strong>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Village / Moholla</label>
                                    <div class="col-md-8">
                                        <input value="<?php  echo $village_moholla->village_moholla_name;?>" name="village_moholla_name" class="form-control" type="text" placeholder="Enter Village / Moholla">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" value="Update">
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
