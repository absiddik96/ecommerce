<!-- PAGE CONTENT WRAPPER -->
<form action="<?php echo base_url('admin/addDiscount/product'); ?>" method="post">
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-colorful">
                        <div class="panel-heading">
                            <h3 class="panel-title">Filter</h3>
                        </div>
                        <div class="panel-body">
                            <input id="minPrice" type="hidden" name="minPrice" value="<?=$min_price->minPrice;?>">
                            <input id="maxPrice" type="hidden" name="maxPrice" value="<?=$max_price->maxPrice;?>">

                            <input id="jsminPrice" type="hidden" name="jsminPrice" value="">
                            <input id="jsmaxPrice" type="hidden" name="jsmaxPrice" value="">

                            <input type="hidden" name="discount_type" value="<?=$discount_type?>">
                            <input type="hidden" name="discount" value="<?=$discount?>">
                            <input id="store_id" type="hidden" name="store" value="<?=$store?>">

                            <div class="col-md-3">
                                <div style="background-color:#424F9B;" class="alert">
                                    <label style="padding-bottom:12px; color:white" for="">Search</label><br>
                                    <div style="padding-bottom:16px;" class=""></div>
                                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ... ">
                                    <div style="padding-bottom:37px;" class=""></div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div style="background-color:#2072B2;" class="alert">
                                    <label style="padding-bottom:17px; color:white" for="">Price : <span id="spanOutput"></span> $</label><br>
                                    <div class="col-md-5"> 
                                        <input id="eMinPrice" class="form-control" type="" name="" value="<?=$min_price->minPrice;?>">
                                    </div>
                                    <div class="col-md-5">
                                        <input id="eMaxPrice" class="form-control" type="" name="" value="<?=$max_price->maxPrice;?>"> 
                                    </div>
                                    <div class="col-md-2">
                                        <i class="btn btn-primary fa fa-search"></i> 
                                    </div>
                                    <div style="padding-bottom:45px;" class=""></div>
                                    
                                    <div id="ab"></div>
                                    
                                    <div style="padding-bottom:22px;" class=""></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="background-color:#1D96BB;" class="alert">
                                    <label style="padding-bottom:12px; color:white" for="">Category</label><br>
                                    <div style="padding-bottom:16px;" class=""></div>
                                    <select  class="form-control" name="category" id="category">
                                        <option value="">Select Category</option>
                                        <?php foreach ($categorys as $category): ?>
                                            <option value="<?=$category->id?>"><?=$category->category_title?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <div style="padding-bottom:34px;" class=""></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="background-color:#68B9D1;" class="alert">
                                    <label style="padding-bottom:12px; color:white" for="">Sub Category</label><br>
                                    <div style="padding-bottom:16px;" class=""></div>
                                    <select class="form-control" name="sub_category" id="sub_category" disabled>
                                        <option value="">Select Sub Category</option>
                                    </select>
                                    <div style="padding-bottom:37px;" class=""></div>
                                </div>

                            </div>

                            <br><br>



                        </div>
                        <!-- END DEFAULT DATATABLE -->
                    </div>
                    <div class="col-md-12" style="padding-left: 0; padding-right: 0">
                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-colorful">
                            <?php if (validation_errors()) {?>

                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong><?php echo validation_errors(); ?></strong>
                            </div>
                            <?php }?>

                            <div class="panel-heading">
                                <h3 class="panel-title">List of Product</h3>
                            </div>
                            <div class="panel-body">
                                <div >
                                    <table id="myTable"  class="table">
                                        <thead>
                                            <tr>
                                                <th>Select All <input type="checkbox" id="select_all" /> </th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                            </tr>
                                        </thead>
                                        <tbody id="hide">

                                            <?php
                                            if (!empty($product_details)):
                                                foreach ($product_details as $product_detail):
                                                    $product_image = $this->product_image_m->get_image_by_product_code($product_detail->product_code);
                                                    ?>
                                                    <tr>
                                                      <td>
                                                          <input name="product_code[]" type="checkbox" class="checkbox" value="<?=$product_detail->product_code?>"/>
                                                      </td>
                                                      <td>
                                                          <div class="post">
                                                              <div class="post-media">
                                                                  <img style="height: 150px;" src="<?php echo base_url("uploads/product_image/" . $product_detail->product_code . "/thumbnail/" . $product_image->image); ?>"></a>
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
                                      <tbody id="price_range_product"></tbody>
                                  </table>

                              </div>

                              
                          </div>
                          <div class="panel-footer">
                            <input  class="pull-right btn btn-primary" type="submit" name="" value="Submit">
                        </div>
                    </div>
                    <!-- END DEFAULT DATATABLE -->
                </div>
            </div>
        </div>
    </div>

</form>
