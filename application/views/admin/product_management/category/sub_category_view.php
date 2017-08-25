
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
                        <h3 class="panel-title">Add Sub Category</h3>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <form method="post" action="<?php echo base_url('admin/subCategory') ?>" class="form-inline">
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
                                    <select name="category" class="form-control" id="demoSelect">
                                        <option value="">Select Category ...</option>
                                        <?php foreach ($categorys as $category): ?>
                                            <option value="<?php echo $category->id ?>"><?php echo $category->category_title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input name="sub_category_title" class="form-control" type="text" placeholder="Enter Sub Category Title">
                                </div>
                                <div class="form-group">
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
                        <h3 class="panel-title">List of Sub Category</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table datatable">
                            <?php if ($successup = $this->session->flashdata('successup')) { ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong><?= $successup; ?></strong>
                                </div>
                            <?php } elseif ($failup = $this->session->flashdata('failup')) { ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong><?= $failup; ?></strong>
                                </div>
                            <?php } ?>
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Sub Category Title</th>
                                    <th>Category Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (!empty($sub_categorys)):
                                    foreach ($sub_categorys as $sub_category):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $sub_category->sub_category_title; ?></td>
                                            <td><?php echo $sub_category->category_title; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/updateSubCategory/' . $sub_category->id); ?>" class="btn  btn-primary"><i class="fa fa-lg fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $sub_category->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                                <!---------------------- delete Pop Up ----------------------------->
                                                <div class="modal fade" id="<?php echo $sub_category->id; ?>" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title ">Confirm Delete </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <p style="font-size:14px">Are you want to delete this sub category?</p>
                                                                <a href="<?php echo base_url('admin/deleteSubCategory/' . $sub_category->id); ?>" class="btn btn-danger">Yes</a>
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
