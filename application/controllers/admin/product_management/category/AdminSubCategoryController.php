<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSubCategoryController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function add_sub_category() {

        $this->form_validation->set_rules('sub_category_title', 'Sub Category Title', 'trim|required|is_unique[sub_categorys.sub_category_title]');

        if($this->form_validation->run()){
            if ($this->sub_category_m->add_sub_category()) {
                $this->session->set_flashdata('success', 'Successfully Add Sub Category');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Sub Category');
            }
        }

        $this->data['categorys'] = $this->category_m->get();
        $this->data['sub_categorys'] = $this->sub_category_m->get_sub_category();
        $this->data['content'] = 'admin/product_management/category/sub_category_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_sub_category($sub_category_id)
    {
        $this->form_validation->set_rules('sub_category_title', 'sub_category Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->sub_category_m->update_sub_category($sub_category_id)) {
                $this->session->set_flashdata('success','Update Sub Category successfull.');
            }else {
                $this->session->set_flashdata('fail','Update Sub Category successfull.');
            }
            redirect(base_url('admin/subCategory'));
        }
        $this->data['sub_category'] = $this->sub_category_m->get($sub_category_id);
        $this->data['content'] = 'admin/product_management/category/edit_sub_category';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_sub_category($sub_category_id)
    {
        if ($this->sub_category_m->delete($sub_category_id)) {
            $this->session->set_flashdata('success','Delete Sub Category successfull.');
        }else {
            $this->session->set_flashdata('fail','Delete Sub Category successfull.');
        }
        redirect(base_url('admin/subCategory'));
    }

    public function get_sub_category_by_js() {
        $category_id = $this->input->post("category_id");
        $sub_categorys = $this->sub_category_m->get_sub_category_by_cat_id($category_id);
        if (count($sub_categorys) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">Select Sub Category ...</option>';
            foreach ($sub_categorys as $sub_category) {
                $pro_select_box .= '<option value="' . $sub_category->id . '">' . $sub_category->sub_category_title . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }

}
