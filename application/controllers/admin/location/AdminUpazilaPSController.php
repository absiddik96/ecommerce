<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUpazilaPSController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function add_upazila_ps() {

        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('division_state', 'Division / Province / State', 'trim|required');
        $this->form_validation->set_rules('district_city', 'District / City', 'trim|required');
        $this->form_validation->set_rules('upazila_ps_name', 'Upazila / Police Station', 'trim|required|is_unique[upazila_ps.upazila_ps_name]');

        if($this->form_validation->run()){
            if ($this->upazila_ps_m->add_upazila_ps()) {
                $this->session->set_flashdata('success', 'Successfully Add Upazila / Police Station');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Upazila / Police Station');
            }
        }

        $this->data['countries'] = $this->country_m->get();
        $this->data['content'] = 'admin/location/add_upazila_ps';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function upazila_ps() {

        $this->data['upazila_pss'] = $this->upazila_ps_m->get_upazila_ps();
        $this->data['content'] = 'admin/location/upazila_ps';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_upazila_ps($upazila_ps_id)
    {
        $this->form_validation->set_rules('upazila_ps_name', 'Upazila / Police Station', 'trim|required');

        if($this->form_validation->run()){
            if ($this->upazila_ps_m->update_upazila_ps($upazila_ps_id)) {
                $this->session->set_flashdata('success', 'Successfully Update Upazila / Police Station');
            } else {
                $this->session->set_flashdata('fail', 'Failed update Upazila / Police Station');
            }
            redirect(base_url('admin/upazilaPSList'),"refresh");
        }
        $this->data['upazila_ps'] = $this->upazila_ps_m->get($upazila_ps_id);
        $this->data['content'] = 'admin/location/edit_upazila_ps';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_upazila_ps($upazila_ps_id)
    {
        if ($this->upazila_ps_m->delete($upazila_ps_id)) {
            $this->session->set_flashdata('success', 'Successfully Delete Upazila / Police Station');
        } else {
            $this->session->set_flashdata('fail', 'Failed Delete Upazila / Police Station');
        }
        redirect(base_url('admin/upazilaPSList'),"refresh");
    }

    public function get_upazila_ps_by_js() {
        $district_city_id = $this->input->post("district_city_id");
        $upazila_pss = $this->upazila_ps_m->get_upazila_ps_by_district_city_id($district_city_id);
        if (count($upazila_pss) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">Select Upazila / Police Station ...</option>';
            foreach ($upazila_pss as $upazila_ps) {
                $pro_select_box .= '<option value="' . $upazila_ps->id . '">' . $upazila_ps->upazila_ps_name . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }

}
