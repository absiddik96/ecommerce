<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserSubType extends Admin_Controller
{

    public function __construct() {
        parent::__construct();
    }


    public function user_sub_type() {

        $this->form_validation->set_rules('user_sub_type_title', 'User Sub Type Title', 'trim|required|is_unique[user_sub_types.sub_type_title]');

        if($this->form_validation->run()){
            if ($this->admin_user_sub_type_m->add_user_sub_type()) {
                $this->session->set_flashdata('success', 'Successfully Add User Sub Type');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add User Sub Type');
            }
        }

        $this->data['sub_types'] = $this->admin_user_sub_type_m->get();
        $this->data['content'] = 'admin/user_category/sub_type/sub_type';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_user_sub_type($sub_type_id = null)
    {
        $this->form_validation->set_rules('user_sub_type_title', 'User Sub Type Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->admin_user_sub_type_m->update_user_sub_type($sub_type_id)) {
                $this->session->set_flashdata('successup','Update User Sub Type successfull.');
            }else {
                $this->session->set_flashdata('failup','Update User Sub Type Failed.');
            }
            redirect(base_url('admin/userSubType'));
        }
        $this->data['sub_type'] = $this->admin_user_sub_type_m->get($sub_type_id);
        $this->data['content'] = 'admin/user_category/sub_type/edit_sub_type';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_user_sub_type($sub_type_id = null)
    {
        if ($this->admin_user_sub_type_m->delete($sub_type_id)) {
            $this->session->set_flashdata('successup','Delete User Sub Type successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete User Sub Type successfull.');
        }
        redirect(base_url('admin/userSubType'));
    }

}


?>
