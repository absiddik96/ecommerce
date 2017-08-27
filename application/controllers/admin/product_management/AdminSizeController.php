<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSizeController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function size() {

        $this->form_validation->set_rules('size_title', 'Size Title', 'trim|required|is_unique[sizes.size_title]');

        if($this->form_validation->run()){
            if ($this->size_m->add_size()) {
                $this->session->set_flashdata('success', 'Successfully Add Size');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Size');
            }
        }

        $this->data['sizes'] = $this->size_m->get();
        $this->data['content'] = 'admin/product_management/size/size_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_size($size_id)
    {
        $this->form_validation->set_rules('size_title', 'Size Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->size_m->update_size($size_id)) {
                $this->session->set_flashdata('successup','Update size successfull.');
            }else {
                $this->session->set_flashdata('failup','Update size successfull.');
            }
            redirect(base_url('admin/size'));
        }
        $this->data['size'] = $this->size_m->get($size_id);
        $this->data['content'] = 'admin/product_management/size/edit_size';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_size($size_id)
    {
        if ($this->size_m->delete($size_id)) {
            $this->session->set_flashdata('successup','Delete Size successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete Size successfull.');
        }
        redirect(base_url('admin/size'));
    }

}
