<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Division / Province / State</h3>
                    </div>
                    <div class="panel-body tab-content">
                        <div class="">
                            <form method="post" action="<?php echo base_url('admin/divisionState') ?>" class="form-inline">
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
                                    <label class="control-label">Country</label><br><br>
                                    <select name="country_id" class="form-control" id="demoSelect">
                                        <option value="">Select Country ...</option>
                                        <?php foreach ($countrys as $country): ?>
                                            <option value="<?php echo $country->id ?>"><?php echo $country->country_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div><br><br>
                                <div class="form-group">
                                    <label class="control-label">Division / Province / State</label><br><br>
                                    <input name="division_state_name" class="form-control" type="text" placeholder="Enter Division / State">
                                </div>


                                <br><br>
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
                        <h3 class="panel-title">List of Division / Province / State</h3>
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
                                    <th>Country Name</th>
                                    <th>Division / Province / State Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (!empty($division_states)):
                                    foreach ($division_states as $division_state):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $division_state->country_name; ?></td>
                                            <td><?php echo $division_state->division_state_name; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/updateDivisionState/' . $division_state->id); ?>" class="btn  btn-primary"><i class="fa fa-lg fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $division_state->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                                <!---------------------- delete Pop Up ----------------------------->
                                                <div class="modal fade" id="<?php echo $division_state->id; ?>" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title ">Confirm Delete </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <p style="font-size:14px">Are you want to delete this Division / Province / State?</p>
                                                                <a href="<?php echo base_url('admin/deleteDivisionState/' . $division_state->id); ?>" class="btn btn-danger">Yes</a>
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
