<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUnionWordController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function add_union_word() {

        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('division_state', 'Division / Province / State', 'trim|required');
        $this->form_validation->set_rules('district_city', 'District / City', 'trim|required');
        $this->form_validation->set_rules('upazila_ps', 'Upazila / Police Station', 'trim|required');
        $this->form_validation->set_rules('union_word_name', 'Union / Word', 'trim|required|is_unique[union_words.union_word_name]');

        if($this->form_validation->run()){
            if ($this->union_word_m->add_union_word()) {
                $this->session->set_flashdata('success', 'Successfully Add Union / Word');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Union / Word');
            }
        }

        $this->data['countries'] = $this->country_m->get();
        $this->data['content'] = 'admin/location/add_union_word';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function union_word() {

        $this->data['union_words'] = $this->union_word_m->get_union_word();
        $this->data['content'] = 'admin/location/union_word';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_union_word($union_word_id)
    {
        $this->form_validation->set_rules('union_word_name', 'Union / Word', 'trim|required');

        if($this->form_validation->run()){
            if ($this->union_word_m->update_union_word($union_word_id)) {
                $this->session->set_flashdata('success', 'Successfully Update Union / Word');
            } else {
                $this->session->set_flashdata('fail', 'Failed update Union / Word');
            }
            redirect(base_url('admin/unionWordList'),"refresh");
        }
        $this->data['union_word'] = $this->union_word_m->get($union_word_id);
        $this->data['content'] = 'admin/location/edit_union_word';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_union_word($union_word_id)
    {
        if ($this->union_word_m->delete($union_word_id)) {
            $this->session->set_flashdata('success', 'Successfully Delete Union / Word');
        } else {
            $this->session->set_flashdata('fail', 'Failed Delete Union / Word');
        }
        redirect(base_url('admin/unionWordList'),"refresh");
    }

    public function get_union_word_by_js() {
        $upazila_ps_id = $this->input->post("upazila_ps_id");
        $union_words = $this->union_word_m->get_union_word_by_upazila_ps_id($upazila_ps_id);
        if (count($union_words) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">Select Union / Word ...</option>';
            foreach ($union_words as $union_word) {
                $pro_select_box .= '<option value="' . $union_word->id . '">' . $union_word->union_word_name . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }

}
