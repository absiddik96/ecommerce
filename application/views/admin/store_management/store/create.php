<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-name">Add Store</h3>
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
                        <div class="col-md-5">
                            <form method="post" action="<?php echo base_url('admin/store') ?>" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Country</label>
                                    <div class="col-md-8">
                                        <select name="country" class="form-control" id="country">
                                            <option value="">Select Country ...</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option value="<?php echo $country->id ?>"><?php echo $country->country_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Division / Province / State</label>
                                    <div class="col-md-8">
                                        <select name="division_state" class="form-control" id="division_state" disabled="">
                                            <option value="">Select Division / Province / State ...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">District / Citye</label>
                                    <div class="col-md-8">
                                        <select name="district_city" class="form-control" id="district_city" disabled="">
                                            <option value="">Select District / City ...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Upazila / Police Station</label>
                                    <div class="col-md-8">
                                        <select name="upazila_ps" class="form-control" id="upazila_ps" disabled="">
                                            <option value="">Select Upazila / Police Station ...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Union / Word</label>
                                    <div class="col-md-8">
                                        <select name="union_word" class="form-control" id="union_word" disabled="">
                                            <option value="">Select Union / Word ...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Village / Moholla Name</label>
                                    <div class="col-md-8">
                                        <select name="village_moholla" class="form-control" id="village_moholla" disabled="">
                                            <option value="">Select Village / Moholla Name ...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Store Name</label>
                                    <div class="col-md-8">
                                        <input name="store_name" class="form-control" type="text" placeholder="Enter Store Name">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" value="Add">
                                        <input class="btn btn-danger" type="reset" value="Reset">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">List of Store</h3>
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
                            <tr >
                                <th>Serial No</th>
                                <th>Country</th>
                                <th>Division / Province / State</th>
                                <th>District / City </th>
                                <th>Upazilas / Police Station </th>
                                <th>Union / Word </th>
                                <th>Village / Moholla </th>
                                <th>Store Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (!empty($stores)):
                                foreach ($stores as $store):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $store->country_name; ?></td>
                                        <td><?php echo $store->division_state_name; ?></td>
                                        <td><?php echo $store->district_city_name; ?></td>
                                        <td><?php echo $store->upazila_ps_name; ?></td>
                                        <td><?php echo $store->union_word_name; ?></td>
                                        <td><?php echo $store->village_moholla_name; ?></td>
                                        <td><?php echo $store->store_name; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/updateStore/' . $store->id); ?>" class="btn  btn-primary"><i class="fa fa-lg fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $store->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                            <!-- -------------------- delete Pop Up -----------------------------> -->
                                            <div class="modal fade" id="<?php echo $store->id; ?>" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="alert alert-danger">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title ">Confirm Delete </h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p >Are you want to delete this Brach?</p>
                                                            <a href="<?php echo base_url('admin/deleteStore/' . $store->id); ?>" class="btn btn-danger">Yes</a>
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
            <!-- END DEFAULT DATATABLE 
        </div>
    </div>
</div>
