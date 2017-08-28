<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEWalletController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function ewallet() {

        $this->form_validation->set_rules('ewallet_name', 'E-Wallet Name', 'trim|required|is_unique[ewallets.ewallet_name]');

        if($this->form_validation->run()){
            if ($this->e_wallet_m->add_ewallet()) {
                $this->session->set_flashdata('success', 'Successfully Add ewallet');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add ewallet');
            }
        }

        $this->data['ewallets'] = $this->e_wallet_m->get();
        $this->data['content'] = 'admin/bank_type/e_wallet/ewallet';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_ewallet($ewallet_id)
    {
        $this->form_validation->set_rules('ewallet_name', 'E-Wallet Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->e_wallet_m->update_ewallet($ewallet_id)) {
                $this->session->set_flashdata('successup','Update ewallet successfull.');
            }else {
                $this->session->set_flashdata('failup','Update ewallet successfull.');
            }
            redirect(base_url('admin/eWallet'));
        }
        $this->data['ewallet'] = $this->e_wallet_m->get($ewallet_id);
        $this->data['content'] = 'admin/bank_type/e_wallet/edit_ewallet';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_ewallet($ewallet_id)
    {
        if ($this->e_wallet_m->delete($ewallet_id)) {
            $this->session->set_flashdata('successup','Delete ewallet successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete ewallet successfull.');
        }
        redirect(base_url('admin/eWallet'));
    }

}
