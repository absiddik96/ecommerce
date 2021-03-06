<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <?php if ($success = $this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissable">
                    <strong><?php echo $success; ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($failed = $this->session->flashdata('fail')) : ?>
                <div class="alert alert-danger alert-dismissable">
                    <strong><?php echo $failed; ?></strong>
                </div>
            <?php endif; ?>

            <div class="col-md-12">
                <div class="col-md-12">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Product Image's</h1>
                        </div>
                        <div class="panel-body">
                            <!-- Trigger the modal with a button -->
                            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php foreach ($product_images as $product_image) {?>
                                                <img width="200" class="img-thumbnail" data-toggle="modal" data-target="#<?php echo $product_image->id;?>" src="<?php echo base_url("uploads/product_image/".$product_detail->product_code.'/thumbnail/' .$product_image->image); ?>" alt="no image found">

                                                <!-- Modal -->
                                                <div id="<?php echo $product_image->id;?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">.</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img class="img-thumbnail" data-toggle="modal" data-target="#myModal" src="<?php echo base_url("uploads/product_image/".$product_detail->product_code.'/' .$product_image->image); ?>" alt="no image found">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php }?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>
                <div class="col-md-12">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Product Details</h1>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="10%">Title</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php if(!empty($product_detail->product_title)) echo $product_detail->product_title;?></td>

                                    </tr>
                                    <tr>
                                        <td width="10%">Description</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php if(!empty($product_description->description)) echo $product_description->description;?></td>

                                    </tr>

                                    <tr>
                                        <td width="10%">Weight (Kg)</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php if(!empty($product_detail->weight)) echo $product_detail->weight;?></td>

                                    </tr>

                                    <tr>
                                        <td width="10%">Price</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php if(!empty($product_detail->price)) echo $product_detail->price;?></td>

                                    </tr>



                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>

                <div class="col-md-12">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="10%">Brand</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php if(!empty($product_brand->brand_name)) echo $product_brand->brand_name;?></td>


                                    </tr>
                                    <tr>
                                        <td width="10%">Size</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php
                                        if(!empty($product_sizes)){
                                            $i = count($product_sizes);

                                            foreach ($product_sizes as $product_size) {

                                                echo $product_size->size_title.' ';
                                                if ($i>1) {
                                                    echo ", ";
                                                }
                                                $i--;
                                            }
                                        }

                                        ?></td>


                                    </tr>

                                    <tr>
                                        <td width="10%">Color</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php
                                        if(!empty($product_colors)){
                                            $i = count($product_colors);

                                            foreach ($product_colors as $product_color) {

                                                echo $product_color->color_title.' ';
                                                if ($i>1) {
                                                    echo ", ";
                                                }
                                                $i--;
                                            }
                                        }
                                        ?></td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>
                <div class="col-md-12">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="10%">Category</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php if(!empty($product_category_sub_category->category_title)) echo $product_category_sub_category->category_title;?></td>

                                    </tr>
                                    <tr>
                                        <td width="10%">Sub Category</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?php if(!empty($product_category_sub_category->sub_category_title)) echo $product_category_sub_category->sub_category_title;?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>
            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
