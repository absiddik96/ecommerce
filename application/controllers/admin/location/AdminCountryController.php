<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCountryController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function add_country() {

        $this->form_validation->set_rules('country_name', 'Country Name', 'trim|required|is_unique[country.country_name]');

        if($this->form_validation->run()){
            if ($this->country_m->add_country()) {
                $this->session->set_flashdata('success', 'Successfully Add Country');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Country');
            }
        }

        $this->data['countrys'] = $this->country_m->get();
        $this->data['content'] = 'admin/location/country';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_country($country_id)
    {
        $this->form_validation->set_rules('country_name', 'Country Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->country_m->update_country($country_id)) {
                $this->session->set_flashdata('success','Update Country successfull.');
            }else {
                $this->session->set_flashdata('fail','Update Country successfull.');
            }
            redirect(base_url('admin/country'));
        }
        $this->data['country'] = $this->country_m->get($country_id);
        $this->data['content'] = 'admin/location/edit_country';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_country($country_id)
    {
        if ($this->country_m->delete($country_id)) {
            $this->session->set_flashdata('success','Delete Country successfull.');
        }else {
            $this->session->set_flashdata('fail','Delete Country successfull.');
        }
        redirect(base_url('admin/country'));
    }

}
