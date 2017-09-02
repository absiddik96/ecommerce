<?php

class Admin_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_user_m');
        $this->load->model('location/country_m');
        $this->load->model('location/division_state_m');
        $this->load->model('location/district_city_m');
        $this->load->model('location/upazila_ps_m');
        $this->load->model('location/union_word_m');
        $this->load->model('location/village_moholla_m');
        $this->load->model('product_management/category/category_m');
        $this->load->model('product_management/category/sub_category_m');
        $this->load->model('product_management/color_m');
        $this->load->model('product_management/size_m');
        $this->load->model('product_management/brand_m');
        $this->load->model('product_management/branch_m');
        $this->load->model('admin/bank_type/e_wallet_m');
        $this->load->model('admin/bank_type/mobile_bank_m');
        $this->load->model('role/role_m');
        $this->load->model('admin/admin_user_location_m');

        //......checking user login or not
        $exception_uris = ['admin/login','admin/logout'];
        if (in_array(uri_string(),$exception_uris) == false) {
            if($this->admin_user_m->admin_loggedin() == false){
                redirect('admin/login');
            }
            //...........only super admin and admin are permitted for thid section
            if (!$this->admin_user_m->is_super_admin() && !$this->admin_user_m->is_admin()) {
                redirect('home');
            }

        }
    }
}

?>
