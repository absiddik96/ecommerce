<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START BASIC TABLE SAMPLE -->
            <div class="panel panel-default" style="margin-top:10px;">
                <div class="panel-body">
                    <h1 style="text-align:center;"><?php echo $user->name;?></h1>
                    <h4 style="text-align:center;"><?php echo $user->email;?></h4>
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
                                        <td>Contact Name</td>
                                        <td><?php echo $user_details->contact_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Contact Designation</td>
                                        <td><?php echo $user_details->contact_designation;?></td>

                                    </tr>

                                    <tr>
                                        <td>User Category</td>
                                        <td><?php echo $user_details->category_title;?></td>

                                    </tr>

                                    <tr>
                                        <td>User Type</td>
                                        <td><?php echo $user_details->type_title;?></td>

                                    </tr>

                                    <tr>
                                        <td>User Sub Type</td>
                                        <td><?php echo $user_details->user_sub_type_id == 0? $user_details->others:$user_details->sub_type_title;?></td>

                                    </tr>

                                    <tr>
                                        <td>Web Site URL</td>
                                        <td> <a href="<?php echo $user_details->web_site_url;?>"><?php echo $user_details->web_site_url;?></a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pull-left"><a class="btn btn-primary" href="<?php echo base_url('admin_panel/edit_supplier/'.$user_details->id)?>">Edit</a></td>

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
                                        <td><?php echo $user_location->country_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Division / Province / State</td>
                                        <td><?php echo $user_location->division_state_name;?></td>

                                    </tr>

                                    <tr>
                                        <td>District / City</td>
                                        <td><?php echo $user_location->district_city_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Upazila / Police Station</td>
                                        <td><?php echo $user_location->upazila_ps_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Union / word</td>
                                        <td><?php echo $user_location->union_word_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Village / Moholla</td>
                                        <td><?php echo $user_location->village_moholla_name;?></td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="pull-left"><a class="btn btn-primary" href="<?php echo base_url('admin_panel/edit_supplier_location/'.$user_location->id)?>">Edit</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-12">


                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Bank Account</h1>
                        </div>
                        <div class="panel-body">
                            <?php if ($success = $this->session->flashdata('bank_success')) : ?>
                                <div class="alert alert-success alert-dismissable">
                                    <strong><?php echo $success; ?></strong>
                                </div>
                            <?php endif; ?>

                            <?php if ($failed = $this->session->flashdata('bank_fail')) : ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <strong><?php echo $failed; ?></strong>
                                </div>
                            <?php endif; ?>
                            <table class="table">
                                <thead class="success">
                                    <tr>
                                        <th>BANK NAME</th>
                                        <th>BANK ADDRESS</th>
                                        <th>SWIFT CODE</th>
                                        <th>IBAN / ROUTING NUMBER</th>
                                        <th>ACCOUNT NAME</th>
                                        <th>ACCOUNT NUMBER</th>
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
                                                <td><?php echo $bank_info->bank_address; ?></td>
                                                <td><?php echo $bank_info->swift_code; ?></td>
                                                <td><?php echo $bank_info->iban_number; ?></td>
                                                <td><?php echo $bank_info->ac_name; ?></td>
                                                <td><?php echo $bank_info->ac_number; ?></td>
                                                <td class="pull-left">
                                                    <a class="btn btn-primary" href="<?php echo base_url($editBank.'/'.$user_id.'/'.$bank_info->id)?>"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#bank' . $bank_info->id; ?>"><i class="glyphicon glyphicon-trash"></i></i></button>
                                                    <!---------------------- delete Pop Up ----------------------------->
                                                    <div class="modal fade" id="bank<?php echo $bank_info->id; ?>" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="alert alert-danger">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title ">Confirm Delete </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p >Are you want to delete this BANK?</p>
                                                                    <a href="<?php echo base_url($deleteBank.'/'.$user_id.'/'.$bank_info->id); ?>" class="btn btn-danger">Yes</a>
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
                            <a class="btn btn-primary pull-right" href="<?php echo base_url($addBank."/".$user_id);?> ">Add Bank</a>

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
                            <h1 class="panel-title">Mobile Bank</h1>
                        </div>

                        <div class="panel-body">
                            <?php if ($success = $this->session->flashdata('mobile_bank_success')) : ?>
                                <div class="alert alert-success alert-dismissable">
                                    <strong><?php echo $success; ?></strong>
                                </div>
                            <?php endif; ?>

                            <?php if ($failed = $this->session->flashdata('mobile_bank_fail')) : ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <strong><?php echo $failed; ?></strong>
                                </div>
                            <?php endif; ?>
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
                                                <td><?php echo $mbank->mobile_bank_name; ?></td>
                                                <td><?php echo $mbank->phone_number; ?></td>
                                                <td class="pull-left">
                                                    <a class="btn btn-primary" href="<?php echo base_url($editMobileBank.'/'.$user_id.'/'.$mbank->id)?>"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#mobileBank' . $mbank->id; ?>"><i class="glyphicon glyphicon-trash"></i></i></button>
                                                    <!---------------------- delete Pop Up ----------------------------->
                                                    <div class="modal fade" id="mobileBank<?php echo $mbank->id; ?>" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="alert alert-danger">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title ">Confirm Delete </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p >Are you want to delete this BANK?</p>
                                                                    <a href="<?php echo base_url($deleteMobileBank.'/'.$user_id.'/'.$mbank->id); ?>" class="btn btn-danger">Yes</a>
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
                            <a class="btn btn-primary pull-right" href="<?php echo base_url($addMobileBank."/".$user_id)?> ">Add Mobile Bank</a>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>

                <div class="col-md-6">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">E-wallet</h1>
                        </div>
                        <?php if ($success = $this->session->flashdata('ewallet_success')) : ?>
                            <div class="alert alert-success alert-dismissable">
                                <strong><?php echo $success; ?></strong>
                            </div>
                        <?php endif; ?>

                        <?php if ($failed = $this->session->flashdata('ewallet_fail')) : ?>
                            <div class="alert alert-danger alert-dismissable">
                                <strong><?php echo $failed; ?></strong>
                            </div>
                        <?php endif; ?>
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
                                                <td><?php echo $ewallet->ewallet_name; ?></td>
                                                <td><?php echo $ewallet->e_wallet_email; ?></td>
                                                <td class="pull-left">
                                                    <a class="btn btn-primary" href="<?php echo base_url($editEwallet.'/'.$user_id.'/'.$ewallet->id)?>"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#ewallet' . $ewallet->id; ?>"><i class="glyphicon glyphicon-trash"></i></i></button>
                                                    <!---------------------- delete Pop Up ----------------------------->
                                                    <div class="modal fade" id="ewallet<?php echo $ewallet->id; ?>" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="alert alert-danger">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title ">Confirm Delete </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <p >Are you want to delete this E-Wallet?</p>
                                                                    <a href="<?php echo base_url($deleteEwallet.'/'.$user_id.'/'.$ewallet->id); ?>" class="btn btn-danger">Yes</a>
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
                            <a class="btn btn-primary pull-right" href="<?php echo base_url($addEwallet."/".$user_id)?> ">Add E-Wallet</a>
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
                            <h1 class="panel-title">Proof of Address</h1>
                        </div>

                        <div class="panel-body">
                            <?php if ($success = $this->session->flashdata('proof_success')) : ?>
                                <div class="alert alert-success alert-dismissable">
                                    <strong><?php echo $success; ?></strong>
                                </div>
                            <?php endif; ?>

                            <?php if ($failed = $this->session->flashdata('proof_fail')) : ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <strong><?php echo $failed; ?></strong>
                                </div>
                            <?php endif; ?>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Proof of Address Type</td>
                                        <td><?php if(!empty($proof)) echo $proof->id_type?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Attachment</td>
                                    </tr>
                                    <td><img style="width:100%" src="<?php if(!empty($proof)) echo base_url('uploads/proof_of_address/'.$proof->attachment);?> " alt=""></td>
                                </tbody>
                            </table><br><br>
                            <a class="btn btn-primary pull-right" href="<?php echo base_url($proofOfAddress."/".$user_id)?> ">Edit</a>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>

                <div class="col-md-6">

                    <!-- START BASIC TABLE SAMPLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Personal Identity</h1>
                        </div>
                        <?php if ($success = $this->session->flashdata('pi_success')) : ?>
                            <div class="alert alert-success alert-dismissable">
                                <strong><?php echo $success; ?></strong>
                            </div>
                        <?php endif; ?>

                        <?php if ($failed = $this->session->flashdata('pi_fail')) : ?>
                            <div class="alert alert-danger alert-dismissable">
                                <strong><?php echo $failed; ?></strong>
                            </div>
                        <?php endif; ?>
                        <div class="panel-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Id Type</td>
                                        <td><?php if(!empty($pi)) echo $pi->id_type?></td>
                                    </tr>
                                    <tr>
                                        <td>Id Number</td>
                                        <td><?php if(!empty($pi)) echo $pi->id_number ?></td>
                                    </tr>
                                    <tr>
                                        <td>Attachment</td>
                                    </tr>
                                    <td><img style="width:100%" src="<?php if(!empty($pi)) echo base_url('uploads/personal_identity/'.$pi->attachment);?> " alt=""></td>
                                </tbody>
                            </table>
                            <a class="btn btn-primary pull-right" href="<?php echo base_url($personalIdentity."/".$user_id)?> ">Edit</a>
                        </div>
                    </div>
                    <!-- END BASIC TABLE SAMPLE -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
