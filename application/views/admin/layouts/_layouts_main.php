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

    <!-- product -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>toolkit/multipleSelect/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>toolkit/custom/css/bootstrap_imageupload.css">
    <link href="<?php echo base_url(); ?>toolkit/custom/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <!-- product -->

    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('toolkit/noUiSlider/nouislider.min.css')?>"/>
    <!-- custom -->

    <!-- range slider -->
    <link rel="stylesheet" href="<?= base_url(); ?>toolkit/rangerSlider/jquery-ui.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>toolkit/DataTables/datatables.min.css" />
    <!-- range slider -->

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
                            <a href="#"><span class="fa fa-user"></span> Admin</a>
                            <ul>
                                <li><a href="<?php echo site_url('admin/createAdmin');?>"><span class="fa fa-plus"></span> Create</a></li>
                                <li><a href="<?php echo site_url('admin/superAdminList');?>"><span class="fa fa-eye"></span> List Of Super Admin</a></li>
                                <li><a href="<?php echo site_url('admin/adminList');?>"><span class="fa fa-eye"></span> List Of Admin</a></li>
                                <li><a href="<?php echo site_url('admin/agentList');?>"><span class="fa fa-eye"></span> List Of Agent</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-user"></span> Supplier</a>
                            <ul>
                                <li><a href="<?php echo site_url('admin/createUser/Supplier');?>"><span class="fa fa-plus"></span> Create</a></li>
                                <li><a href="<?php echo site_url('admin/supplierList');?>"><span class="fa fa-eye"></span> List Of Supplier</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-user"></span> Buyer</a>
                            <ul>
                                <li><a href="<?php echo site_url('admin/createUser/Buyer');?>"><span class="fa fa-plus"></span> Create</a></li>
                                <li><a href="<?php echo site_url('admin/buyerList');?>"><span class="fa fa-eye"></span> List Of Buyer</a></li>
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
                            <a href="#"><span class="fa fa-clock-o"></span> Product</a>
                            <ul>
                                <li><a href="<?php echo base_url("admin/addProduct"); ?>"><span class="fa fa-plus"></span>Create Product</a></li>
                                <li><a href="<?php echo base_url("admin/productList"); ?>"><span class="fa fa-align-justify"></span> List of Product</a></li>
                            </ul>
                        </li>
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
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Store Management</span></a>
                    <ul>
                        <li><a href="<?php echo base_url("admin/store"); ?>"><span class="fa fa-comments"></span> Store</a></li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-clock-o"></span> Product</a>
                            <ul>
                                <li><a href="<?php echo base_url("admin/store/addProduct"); ?>"><span class="fa fa-plus"></span>Add Product</a></li>
                                <li><a href="<?php echo base_url("admin/store/productList"); ?>"><span class="fa fa-align-justify"></span> List of Product</a></li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-clock-o"></span> Discount</a>
                            <ul>
                                <li><a href="<?php echo base_url("admin/addDiscount"); ?>"><span class="fa fa-plus"></span>Add Discount</a></li>
                                <li><a href=""><span class="fa fa-align-justify"></span> List of Disconted Product</a></li>
                            </ul>
                        </li>
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
                    <a href="<?php echo base_url("admin/role"); ?>"><span class="fa fa-square-o"></span> <span class="xn-text">Create Role</span></a>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/admin/js/plugins/summernote/summernote.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js');?>"></script>
<script type='text/javascript' src='<?php echo base_url('assets/backend/admin/js/plugins/icheck/icheck.min.js');?>'></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/scrolltotop/scrolltopcontrol.js');?>"></script>


<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/owl/owl.carousel.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins/bootstrap/bootstrap-file-input.js')?>"></script>


<!-- START TEMPLATE -->

<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/plugins.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/admin/js/actions.js');?>"></script>
<script src="<?php echo base_url(); ?>toolkit/DataTables/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<!-- END TEMPLATE -->



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

<!-- product -->
<script src="<?php echo base_url(); ?>toolkit/custom/js/fileinput.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>toolkit/custom/js/bootstrap_imageupload.js"></script>
<script>
    var $imageupload = $('.imageupload');
    $imageupload.imageupload();

    $('#imageupload-disable').on('click', function () {
        $imageupload.imageupload('disable');
        $(this).blur();
    })

    $('#imageupload-enable').on('click', function () {
        $imageupload.imageupload('enable');
        $(this).blur();
    })

    $('#imageupload-reset').on('click', function () {
        $imageupload.imageupload('reset');
        $(this).blur();
    });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>toolkit/multipleSelect/semantic.min.js"></script>
<script type="text/javascript">
    $('#size').dropdown();
    $('#category').dropdown();
    $('#company').dropdown();
    $('#color').dropdown();
    $('#discount_type').dropdown();
    $('#store').dropdown();
</script>

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

<!-- checkbox all select  -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#select_all').prop('checked',true);
            }else{
                $('#select_all').prop('checked',false);
            }
        });
    });
</script>
<!-- checkbox all select  -->

<!-- range slider -->
<script src="<?php echo base_url(); ?>toolkit/rangerSlider/jquery-ui.js"></script>
<script type="text/javascript">
    var minPrice = parseFloat(document.getElementById("minPrice").value);
    var maxPrice = parseFloat(document.getElementById("maxPrice").value);

    var category_id;
    var sub_category_id;
    var jsminPrice;
    var jsmaxPrice;
    var store_id;
    var eMinPrice;
    var eMaxPrice;

// var jsminPrice = document.getElementById("jsminPrice");
// var jsmaxPrice = document.getElementById("jsmaxPrice");

var hide = document.getElementById("hide");

$(document).ready(function() {
    var outputSpan = $('#spanOutput');
    var outputSpan2 = $('#spanOutput2');
    var sliderDiv = $('#ab');

    sliderDiv.slider({
        range: true,
        min: minPrice,
        step: 0.01,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function(event, ui) {
            outputSpan.html(ui.values[0] + ' - ' + ui.values[1]);
        },
        stop: function(event, ui) {
           $('#select_all').prop('checked',false);

           $('#jsminPrice').val(ui.values[0]);
           $("#jsmaxPrice").val(ui.values[1]);

           $('#eMinPrice').val(ui.values[0]);
           $("#eMaxPrice").val(ui.values[1]);

           category_id = parseFloat($('#category').val());
           sub_category_id = parseFloat($('#sub_category').val());
           store_id = parseFloat($('#store_id').val());

           $.ajax({
            url: "<?php echo base_url() ?>admin/getProductByPriceRange",
            type: "POST",
            data: {'store_id': store_id, 'minPrice': ui.values[0], 'maxPrice': ui.values[1], 'category_id': category_id, 'sub_category_id': sub_category_id},
            dataType: "json",
            success: function (data) {
                hide.style.display = "none";
                $('#price_range_product').html(data);
            },
            error: function () {
                alert("No product found");
            }
        });
       }
   });

    outputSpan.html(sliderDiv.slider('values', 0) + ' - ' + sliderDiv.slider('values', 1));
});

$('#category').on('change', function () {

     $('#select_all').prop('checked',false);

    var category_id = $(this).val();
    jsminPrice = parseFloat($('#jsminPrice').val());
    jsmaxPrice = parseFloat($('#jsmaxPrice').val());
    store_id = parseFloat($('#store_id').val());
    sub_category_id = "";

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
                $('#sub_category').html("data");
            }
        });

        $.ajax({
            url: "<?php echo base_url() ?>admin/getProductByPriceRange",
            type: "POST",
            data: {'store_id': store_id, 'minPrice': jsminPrice, 'maxPrice': jsmaxPrice, 'category_id': category_id, 'sub_category_id': sub_category_id},
            dataType: "json",
            success: function (data) {
                hide.style.display = "none";
                $('#price_range_product').html(data);
            },
            error: function () {
                alert("No product found");
            }
        });
    }
});



$('#sub_category').on('change', function () {

     $('#select_all').prop('checked',false);

    var sub_category_id = $(this).val();
    jsminPrice = parseFloat($('#jsminPrice').val());
    jsmaxPrice = parseFloat($('#jsmaxPrice').val());
    category_id = parseFloat($('#category').val());
    store_id = parseFloat($('#store_id').val());

    $.ajax({
        url: "<?php echo base_url() ?>admin/getProductByPriceRange",
        type: "POST",
        data: {'store_id': store_id, 'minPrice': jsminPrice, 'maxPrice': jsmaxPrice, 'category_id': category_id, 'sub_category_id': sub_category_id},
        dataType: "json",
        success: function (data) {
            hide.style.display = "none";
            $('#price_range_product').html(data);
        },
        error: function () {
            alert("No product found");
        }
    });

});

$('#eMinPrice').on('change', function () {


    $('#select_all').prop('checked',false);

    eMinPrice = $(this).val();
    eMaxPrice = parseFloat($('#eMaxPrice').val());

    sub_category_id = parseFloat($('#sub_category').val());
    category_id = parseFloat($('#category').val());
    store_id = parseFloat($('#store_id').val());

    $.ajax({
        url: "<?php echo base_url() ?>admin/getProductByPriceRange",
        type: "POST",
        data: {'store_id': store_id, 'minPrice': eMinPrice, 'maxPrice': eMaxPrice, 'category_id': category_id, 'sub_category_id': sub_category_id},
        dataType: "json",
        success: function (data) {
            hide.style.display = "none";
            $('#price_range_product').html(data);
        },
        error: function () {
            alert("No product found");
        }
    });

});

$('#eMaxPrice').on('change', function () {


    $('#select_all').prop('checked',false);

    
    eMinPrice = parseFloat($('#eMinPrice').val());
    eMaxPrice = $(this).val();

    sub_category_id = parseFloat($('#sub_category').val());
    category_id = parseFloat($('#category').val());
    store_id = parseFloat($('#store_id').val());

    $.ajax({
        url: "<?php echo base_url() ?>admin/getProductByPriceRange",
        type: "POST",
        data: {'store_id': store_id, 'minPrice': eMinPrice, 'maxPrice': eMaxPrice, 'category_id': category_id, 'sub_category_id': sub_category_id},
        dataType: "json",
        success: function (data) {
            hide.style.display = "none";
            $('#price_range_product').html(data);
        },
        error: function () {
            alert("No product found");
        }
    });

});


</script>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td2 = tr[i].getElementsByTagName("td")[2];
            td3 = tr[i].getElementsByTagName("td")[3];
            td4 = tr[i].getElementsByTagName("td")[4];
            td5 = tr[i].getElementsByTagName("td")[5];

            if (td2 || td3 || td4 || td5) {
                if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else if(td3.innerHTML.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }else if(td4.innerHTML.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }else if(td5.innerHTML.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }

        }
    }
</script>


<!-- range slider -->

<!-- product -->

<!-- END SCRIPTS -->
</body>
</html>
