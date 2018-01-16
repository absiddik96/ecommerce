<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Store</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="<?php echo base_url('admin/updateStore/' . $store->id) ?>" class="form-horizontal">
                        <?php if (validation_errors()) { ?>

                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong><?php echo validation_errors(); ?></strong>
                            </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Store Name</label>
                                <div class="col-md-8">
                                    <input value="<?php echo $store->store_name; ?>" name="store_name" class="form-control" type="text" placeholder="Enter Store Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <div class="pull-right">
                                        <input class="btn btn-primary" type="submit" value="Update">
                                        <input class="btn btn-danger" type="reset" value="Reset">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>

</div>
