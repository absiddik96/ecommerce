<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminColorController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function color() {

        $this->form_validation->set_rules('color_title', 'Color Title', 'trim|required|is_unique[colors.color_title]');

        if($this->form_validation->run()){
            if ($this->color_m->add_color()) {
                $this->session->set_flashdata('success', 'Successfully Add Color');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Color');
            }
        }

        $this->data['colors'] = $this->color_m->get();
        $this->data['content'] = 'admin/product_management/color/color_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_color($color_id)
    {
        $this->form_validation->set_rules('color_title', 'Color Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->color_m->update_color($color_id)) {
                $this->session->set_flashdata('successup','Update Color successfull.');
            }else {
                $this->session->set_flashdata('failup','Update Color Failed.');
            }
            redirect(base_url('admin/color'));
        }
        $this->data['color'] = $this->color_m->get($color_id);
        $this->data['content'] = 'admin/product_management/color/edit_color';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete_color($color_id)
    {
        if ($this->color_m->delete($color_id)) {
            $this->session->set_flashdata('successup','Delete Color successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete Color successfull.');
        }
        redirect(base_url('admin/color'));
    }

}
