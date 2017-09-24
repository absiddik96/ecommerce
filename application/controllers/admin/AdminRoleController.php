<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminRoleController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function add_role() {

        $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required|is_unique[roles.name]');

        if($this->form_validation->run()){
            if ($this->role_m->add_role()) {
                $this->session->set_flashdata('success', 'Successfully Add Role');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Role');
            }
        }

        $this->data['roles'] = $this->role_m->get();
        $this->data['content'] = 'admin/role/role';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_role($role_id)
    {
        $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->role_m->update_role($role_id)) {
                $this->session->set_flashdata('success','Update Role successfull.');
            }else {
                $this->session->set_flashdata('fail','Update Role successfull.');
            }
            redirect(base_url('admin/role'));
        }
        $this->data['role'] = $this->role_m->get($role_id);
        $this->data['content'] = 'admin/role/edit_role';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_role($role_id)
    {
        if ($this->role_m->delete($role_id)) {
            $this->session->set_flashdata('success','Delete Role successfull.');
        }else {
            $this->session->set_flashdata('fail','Delete Role successfull.');
        }
        redirect(base_url('admin/role'));
    }

}
