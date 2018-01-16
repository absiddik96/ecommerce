<?php

class AdminStoreProductController extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_store_product()
    {
        $this->form_validation->set_rules('store_id','Store ID','trim|required');
        $this->form_validation->set_rules('product_code[]','Product','trim|required');

        if($this->form_validation->run()){
            if ($this->store_product_m->add_store_product()) {
                $this->session->set_flashdata('success', 'Successfully Add Store Product');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Store Product');
            }
        }

        $working_zone = $this->user_working_zone_m->get_by([
            'user_id' => $this->session->userdata('user_id')
        ],true);

        $this->data['stores'] 	       = $this->store_m->get_stores_by_working_id($working_zone->store_id);
		$this->data['product_details'] = $this->product_details_m->get_details();
        $this->data['content']         = 'admin/store_management/product/add_store_product';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

	}

	public function get_store_product()
	{
		$this->data['product_details'] = $this->product_details_m->get_store_product();
        $this->data['content']         = 'admin/store_management/product/list_of_store_product';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

	}

    public function show_store_product($product_code = '')
    {
        $this->data['product_code']  = $product_code;
        $this->data['product_detail'] = $this->product_details_m->get_by(['product_code'=>$product_code],true);
        $this->data['product_description'] = $this->product_discription_m->get_by(['product_code'=>$product_code],true);
        $this->data['product_images'] = $this->product_image_m->get_by(['product_code'=>$product_code],false);
        $this->data['product_sizes'] = $this->product_size_m->get_sizes($product_code);
        $this->data['product_colors'] = $this->product_color_m->get_colors($product_code);
        $this->data['product_brand'] = $this->product_details_m->get_product_brand($product_code);
        $this->data['product_category_sub_category'] = $this->product_details_m->get_product_category_sub_category($product_code);
        $this->data['content'] = 'admin/store_management/product/product_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function remove_product($id='')
    {
        if($this->store_product_m->delete($id)){
            $this->session->set_flashdata('success','Remove Store Product Successfully.');
        }else {
            $this->session->set_flashdata('fail','Remove Store Product Failed.');
        }
        redirect(base_url('admin/store/productList'));
    }


}
