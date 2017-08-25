<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDistrictCityController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function add_district_city() {

        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('division_state', 'Division / Province / State', 'trim|required');
        $this->form_validation->set_rules('district_city_name', 'District / City', 'trim|required|is_unique[district_city.district_city_name]');

        if($this->form_validation->run()){
            if ($this->district_city_m->add_district_city()) {
                $this->session->set_flashdata('success', 'Successfully Add District / City');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add District / City');
            }
        }

        $this->data['countries'] = $this->country_m->get();
        $this->data['content'] = 'admin/location/add_district_city';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function district_city() {

        $this->data['district_citys'] = $this->district_city_m->get_district_city();
        $this->data['content'] = 'admin/location/district_city';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_district_city($district_city_id)
    {
        $this->form_validation->set_rules('district_city_name', 'District / City', 'trim|required');

        if($this->form_validation->run()){
            if ($this->district_city_m->update_district_city($district_city_id)) {
                $this->session->set_flashdata('success', 'Successfully Update District / City');
            } else {
                $this->session->set_flashdata('fail', 'Failed update District / City');
            }
            redirect(base_url('admin/districtCityList'),"refresh");
        }
        $this->data['district_city'] = $this->district_city_m->get($district_city_id);
        $this->data['content'] = 'admin/location/edit_district_city';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_district_city($district_city_id)
    {
        if ($this->district_city_m->delete($district_city_id)) {
            $this->session->set_flashdata('success', 'Successfully Delete District / City');
        } else {
            $this->session->set_flashdata('fail', 'Failed Delete District / City');
        }
        redirect(base_url('admin/districtCityList'),"refresh");
    }

    public function get_district_city_by_js() {
        $division_state_id = $this->input->post("division_state_id");
        $district_citys = $this->district_city_m->get_district_city_by_division_state_id($division_state_id);
        if (count($district_citys) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">Select District / City ...</option>';
            foreach ($district_citys as $district_city) {
                $pro_select_box .= '<option value="' . $district_city->id . '">' . $district_city->district_city_name . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }

}
