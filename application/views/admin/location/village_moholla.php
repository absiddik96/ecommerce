
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Village / Moholla</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table datatable">
                            <?php if ($successup = $this->session->flashdata('success')) { ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong><?= $successup; ?></strong>
                                </div>
                            <?php } elseif ($failup = $this->session->flashdata('fail')) { ?>
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
                                    <th>Village / Moholla Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (!empty($village_mohollas)):
                                    foreach ($village_mohollas as $village_moholla):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $village_moholla->country_name; ?></td>
                                            <td><?php echo $village_moholla->division_state_name; ?></td>
                                            <td><?php echo $village_moholla->district_city_name; ?></td>
                                            <td><?php echo $village_moholla->upazila_ps_name; ?></td>
                                            <td><?php echo $village_moholla->union_word_name; ?></td>
                                            <td><?php echo $village_moholla->village_moholla_name; ?></td>
                                            <td><?php echo $village_moholla->village_moholla_code.$village_moholla->id; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/updateVillageMoholla/' . $village_moholla->id); ?>" class="btn  btn-primary"><i class="fa fa-lg fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $village_moholla->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                                <!---------------------- delete Pop Up ----------------------------->
                                                <div class="modal fade" id="<?php echo $village_moholla->id; ?>" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title ">Confirm Delete </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <p >Are you want to delete this Village / Moholla?</p>
                                                                <a href="<?php echo base_url('admin/deleteVillageMoholla/' . $village_moholla->id); ?>" class="btn btn-danger">Yes</a>
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
