<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserType extends Admin_Controller
{

    public function __construct() {
        parent::__construct();
    }


    public function user_type() {

        $this->form_validation->set_rules('user_category', 'User Category ', 'trim|required');
        $this->form_validation->set_rules('user_type_title', 'User Type Title', 'trim|required|is_unique[user_types.type_title]');


        if($this->form_validation->run()){
            if ($this->admin_user_type_m->add_user_type()) {
                $this->session->set_flashdata('success', 'Successfully Add User Type');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add User Type');
            }
        }
        $this->data['user_categorys'] = $this->admin_user_category_m->get();
        $this->data['types'] = $this->admin_user_type_m->get_user_types();
        $this->data['content'] = 'admin/user_category/type/type';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_user_type($type_id = null)
    {
        $this->form_validation->set_rules('user_type_title', 'User Type Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->admin_user_type_m->update_user_type($type_id)) {
                $this->session->set_flashdata('successup','Update User Type successfull.');
            }else {
                $this->session->set_flashdata('failup','Update User Type Failed.');
            }
            redirect(base_url('admin/userType'));
        }
        $this->data['type'] = $this->admin_user_type_m->get($type_id);
        $this->data['content'] = 'admin/user_category/type/edit_type';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_user_type($type_id = null)
    {
        if ($this->admin_user_type_m->delete($type_id)) {
            $this->session->set_flashdata('successup','Delete User Type successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete User Type successfull.');
        }
        redirect(base_url('admin/userType'));
    }

    public function get_user_type_by_js()
    {
        $user_category_id = $this->input->post("user_category_id");
        $user_types = $this->admin_user_type_m->get_user_type_by_user_category_id($user_category_id);
        if (count($user_types) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">Select User Type ...</option>';
            foreach ($user_types as $user_type) {
                $pro_select_box .= '<option value="' . $user_type->id . '">' . $user_type->type_title . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }

}


?>
