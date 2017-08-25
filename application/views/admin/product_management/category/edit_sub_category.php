
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Sub Category</h2>
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
                        <h3 class="panel-title">Update Sub Category</h3>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <form method="post" action="<?php echo base_url('admin/updateSubCategory/'.$sub_category->id) ?>" class="form-inline">
                        <?php if (validation_errors()) { ?>

                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong><?php echo validation_errors(); ?></strong>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <input value="<?php echo $sub_category->sub_category_title; ?>" name="sub_category_title" class="form-control" type="text" placeholder="Enter Sub Category Title">
                        </div>
                        <div class="form-group">
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
