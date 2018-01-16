<?php

class AdminProductDiscountController extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_discount()
    {
        $this->form_validation->set_rules('discount_type','Discount Type','trim|required');
        $this->form_validation->set_rules('discount','Discount','trim|required');
        $this->form_validation->set_rules('store','Store','trim|required');

        if($this->form_validation->run()){
            $this->session->set_flashdata('discount_type',$this->input->post('discount_type'));
            $this->session->set_flashdata('discount',$this->input->post('discount'));
            $this->session->set_flashdata('store',$this->input->post('store'));
            redirect(base_url('admin/addDiscount/product'));
        }

        $working_zone = $this->user_working_zone_m->get_by([
            'user_id' => $this->session->userdata('user_id')
        ],true);

        $this->data['stores'] 	 = $this->store_m->get_stores_by_working_id($working_zone->store_id);
        $this->data['content']   = 'admin/discount/add_discount';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function add_discount_prodcut()
    {
        $this->form_validation->set_rules('product_code[]','Product','trim|required');

        $discount_type = $this->input->post('discount_type');
        if (!$discount_type) {
            $discount_type   = $this->session->flashdata('discount_type');

        }
        $discount = $this->input->post('discount');
        if (!$discount) {
            $discount        = $this->session->flashdata('discount');

        }
        $store_id = $this->input->post('store');
        if (!$store_id) {
            $store_id                      = $this->session->flashdata('store');
        }

        if($this->form_validation->run()){
            if ($this->admin_product_discount_m->add_discount()) {
                $this->session->set_flashdata('success', 'Successfully Add Discount');
                redirect(base_url('admin/addDiscount'));
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Discount');
                redirect(base_url('admin/addDiscount'));
            }
        }

        $this->data['store']         = $store_id;
        $this->data['discount_type'] = $discount_type;
        $this->data['discount']      = $discount;

        $this->data['categorys'] = $this->category_m->get();
        $this->data['product_details'] = $this->product_details_m->get_store_product($store_id);
        $this->data['min_price']       = $this->product_details_m->get_min_price();
        $this->data['max_price']       = $this->product_details_m->get_max_price();
        $this->data['content']         = 'admin/discount/add_discount_product';

        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function get_product_by_price_range()
    {
        $minPrice = $this->input->post("minPrice");
        $maxPrice = $this->input->post("maxPrice");
        $category_id = $this->input->post("category_id");
        $sub_category_id = $this->input->post("sub_category_id");
        $store_id = $this->input->post("store_id");

        $product_details = $this->product_details_m->get_products_by_price_range($store_id,$minPrice,$maxPrice,$category_id,$sub_category_id);
        $product_show  = '';

        if (count($product_details) > 0) {
            $product_show .= '
            <table class="table">
            <tbody>';
            foreach ($product_details as $product_detail){
                $product_image = $this->product_image_m->get_image_by_product_code($product_detail->product_code);

                $product_show .= '<tr>';
                $product_show .= '<td>';
                $product_show .= '<input name="product_code[]" type="checkbox" class="checkbox" value="'.$product_detail->product_code .'"/>';
                $product_show .= '</td>';
                $product_show .= '<td>';
                $product_show .= '<div class="post">';
                $product_show .= '<div class="post-media">';
                $product_show .= '<img style="height: 150px;" src="'. base_url("uploads/product_image/".$product_detail->product_code."/thumbnail/" .$product_image->image) .'">';
                $product_show .= '</div>';
                $product_show .= '</div>';
                $product_show .= '</td>';
                $product_show .= '<td>'.$product_detail->product_title.'</td>';
                $product_show .= '<td>'.$product_detail->price.'</td>';
                $product_show .= '<td>'.$product_detail->category_title.'</td>';
                $product_show .= '<td>'.$product_detail->sub_category_title.'</td>';
                $product_show .= '</tr>';
            }
            $product_show .= '</tbody>
            </table>';
        }
        echo json_encode($product_show);

    }
}
