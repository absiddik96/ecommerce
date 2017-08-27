
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Brand</h2>
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
                        <h3 class="panel-title">Add Brand</h3>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <form method="post" action="<?php echo base_url('admin/brand') ?>" class="form-inline" role="form" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label style="padding-right:60px;padding-left:16px" class="control-label">Category</label>
                                    <select name="category" class="form-control" id="category">
                                        <option value="">Select Category ...</option>
                                        <?php foreach ($categorys as $category): ?>
                                            <option value="<?php echo $category->id ?>"><?php echo $category->category_title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div><br><br>
                                <div class="form-group">
                                    <label style="padding-right:33px;padding-left:16px" class="control-label">Sub Category</label>
                                    <select name="sub_category" class="form-control" id="sub_category" disabled="">
                                        <option value="">Select Sub Category ...</option>
                                    </select>
                                </div><br><br>
                                <div class="form-group">
                                    <label style="padding-right:35px;padding-left:16px" class="control-label">Brand Name;</label>
                                    <input name="brand_name" class="form-control" type="text" placeholder="Enter Brand Name">
                                </div><br><br>

                                <div class="form-group">
                                    <label style="padding-right:40px;padding-left:16px" class="control-label">Brand Logo;</label>
                                    <input type="file" class="fileinput btn-primary" name="brand_logo" id="filename" title="Browse file" style="left: -148.25px; top: 5px;">
                                </div><br><br>

                                <div style="padding-right:33px;padding-left:16px" class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Add">
                                    <input class="btn btn-danger" type="reset" value="Reset">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->
            </div>
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Brand</h3>
                    </div>
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
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Brand Logo</th>
                                    <th>Brand Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (!empty($brands)):
                                    foreach ($brands as $brand):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td>
                                                <div class="post">
                                                    <div class="post-media">
                                                        <img style="height: 150px;" src="<?php echo base_url("uploads/brand_logo/".$brand->brand_logo); ?>"></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $brand->brand_name; ?></td>
                                            <td><?php echo $brand->category_title; ?></td>
                                            <td><?php echo $brand->sub_category_title; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/updateBrand/' . $brand->id); ?>" class="btn  btn-primary"><i class="fa fa-lg fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $brand->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                                <!---------------------- delete Pop Up ----------------------------->
                                                <div class="modal fade" id="<?php echo $brand->id; ?>" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title ">Confirm Delete </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <p >Are you want to delete this branch?</p>
                                                                <a href="<?php echo base_url('admin/deleteBrand/' . $brand->id); ?>" class="btn btn-danger">Yes</a>
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
