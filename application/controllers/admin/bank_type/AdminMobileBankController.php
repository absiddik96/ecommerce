<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMobileBankController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function mobile_bank() {

        $this->form_validation->set_rules('mobile_bank_name', 'Mobile Bank Name', 'trim|required|is_unique[mobile_banks.mobile_bank_name]');

        if($this->form_validation->run()){
            if ($this->mobile_bank_m->add_mobile_bank()) {
                $this->session->set_flashdata('success', 'Successfully Add Mobile Bank');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Mobile Bank');
            }
        }

        $this->data['mobile_banks'] = $this->mobile_bank_m->get();
        $this->data['content'] = 'admin/bank_type/mobile_bank/mobile_bank';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_mobile_bank($mobile_bank_id)
    {
        $this->form_validation->set_rules('mobile_bank_name', 'mobile_bank Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->mobile_bank_m->update_mobile_bank($mobile_bank_id)) {
                $this->session->set_flashdata('successup','Update Mobile Bank successfull.');
            }else {
                $this->session->set_flashdata('failup','Update Mobile Bank successfull.');
            }
            redirect(base_url('admin/mobileBank'),"refresh");
        }
        $this->data['mobile_bank'] = $this->mobile_bank_m->get($mobile_bank_id);
        $this->data['content'] = 'admin/bank_type/mobile_bank/edit_mobile_bank';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_mobile_bank($mobile_bank_id)
    {
        if ($this->mobile_bank_m->delete($mobile_bank_id)) {
            $this->session->set_flashdata('successup','Delete Mobile Bank successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete Mobile Bank successfull.');
        }
        redirect(base_url('admin/mobileBank'),"refresh");
    }

}
