<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCategoryController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function add_category() {

        $this->form_validation->set_rules('category_title', 'Category Title', 'trim|required|is_unique[categorys.category_title]');

        if($this->form_validation->run()){
            if ($this->category_m->add_category()) {
                $this->session->set_flashdata('success', 'Successfully Add Category');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Category');
            }
        }

        $this->data['categorys'] = $this->category_m->get();
        $this->data['content'] = 'admin/product_management/category/category_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_category($category_id)
    {
        $this->form_validation->set_rules('category_title', 'Category Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->category_m->update_category($category_id)) {
                $this->session->set_flashdata('success','Update Category successfull.');
            }else {
                $this->session->set_flashdata('fail','Update Category successfull.');
            }
            redirect(base_url('admin/category'));
        }
        $this->data['category'] = $this->category_m->get($category_id);
        $this->data['content'] = 'admin/product_management/category/edit_category';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_category($category_id)
    {
        if ($this->category_m->delete($category_id)) {
            $this->session->set_flashdata('success','Delete Category successfull.');
        }else {
            $this->session->set_flashdata('fail','Delete Category successfull.');
        }
        redirect(base_url('admin/category'));
    }

}
