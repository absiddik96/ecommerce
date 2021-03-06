<!-- PAGE CONTENT WRAPPER -->
<form action="<?php echo base_url('admin/store/addProduct'); ?>" method="post">
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-colorful">
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Product</h3>
                        </div>
                        <div class="panel-body">
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
                            <table class="table datatable">
                                <thead>
                                    <tr>

                                        <th>Select All <input type="checkbox" id="select_all" /></th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Store</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($product_details)):
                                        foreach ($product_details as $product_detail):
                                            $product_image = $this->product_image_m->get_image_by_product_code($product_detail->product_code);
                                            ?>
                                            <tr >
                                                <td>
                                                    <input name="product_code[]" type="checkbox" class="checkbox" value="<?= $product_detail->product_code ?>"/>
                                                </td>
                                                <td>
                                                    <div class="post">
                                                        <div class="post-media">
                                                            <img style="height: 150px;" src="<?php echo base_url("uploads/product_image/".$product_detail->product_code.'/thumbnail/' .$product_image->image); ?>"></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $product_detail->product_title; ?></td>
                                                <td><?php echo $product_detail->price; ?></td>
                                                <td><?php echo $product_detail->category_title; ?></td>
                                                <td><?php echo $product_detail->sub_category_title; ?></td>
                                                <td><?php echo $product_detail->store_name; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/store/showStoreProduct/' . $product_detail->product_code); ?>" class="btn  btn-primary"><i class="fa fa-lg fa-eye"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $product_detail->product_code; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                                    <!-- -------------------- delete Pop Up --------------------------- -->
                                                    <div class="modal fade" id="<?php echo $product_detail->product_code; ?>" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="alert alert-danger">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title ">Confirm Delete </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p >Are you want to delete this branch?</p>
                                                                    <a href="<?php echo base_url('admin/store/removeProduct/' . $product_detail->id); ?>" class="btn btn-danger">Yes</a>
                                                                    <a data-dismiss="modal" class="btn btn-success">No</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
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
</form>
