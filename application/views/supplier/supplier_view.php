<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START BASIC TABLE SAMPLE -->
            <div class="panel panel-default" style="margin-top:10px;">
                <div class="panel-body">
                    <h1 style="text-align:center; padding:15px; "><?php echo $buyer->company_name;?></h1>
                </div>
            </div>
            <!-- END BASIC TABLE SAMPLE -->

        </div>

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
                <div class="col-md-6">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Details</h1>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Company Name</td>
                                        <td><?php echo $buyer->company_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Contact Name</td>
                                        <td><?php echo $buyer->contact_first_name." ".$buyer->contact_last_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Contact Designation</td>
                                        <td><?php echo $buyer->contact_designation;?></td>

                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $buyer->phone;?></td>

                                    </tr>
                                    <tr>
                                        <td>Fax</td>
                                        <td><?php echo $buyer->fax;?></td>

                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $buyer->email;?></td>

                                    </tr>
                                    <tr>
                                        <td>Web Site URL</td>
                                        <td><?php echo $buyer->web_site_url;?></td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pull-left"><a class="btn btn-primary" href="<?php echo base_url('admin_panel/edit_supplier/'.$buyer->id)?>">Edit</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>

                <div class="col-md-6">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Address</h1>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $buyer->country_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Division / Province / State</td>
                                        <td><?php echo $buyer->division_state_name;?></td>

                                    </tr>

                                    <tr>
                                        <td>District / City</td>
                                        <td><?php echo $buyer->district_city;?></td>

                                    </tr>
                                    <tr>
                                        <td>Upazila / Police Station</td>
                                        <td><?php echo $buyer->upazila_ps_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Union / word</td>
                                        <td><?php echo $buyer->union_word_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Village / Moholla</td>
                                        <td><?php echo $buyer->village_moholla_name;?></td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pull-left"><a class="btn btn-primary" href="<?php echo base_url('admin_panel/edit_supplier_location/'.$buyer->id)?>">Edit</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Bank Account</h1>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead class="success">
                                    <tr>
                                        <th>BANK NAME</th>
                                        <th>ACCOUNT NAME</th>
                                        <th>ACCOUNT NUMBER</th>
                                        <th>IBAN / ROUTING NUMBER</th>
                                        <th>SWIFT CODE</th>
                                        <th>BANK ADDRESS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($bank_infos)):
                                        foreach ($bank_infos as $bank_info):
                                            ?>
                                            <tr>
                                                <td><?php echo $bank_info->bank_name; ?></td>
                                                <td><?php echo $bank_info->ac_name; ?></td>
                                                <td><?php echo $bank_info->ac_number; ?></td>
                                                <td><?php echo $bank_info->iban_number; ?></td>
                                                <td><?php echo $bank_info->swift_code; ?></td>
                                                <td><?php echo $bank_info->bank_address; ?></td>
                                                <td class="pull-left">
                                                    <a class="btn btn-primary" href="<?php echo base_url('admin_panel/update_bank_info/'.$bank_info->id.'?url='.$url)?>"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $bank_info->id; ?>"><i class="glyphicon glyphicon-trash"></i></i></button>
                                                    <!---------------------- delete Pop Up ----------------------------->
                                                    <div class="modal fade" id="<?php echo $bank_info->id; ?>" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="alert alert-danger">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title ">Confirm Delete </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p >Are you want to delete this BANK?</p>
                                                                    <a href="<?php echo base_url('admin_panel/delete_bank_info/' . $bank_info->id); ?>" class="btn btn-danger">Yes</a>
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
                            <a class="btn btn-primary pull-right" href="<?php echo base_url('admin_panel/bank_info/'.$buyer->id.'?url='.$url)?> ">Add Bank</a>

                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>
                <div class="col-md-6">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Mobile Bank</h1>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>Account</th>
                                        <th>Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($mbanks)):
                                        foreach ($mbanks as $mbank):
                                            ?>
                                            <tr>
                                                <td><?php echo $mbank->country_name; ?></td>
                                                <td><?php echo $mbank->mb_title; ?></td>
                                                <td><?php echo $mbank->phone_number; ?></td>
                                                <td class="pull-left">
                                                    <a class="btn btn-primary" href="<?php echo base_url('admin_panel/update_mobile_bank/'.$mbank->id.'?url='.$url)?>"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $mbank->id; ?>"><i class="glyphicon glyphicon-trash"></i></i></button>
                                                    <!---------------------- delete Pop Up ----------------------------->
                                                    <div class="modal fade" id="<?php echo $mbank->id; ?>" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="alert alert-danger">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title ">Confirm Delete </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p >Are you want to delete this BANK?</p>
                                                                    <a href="<?php echo base_url('admin_panel/delete_mobile_bank/'.$mbank->id); ?>" class="btn btn-danger">Yes</a>
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
                            <a class="btn btn-primary pull-right" href="<?php echo base_url('admin_panel/mobile_bank/'.$buyer->id.'?url='.$url)?> ">Add Mobile Bank</a>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>

            </div>
            <div class="col-md-12">


                <div class="col-md-6">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">E-wallet</h1>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>E-wallet Name</th>
                                        <th>E-wallet Email / Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($ewallets)):
                                        foreach ($ewallets as $ewallet):
                                            ?>
                                            <tr>
                                                <td><?php echo $ewallet->ew_title; ?></td>
                                                <td><?php echo $ewallet->e_wallet_email; ?></td>
                                                <td class="pull-left">
                                                    <a class="btn btn-primary" href="<?php echo base_url('admin_panel/update_ewallet/'.$ewallet->id.'?url='.$url)?>"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#' . $ewallet->id; ?>"><i class="glyphicon glyphicon-trash"></i></i></button>
                                                    <!---------------------- delete Pop Up ----------------------------->
                                                    <div class="modal fade" id="<?php echo $ewallet->id; ?>" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="alert alert-danger">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title ">Confirm Delete </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p >Are you want to delete this E-Wallet?</p>
                                                                    <a href="<?php echo base_url('admin_panel/delete_ewallet/' . $ewallet->id); ?>" class="btn btn-danger">Yes</a>
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
                            <a class="btn btn-primary pull-right" href="<?php echo base_url('admin_panel/add_ewallet/'.$buyer->id.'?url='.$url)?> ">Add E-Wallet</a>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
