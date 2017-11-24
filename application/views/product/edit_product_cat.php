<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <form method="post" action="<?= base_url('admin/editProductBrand/'.$product_code);?>" enctype="multipart/form-data">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <h3 class="panel-title">Update Product Brand</h3>
                        </div>
                        <div class="panel-body">
                            <div class="">

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <?php if (validation_errors()) { ?>

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                        <strong><?php echo validation_errors(); ?></strong>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Category</label>
                                                                <select name="category" class="ui fluid search selection  dropdown" id="category">
                                                                    <option value="">Select Category ...</option>
                                                                    <?php foreach ($categorys as $category): ?>
                                                                        <option value="<?php echo $category->id ?>"><?php echo $category->category_title; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Sub Category</label>
                                                                <select name="sub_category" class="form-control" id="sub_category" disabled>
                                                                    <option value="">Select Sub Category ...</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="pull-left ">

                                        </h3>
                                        <h3 class="pull-right ">

                                            <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-save"></i> Save</button>
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-lg fa-refresh"></i> Refresh</button>
                                            <a class="btn btn-success" href="<?php echo base_url('admin/viewProduct/' . $product_code); ?>">Back To Product</a>
                                        </h3>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
                <!-- END DEFAULT DATATABLE -->
            </div>

        </div>


    </div>

</div>
