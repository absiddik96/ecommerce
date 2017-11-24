<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <?php if(empty($product_description)){
        $product_des = '';
    }else{
        $product_des = $product_description->id;
    }

    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <form method="post" action="<?php echo base_url('admin/editProductDetails/'.$product_code.'/'.$product_des); ?>" enctype="multipart/form-data">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Product Details</h3>
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
                                                <h3 class="card-title"></h3>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="control-label">Title</label>
                                                        <input value="<?php echo $product_detail->product_title?>" name="product_title" class="form-control" type="text" placeholder="Enter product title">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <div >
                                                            <textarea name="description" class="summernote"><?php if(!empty($product_description->description)) echo $product_description->description; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Weight (Kg)</label>
                                                <input value="<?= $product_detail->weight ?>" name="weight" class="form-control" type="text" placeholder="Enter product Weight">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Price</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                    <input value="<?= $product_detail->price ?>" id="" type="text" class="form-control" name="price" placeholder="Price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="pull-right ">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-save"></i> Save</button>
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-lg fa-refresh"></i> Refresh</button>
                                    <a class="btn btn-success" href="<?php echo base_url('admin/viewProduct/' . $product_code); ?>">Back To Product</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>
    </div>

</div>
