<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBranchController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function branch() {
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('division_state', 'Division / Province / State', 'trim|required');
        $this->form_validation->set_rules('district_city', 'District / City', 'trim|required');
        $this->form_validation->set_rules('upazila_ps', 'Upazila / Police Station', 'trim|required');
        $this->form_validation->set_rules('union_word', 'Union / Word', 'trim|required');
        $this->form_validation->set_rules('village_moholla', 'Village / Moholla', 'trim|required');
        $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required|is_unique[branchs.branch_name]');

        if($this->form_validation->run()){
            if ($this->branch_m->add_branch()) {
                $this->session->set_flashdata('success', 'Successfully Add Branch');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Branch');
            }
        }
        $this->data['countries'] = $this->country_m->get();
        $this->data['branchs'] = $this->branch_m->get_branchs();
        $this->data['content'] = 'admin/product_management/branch/branch';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_branch($branch_id)
    {
        $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->branch_m->update_branch($branch_id)) {
                $this->session->set_flashdata('successup','Update Branch successfull.');
            }else {
                $this->session->set_flashdata('failup','Update Branch successfull.');
            }
            redirect(base_url('admin/branch'));
        }
        $this->data['branch'] = $this->branch_m->get($branch_id);
        $this->data['content'] = 'admin/product_management/branch/edit_branch';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_branch($branch_id)
    {
        if ($this->branch_m->delete($branch_id)) {
            $this->session->set_flashdata('successup','Delete Branch successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete Branch successfull.');
        }
        redirect(base_url('admin/branch'));
    }

}
