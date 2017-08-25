<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminVillageMohollaController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function add_village_moholla() {

        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('division_state', 'Division / Province / State', 'trim|required');
        $this->form_validation->set_rules('district_city', 'District / City', 'trim|required');
        $this->form_validation->set_rules('upazila_ps', 'Upazila / Police Station', 'trim|required');
        $this->form_validation->set_rules('union_word', 'Union / Word', 'trim|required');
        $this->form_validation->set_rules('village_moholla_name', 'Union / Word', 'trim|required|is_unique[village_mohollas.village_moholla_name]');

        if($this->form_validation->run()){
            if ($this->village_moholla_m->add_village_moholla()) {
                $this->session->set_flashdata('success', 'Successfully Village / Moholla');
            } else {
                $this->session->set_flashdata('fail', 'Failed Village / Moholla');
            }
        }

        $this->data['countries'] = $this->country_m->get();
        $this->data['content'] = 'admin/location/add_village_moholla';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function village_moholla() {

        $this->data['village_mohollas'] = $this->village_moholla_m->get_village_moholla();
        $this->data['content'] = 'admin/location/village_moholla';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_village_moholla($village_moholla_id)
    {
        $this->form_validation->set_rules('village_moholla_name', 'Union / Word', 'trim|required');

        if($this->form_validation->run()){
            if ($this->village_moholla_m->update_village_moholla($village_moholla_id)) {
                $this->session->set_flashdata('success', 'Successfully Update Union / Word');
            } else {
                $this->session->set_flashdata('fail', 'Failed update Union / Word');
            }
            redirect(base_url('admin/villageMohollaList'),"refresh");
        }
        $this->data['village_moholla'] = $this->village_moholla_m->get($village_moholla_id);
        $this->data['content'] = 'admin/location/edit_village_moholla';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_village_moholla($village_moholla_id)
    {
        if ($this->village_moholla_m->delete($village_moholla_id)) {
            $this->session->set_flashdata('success', 'Successfully Delete Union / Word');
        } else {
            $this->session->set_flashdata('fail', 'Failed Delete Union / Word');
        }
        redirect(base_url('admin/villageMohollaList'),"refresh");
    }

    public function get_village_moholla_by_js() {
        $union_word_id = $this->input->post("union_word_id");
        $village_mohollas = $this->village_moholla_m->get_village_moholla_by_union_word_id($union_word_id);
        if (count($village_mohollas) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">Select Village/Moholla ...</option>';
            foreach ($village_mohollas as $village_moholla) {
                $pro_select_box .= '<option value="' . $village_moholla->id . '">' . $village_moholla->village_moholla_name . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }

}
