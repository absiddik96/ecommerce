<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <form method="post" action="<?php echo base_url('admin/addProduct'); ?>" enctype="multipart/form-data">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="pull-right ">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-save"></i> Save</button>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-lg fa-refresh"></i> Refresh</button>
                            </h3>
                            <h3 class="panel-title">Add Product</h3>
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
                                        <div class="col-md-8">
                                            <div class="card">
                                                <h3 class="card-title"></h3>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="control-label">Title</label>
                                                        <input name="product_title" class="form-control" type="text" placeholder="Enter product title">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <div >
                                                            <textarea placeholder="Enter product description" name="description" class="summernote"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card">
                                                <div class="card-body">
                                                    <label class="control-label">Product Image's</label>
                                                    <input required type="file" id="file" class="file" multiple name="files[]">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">

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
                                                    <div class="form-group">
                                                        <label class="control-label">Brand</label>
                                                        <select name="company" class="ui fluid search selection  dropdown" id="company">
                                                            <option value="">Select Company ...</option>
                                                            <?php foreach ($companys as $company): ?>
                                                                <option value="<?php echo $company->id ?>"><?php echo $company->brand_name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label class="control-label">Size</label>
                                                        <select name="size[]" id="size" multiple="" class="ui fluid search multiple selection  dropdown">
                                                            <option value="">Select product size ...</option>
                                                            <?php foreach ($sizes as $size): ?>
                                                                <option value="<?php echo $size->id ?>"><?php echo $size->size_title; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Color</label>
                                                        <select name="color[]" id="color" multiple="" class="ui fluid search multiple selection  dropdown">
                                                            <option value="">Select product color ...</option>
                                                            <?php foreach ($colors as $color): ?>
                                                                <option value="<?php echo $color->id ?>"><?php echo $color->color_title; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Weight (Kg)</label>
                                                        <input name="weight" class="form-control" type="text" placeholder="Enter product Weight">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Price</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                            <input id="" type="text" class="form-control" name="price" placeholder="Price">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
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
