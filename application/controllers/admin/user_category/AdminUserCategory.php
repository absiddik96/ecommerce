<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserCategory extends Admin_Controller
{

    public function __construct() {
        parent::__construct();
    }


    public function user_category() {

        $this->form_validation->set_rules('user_category_title', 'User Category Title', 'trim|required|is_unique[user_categorys.category_title]');

        if($this->form_validation->run()){
            if ($this->admin_user_category_m->add_user_category()) {
                $this->session->set_flashdata('success', 'Successfully Add User Category');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add User Category');
            }
        }

        $this->data['categorys'] = $this->admin_user_category_m->get();
        $this->data['content'] = 'admin/user_category/category/category';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_user_category($category_id = null)
    {
        $this->form_validation->set_rules('user_category_title', 'User Category Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->admin_user_category_m->update_user_category($category_id)) {
                $this->session->set_flashdata('successup','Update User Category successfull.');
            }else {
                $this->session->set_flashdata('failup','Update User Category Failed.');
            }
            redirect(base_url('admin/userCategory'));
        }
        $this->data['category'] = $this->admin_user_category_m->get($category_id);
        $this->data['content'] = 'admin/user_category/category/edit_category';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_user_category($category_id = null)
    {
        if ($this->admin_user_category_m->delete($category_id)) {
            $this->session->set_flashdata('successup','Delete User Category successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete User Category successfull.');
        }
        redirect(base_url('admin/userCategory'));
    }

}


?>
