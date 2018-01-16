<?php

class AdminStoreController extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($value='')
    {
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('store_name', 'Store Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->store_m->add_store()) {
                $this->session->set_flashdata('success', 'Successfully Add Store');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Store');
            }
        }
        $this->data['countries'] = $this->country_m->get();
        $this->data['stores'] = $this->store_m->get_stores();
        $this->data['content'] = 'admin/store_management/store/create';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update($store_id)
    {
        $this->form_validation->set_rules('store_name', 'Store Name', 'trim|required');

        if($this->form_validation->run()){
            if ($this->store_m->update_store($store_id)) {
                $this->session->set_flashdata('successup','Update Store successfull.');
            }else {
                $this->session->set_flashdata('failup','Update Store successfull.');
            }
            redirect(base_url('admin/store'));
        }
        $this->data['store'] = $this->store_m->get($store_id);
        $this->data['content'] = 'admin/store_management/store/edit';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    public function delete($store_id)
    {
        if ($this->store_m->delete($store_id)) {
            $this->session->set_flashdata('successup','Delete Store successfull.');
        }else {
            $this->session->set_flashdata('failup','Delete Store successfull.');
        }
        redirect(base_url('admin/store'));
    }


}
