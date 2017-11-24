<?php

class AdminProductController extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_product()
    {
        $this->form_validation->set_rules('product_title','Title','trim|required|min_length[3]');
        $this->form_validation->set_rules('category','Category','trim|required');
        $this->form_validation->set_rules('price','Price','trim|required');
        if ($this->form_validation->run()) {
            $product_code = $this->product_details_m->add_details();
            if ($product_code) {
                if ($this->input->post('size')) {
                    $this->product_size_m->add_size($product_code);
                }
                if ($this->input->post('color')) {
                    $this->product_color_m->add_color($product_code);
                }
                if ($this->input->post('description')!=='<p><br></p>') {
                    $this->product_discription_m->add_discription($product_code);
                }
                if (!empty($_FILES['files']['name'])) {
                    $this->product_image_m->add_image($product_code);
                }
            }
            if ($product_code) {
                $this->session->set_flashdata('success', 'Successfully Add Product');
            } else {
                $this->session->set_flashdata('fail', 'Failed Add Product');
            }
        }
        $this->data['categorys'] = $this->category_m->get();
        $this->data['companys'] = $this->brand_m->get();
        $this->data['sizes'] = $this->size_m->get();
        $this->data['colors'] = $this->color_m->get();
        $this->data['content'] = 'product/add_product';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function product_list()
    {
        $this->data['product_details'] = $this->product_details_m->get_details();
        $this->data['content'] = 'product/product_list';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function product_view($product_code = '')
    {
        $this->data['product_code']  = $product_code;
        $this->data['product_detail'] = $this->product_details_m->get_by(['product_code'=>$product_code],true);
        $this->data['product_description'] = $this->product_discription_m->get_by(['product_code'=>$product_code],true);
        $this->data['product_images'] = $this->product_image_m->get_by(['product_code'=>$product_code],false);
        $this->data['product_sizes'] = $this->product_size_m->get_sizes($product_code);
        $this->data['product_colors'] = $this->product_color_m->get_colors($product_code);
        $this->data['product_brand'] = $this->product_details_m->get_product_brand($product_code);
        $this->data['product_category_sub_category'] = $this->product_details_m->get_product_category_sub_category($product_code);
        $this->data['content'] = 'product/product_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    // edit_product_image

    public function edit_product_image($product_code = '')
    {
        if (!empty($_FILES['files']['name'])) {
            if ($this->product_image_m->add_image($product_code)) {
                $this->session->set_flashdata('success', 'Product Image Update Successfully');
            } else {
                $this->session->set_flashdata('fail', 'Failed Update Product Image');
            }

        }
        $this->data['product_code']  = $product_code;
        $this->data['product_images'] = $this->product_image_m->get_by(['product_code'=>$product_code],false);
        $this->data['content'] = 'product/edit_product_image';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }
    public function delete_product_image($id='')
    {
        $image = $this->product_image_m->get_by(['id'=>$id],true);
        unlink("uploads/product_image/".$image->product_code.'/' .$image->image);
        unlink("uploads/product_image/".$image->product_code.'/thumbnail/' .$image->image);
        if ($this->product_image_m->delete($id)) {
            $this->session->set_flashdata('successup','Delete Product Image Successfully.');
        }else {
            $this->session->set_flashdata('failup','Delete Product Image Failed.');
        }
        redirect(base_url('admin/editProductImage/'.$image->product_code));
    }

    // edit_product_brand

    public function edit_product_brand($product_code = '')
    {
        $this->form_validation->set_rules('company','Brand','trim');
        if ($this->form_validation->run()) {
            if ($this->product_details_m->update_product_band($product_code)) {
                $this->session->set_flashdata('success', 'Product Brand Update Successfully');
            } else {
                $this->session->set_flashdata('fail', 'Failed Update Product Brand');
            }
            redirect(base_url('admin/viewProduct/' . $product_code));
        }
        $this->data['product_code']  = $product_code;
        $this->data['product_brand'] = $this->product_details_m->get_product_brand($product_code);
        $this->data['companys'] = $this->brand_m->get();
        $this->data['content'] = 'product/edit_product_brand';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function edit_product_cat($product_code = '')
    {
        $this->form_validation->set_rules('category','Category','trim|required');
        if ($this->form_validation->run()) {
            if ($this->product_details_m->update_product_band($product_code)) {
                $this->session->set_flashdata('success', 'Product Brand Update Successfully');
            } else {
                $this->session->set_flashdata('fail', 'Failed Update Product Brand');
            }
            redirect(base_url('admin/viewProduct/' . $product_code));
        }
        $this->data['product_code']  = $product_code;
        $this->data['categorys'] = $this->category_m->get();
        $this->data['content'] = 'product/edit_product_cat';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function edit_product_details($product_code="",$description_id="")
    {
        $this->form_validation->set_rules('product_title','Title','trim|required|min_length[3]');
        $this->form_validation->set_rules('price','Price','trim|required');
        if ($this->form_validation->run()) {
            if ($this->product_details_m->update_product_details($product_code)) {
                $this->product_discription_m->update_discription($description_id,$product_code);
                $this->session->set_flashdata('success', ' Update Product Successfully');
            } else {
                $this->session->set_flashdata('fail', 'Failed Update Product');
            }
            redirect(base_url('admin/viewProduct/' . $product_code));
        }

        $this->data['product_code']  = $product_code;
        $this->data['product_description'] = $this->product_discription_m->get_by(['product_code'=>$product_code],true);
        $this->data['product_detail'] = $this->product_details_m->get_by(['product_code'=>$product_code],true);
        $this->data['content'] = 'product/edit_product_details';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }


    public function product_delete($product_code = '')
    {
        $path_1="uploads/product_image/".$product_code.'/thumbnail/';
        $path_2="uploads/product_image/".$product_code.'/';
        if($this->delete_file_n_folder($path_1)){
            $file = $this->delete_file_n_folder($path_2);
        }

        if(1){
            $this->product_details_m->delete($product_code);
            $this->session->set_flashdata('success','Delete Brand Successfully.');
        }else {
            $this->session->set_flashdata('fail','Delete Brand Failed.');
        }
        redirect(base_url('admin/productList'));
    }

    public function delete_file_n_folder($path='')
    {
        delete_files($path, true);
        if (rmdir($path)) {
            return true;
        }else {
            return FALSE;
        }
    }
}
