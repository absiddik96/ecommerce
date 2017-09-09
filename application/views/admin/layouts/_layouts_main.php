<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>Admin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/backend/admin/css/theme-default.css')?>"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="">eCommerce</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>

                <li class="xn-title"></li>
                <li class="active">
                    <a href=""><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-user"></span> <span class="xn-text">User Management</span></a>
                    <ul>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-user"></span>Admin</a>
                            <ul>
                                <li><a href="<?php echo site_url('admin/createAdmin');?>"><span class="fa fa-plus"></span> Create</a></li>
                                <li><a href="<?php echo site_url('admin/superAdminList');?>"><span class="fa fa-eye"></span> View Super Admin</a></li>
                                <li><a href="<?php echo site_url('admin/adminList');?>"><span class="fa fa-eye"></span> View Admin</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-user"></span>Supplier & Buyer</a>
                            <ul>
                                <li><a href="<?php echo site_url('admin/createUser');?>"><span class="fa fa-plus"></span> Create</a></li>
                                <li><a href="<?php echo site_url('admin/supplierList');?>"><span class="fa fa-eye"></span> View Supplier</a></li>
                                <li><a href="<?php echo site_url('admin/buyerList');?>"><span class="fa fa-eye"></span> View Buyer</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> <span class="xn-text"> User Category</span> </a>
                    <ul>
                        <li><a href="<?php echo base_url("admin/userCategory"); ?>"><span class="fa fa-align-center"></span> User Category</a></li>
                        <li><a href="<?php echo base_url("admin/userType"); ?>"><span class="fa fa-align-center"></span> User Type</a></li>
                        <li><a href="<?php echo base_url("admin/userSubType"); ?>"><span class="fa fa-align-center"></span> User Sub Type</a></li>

                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Product Management</span></a>
                    <ul>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-clock-o"></span> Category</a>
                            <ul>
                                <li><a href="<?php echo base_url("admin/category"); ?>"><span class="fa fa-align-center"></span> Category</a></li>
                                <li><a href="<?php echo base_url("admin/subCategory"); ?>"><span class="fa fa-align-justify"></span> Sub Category</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url("admin/color"); ?>"><span class="fa fa-comments"></span> Color</a></li>
                        <li><a href="<?php echo base_url("admin/size"); ?>"><span class="fa fa-calendar"></span> Size</a></li>
                        <li><a href="<?php echo base_url("admin/branch"); ?>"><span class="fa fa-edit"></span> Branch</a></li>
                        <li><a href="<?php echo base_url("admin/brand"); ?>"><span class="fa fa-columns"></span> Brand</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-map-marker"></span> <span class="xn-text"> Location</span></a>
                    <ul>

                        <li>
                            <a href="<?php echo base_url("admin/country"); ?>"><span class="fa fa-square-o"></span>Country</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("admin/divisionState"); ?>"><span class="fa fa-square-o"></span>Division / Province / State</a>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-square-o"></span> District / City</a>
                            <ul>
                                <li><a href="<?php echo base_url("admin/addDistrictCity"); ?>"><span class="fa fa-map-marker"></span> Add District / City</a></li>
                                <li><a href="<?php echo base_url("admin/districtCityList"); ?>"><span class="fa fa-map-marker"></span> District / City List</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-square-o"></span> Upazila / Police Station</a>

                            <ul>
                                <li><a href="<?php echo base_url("admin/addUpazilaPS"); ?>"><span class="fa fa-map-marker"></span>Add Upazila / Police Station</a></li>
                                <li><a href="<?php echo base_url("admin/upazilaPSList"); ?>"><span class="fa fa-map-marker"></span>Upazila / Police Station List</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-square-o"></span> Union / Word</a>
                            <ul>
                                <li><a href="<?php echo base_url("admin/addUnionWord"); ?>"><span class="fa fa-map-marker"></span>Add Union / Word</a></li>
                                <li><a href="<?php echo base_url("admin/unionWordList"); ?>"><span class="fa fa-map-marker"></span>Union / Word List</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-square-o"></span> Village / Moholla</a>
                            <ul>
                                <li><a href="<?php echo base_url("admin/addVillageMoholla"); ?>"><span class="fa fa-map-marker"></span> Add Village / Moholla</a></li>
                                <li><a href="<?php echo base_url("admin/villageMohollaList"); ?>"><span class="fa fa-map-marker"></span> Village / Moholla List</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/mobileBank"); ?>"><span class="fa fa-square-o"></span> <span class="xn-text">Add Mobile Bank Type</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/eWallet"); ?>"><span class="fa fa-square-o"></span> <span class="xn-text">Add E-Wallet Types</span></a>
                </li>
            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->

                <!-- SIGN OUT -->
                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>
                <!-- END SIGN OUT -->

            </ul>
            <!-- END X-NAVIGATION VERTICAL -->



            <div class="col-sm-12" style="background:">
                <br>
                <!--CONTENT -->
                <?php
                if(isset($content)){
                    $this->load->view($content);
                }else{
                    echo "Page Not Found";
                }
                ?>


            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="<?php echo site_url('admin/logout');?>" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/jquery/jquery-ui.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/bootstrap/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/admin/js/settings.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='<?php echo base_url('assets/backend/admin/js/plugins/icheck/icheck.min.js');?>'></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/scrolltotop/scrolltopcontrol.js');?>"></script>


<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/owl/owl.carousel.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/bootstrap/bootstrap-file-input.js')?>"></script>


<!-- START TEMPLATE -->

<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/actions.js');?>"></script>

<!-- END TEMPLATE -->


<script type="text/javascript">
    $(document).ready(function () {
        $('#category').on('change', function () {
            var category_id = $(this).val();
            if (category_id == '') {
                $('#sub_category').prop('disabled', true);
            } else {
                $('#sub_category').prop('disabled', false);

                $.ajax({
                    url: "<?php echo base_url() ?>admin/getSubCategoryByJS",
                    type: "POST",
                    data: {'category_id': category_id},
                    dataType: "json",
                    success: function (data) {
                        $('#sub_category').html(data);
                    },
                    error: function () {

                    }
                });
            }
        });
    });
</script>

<!-- START Location -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#country').on('change', function () {
            var country_id = $(this).val();
            if (country_id == '') {
                $('#division_state').prop('disabled', true);
            } else {
                $('#division_state').prop('disabled', false);

                $.ajax({
                    url: "<?php echo base_url() ?>admin/getDivisionStateByJS",
                    type: "POST",
                    data: {'country_id': country_id},
                    dataType: "json",
                    success: function (data) {
                        $('#division_state').html(data);
                    },
                    error: function () {

                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#division_state').on('change', function () {
            var division_state_id = $(this).val();
            if (division_state_id == '') {
                $('#district_city').prop('disabled', true);
            } else {
                $('#district_city').prop('disabled', false);

                $.ajax({
                    url: "<?php echo base_url()?>admin/getDistrictCityByJS",
                    type: "POST",
                    data: {'division_state_id': division_state_id},
                    dataType: "json",
                    success: function (data) {
                        $('#district_city').html(data);
                    },
                    error: function () {

                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#district_city').on('change', function () {
            var district_city_id = $(this).val();
            if (district_city_id == '') {
                $('#upazila_ps').prop('disabled', true);
            } else {
                $('#upazila_ps').prop('disabled', false);

                $.ajax({
                    url: "<?php echo base_url() ?>admin/getUpzilaPSByJS",
                    type: "POST",
                    data: {'district_city_id': district_city_id},
                    dataType: "json",
                    success: function (data) {
                        $('#upazila_ps').html(data);
                    },
                    error: function () {

                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#upazila_ps').on('change', function () {
            var upazila_ps_id = $(this).val();
            if (upazila_ps_id == '') {
                $('#union_word').prop('disabled', true);
            } else {
                $('#union_word').prop('disabled', false);

                $.ajax({
                    url: "<?php echo base_url() ?>admin/getUnionWordByJS",
                    type: "POST",
                    data: {'upazila_ps_id': upazila_ps_id},
                    dataType: "json",
                    success: function (data) {
                        $('#union_word').html(data);
                    },
                    error: function () {

                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#union_word').on('change', function () {
            var union_word_id = $(this).val();
            if (union_word_id == '') {
                $('#village_moholla').prop('disabled', true);
            } else {
                $('#village_moholla').prop('disabled', false);

                $.ajax({
                    url: "<?php echo base_url() ?>admin/getVillageMohollaByJS",
                    type: "POST",
                    data: {'union_word_id': union_word_id},
                    dataType: "json",
                    success: function (data) {
                        $('#village_moholla').html(data);
                    },
                    error: function () {

                    }
                });
            }
        });
    });
</script>
<!-- END Location -->


<!-- Start User Category -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#user_category').on('change', function () {
            var user_category_id = $(this).val();
            if (user_category_id == '') {
                $('#user_type').prop('disabled', true);
            } else {
                $('#user_type').prop('disabled', false);

                $.ajax({
                    url: "<?php echo base_url() ?>admin/getUserTypeByJS",
                    type: "POST",
                    data: {'user_category_id': user_category_id},
                    dataType: "json",
                    success: function (data) {
                        $('#user_type').html(data);
                    },
                    error: function () {

                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#user_type').on('change', function () {
            var user_type_id = $(this).val();
            if (user_type_id == '') {
                $('#user_sub_type').prop('disabled', true);
            } else {
                $('#user_sub_type').prop('disabled', false);

                $.ajax({
                    url: "<?php echo base_url() ?>admin/getUserSubTypeByJS",
                    type: "POST",
                    data: {'user_type_id': user_type_id},
                    dataType: "json",
                    success: function (data) {
                        $('#user_sub_type').html(data);
                    },
                    error: function () {

                    }
                });
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#user_sub_type').on('change', function () {
            var user_sub_type = $(this).val();
            if (user_sub_type == '0') {
                $('#others_option').prop('disabled', false);
            } else {
                $('#others_option').prop('disabled', true);
            }
        });
    });
</script>
<!-- END User Category -->

<!-- END SCRIPTS -->
</body>
</html>
