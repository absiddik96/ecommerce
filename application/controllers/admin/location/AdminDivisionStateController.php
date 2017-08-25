<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDivisionStateController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function division_state() {

        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('division_state_name', 'Division / Province / State Name', 'trim|required|is_unique[division_state.division_state_name]');

        if($this->form_validation->run()){
            if ($this->division_state_m->add_division_state()) {
                $this->session->set_flashdata('success', 'Successfully Add Division / Province / State');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Division / Province / State');
            }
        }

        $this->data['division_states'] = $this->division_state_m->get_division_state();
        $this->data['countrys'] = $this->country_m->get();
        $this->data['content'] = 'admin/location/division_province_state';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_division_state($division_state_id)
    {
        $this->form_validation->set_rules('division_state_name', 'Division / Province / State name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->division_state_m->update_division_state($division_state_id)) {
                $this->session->set_flashdata('successup', 'Successfully Update Division / Province / State');
            } else {
                $this->session->set_flashdata('failup', 'Failed Update Division / Province / State');
            }
            redirect(base_url('admin/divisionState'));
        }
        $this->data['division_states'] = $this->division_state_m->get($division_state_id);
        $this->data['content'] = 'admin/location/edit_division_province_state';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_division_state($division_state_id)
    {
        if ($this->division_state_m->delete($division_state_id)) {
            $this->session->set_flashdata('successup', 'Successfully Delete Division / Province / State');
        } else {
            $this->session->set_flashdata('failup', 'Failed Update Delete Country');
        }
        redirect(base_url('admin/divisionState'));
    }

    public function get_division_state_by_js() {
        $country_id = $this->input->post("country_id");
        $division_states = $this->division_state_m->get_division_state_by_country_id($country_id);
        if (count($division_states) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">Select Division / Province / State ...</option>';
            foreach ($division_states as $division_state) {
                $pro_select_box .= '<option value="' . $division_state->id . '">' . $division_state->division_state_name . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }

}
