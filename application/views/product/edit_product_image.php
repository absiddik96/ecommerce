<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <form method="post" action="<?= base_url('admin/editProductImage/'.$product_code);?>" enctype="multipart/form-data">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <h3 class="panel-title">Update Product Image's</h3>
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
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label class="control-label">Product Image's <i style="color:gray">( Can Select Multiple Image)</i></label>
                                                    <input required type="file" id="file" class="file" multiple name="files[]">
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="pull-left ">
                                            <a class="btn btn-success" href="<?php echo base_url('admin/viewProduct/' . $product_code); ?>">Back To Product</a>
                                        </h3>
                                        <h3 class="pull-right ">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-save"></i> Save</button>
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-lg fa-refresh"></i> Refresh</button>
                                        </h3>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
                <!-- END DEFAULT DATATABLE -->
            </div>
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">

                    <div class="panel-body">
                        <?php if ($success = $this->session->flashdata('successup')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong><?= $success; ?></strong>
                            </div>
                        <?php } elseif ($fail = $this->session->flashdata('failup')) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong><?= $fail; ?></strong>
                            </div>
                        <?php } ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (!empty($product_images)):
                                    foreach ($product_images as $product_image):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td>
                                                <img width="200" class="img-thumbnail" data-toggle="modal" data-target="#<?php echo $product_image->id;?>" src="<?php echo base_url("uploads/product_image/".$product_image->product_code.'/thumbnail/' .$product_image->image); ?>" alt="no image found">

                                                <!-- Modal -->
                                                <div id="<?php echo $product_image->id;?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <img class="img-thumbnail" data-toggle="modal" data-target="#myModal" src="<?php echo base_url("uploads/product_image/".$product_image->product_code.'/' .$product_image->image); ?>" alt="no image found">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#a' . $product_image->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                                <!---------------------- delete Pop Up ----------------------------->
                                                <div class="modal fade" id="<?php echo "a".$product_image->id; ?>" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title ">Confirm Delete </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <p >Are you want to delete this Image?</p>
                                                                <a href="<?php echo base_url('admin/deleteProductImage/' . $product_image->id); ?>" class="btn btn-danger">Yes</a>
                                                                <a data-dismiss="modal" class="btn btn-success">No</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>


    </div>

</div>
