<!-- PAGE CONTENT WRAPPER -->
<form action="<?php echo base_url('admin/store/addProduct'); ?>" method="post">
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-colorful">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Store Product</h3>
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
                        </div>
                        <div class="col-sm-12">
                            <div class="form-horizontal">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Store</label>
                                        <div class="col-sm-8">
                                            <select name="store_id" id="color" class="ui fluid search dropdown">
                                                <option value="">Select Store</option>
                                                <?php foreach ($stores as $store): ?>
                                                    <option value=" <?= $store->id ?> "><?= $store->store_name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="padding-top:15px;" class="">

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="panel-footer">
                            <input  class="pull-right btn btn-primary" type="submit" name="" value="Submit">
                        </div>
                    </div>
                    <!-- END DEFAULT DATATABLE -->
                </div>


                <!-- <div class="col-md-12"> -->
                    <!-- START DEFAULT DATATABLE -->
                    <!-- <div class="panel panel-colorful">
                        <div class="panel-heading">
                            <h3 class="panel-title">Filter</h3>
                        </div>
                        <div class="panel-body">
dfsdf
                        </div>
                    </div> -->
                    <!-- END DEFAULT DATATABLE -->
                <!-- </div> -->


                <div class="col-md-12">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-colorful">
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Product</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>

                                        <th>Select All <input type="checkbox" id="select_all" /></th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($product_details)):
                                        foreach ($product_details as $product_detail):
                                            $product_image = $this->product_image_m->get_image_by_product_code($product_detail->product_code);
                                            ?>
                                            <tr>
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
