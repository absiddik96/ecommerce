<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBrandController extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function brand() {

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('sub_category', 'Sub Category', 'trim|required');

        if($this->form_validation->run()){
            if ($brand_logo = $this->imageupload('brand_logo')) {
                if ($this->brand_m->add_brand($brand_logo)) {
                    $this->session->set_flashdata('success', 'Successfully Add Brand');
                } else {
                    $this->session->set_flashdata('fail', 'Failed Add Brand');
                }
            }else {
                $this->session->set_flashdata('fail', 'Failed Add Brand');
            }
        }

        $this->data['categorys'] = $this->category_m->get();
        $this->data['brands'] = $this->brand_m->get_brands();
        $this->data['content'] = 'admin/product_management/brand/brand';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function update_brand($brand_id)
    {
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');

        $brand = $this->brand_m->get($brand_id);
        $brand_logo = $brand->brand_logo;
        $new_brand_logo = $this->imageupload('brand_logo');

        if($this->form_validation->run()){
            if ($new_brand_logo != FALSE) {
                unlink('uploads/brand_logo/'.$brand->brand_logo);
                $brand_logo = $new_brand_logo;
            }
            if ($this->brand_m->update_brand($brand_id,$brand_logo)) {
                $this->session->set_flashdata('success', 'Successfully Update Brand');
            } else {
                $this->session->set_flashdata('fail', 'Failed Update Brand');
            }
            redirect(base_url('admin/brand'));
        }

        $this->data['categorys'] = $this->category_m->get();
        $this->data['brand'] = $brand;
        $this->data['content'] = 'admin/product_management/brand/edit_brand';
        $this->load->view('admin/layouts/_layouts_main',$this->data);

    }

    function imageUpload($fieldName) {
        $path = "uploads/brand_logo/";

        if (!is_dir($path)) {
            mkdir($path,0777,TRUE);
        }
        $newname = rand(10000,90000).round(time());

        $config['upload_path']   = $path;
        $config['allowed_types'] = 'gif|png|jpeg|jpg';
        $config['max_size']      = '1024';
        $config['file_name']     = $newname;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $data = $this->upload->data();
            $fileName = $data['file_name'];
            return $fileName;
        } else {
            return FALSE;
        }
    }

    public function delete_brand($brand_id)
    {
        $brand = $this->brand_m->get($brand_id);
        unlink('uploads/brand_logo/'.$brand->brand_logo);
        if ($this->brand_m->delete($brand_id)) {
            $this->session->set_flashdata('success','Delete Brand successfull.');
        }else {
            $this->session->set_flashdata('fail','Delete Brand Failed.');
        }
        redirect(base_url('admin/brand'));
    }

}
