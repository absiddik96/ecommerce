
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of District / City</h3>
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
                                <th>District / City Name</th>
                                <th>District / City Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (!empty($district_citys)):
                                foreach ($district_citys as $district_city):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $district_city->country_name; ?></td>
                                        <td><?php echo $district_city->division_state_name; ?></td>
                                        <td><?php echo $district_city->district_city_name; ?></td>
                                        <td><?php echo $district_city->district_city_code.$district_city->id; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/updateDistrictCity/' . $district_city->id); ?>" class="btn  btn-primary"><i class="fa fa-lg fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $district_city->id; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                                            <!---------------------- delete Pop Up ----------------------------->
                                            <div class="modal fade" id="<?php echo $district_city->id; ?>" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="alert alert-danger">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title ">Confirm Delete </h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <p >Are you want to delete this District / City?</p>
                                                            <a href="<?php echo base_url('admin/deleteDistrictCity/' . $district_city->id); ?>" class="btn btn-danger">Yes</a>
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
