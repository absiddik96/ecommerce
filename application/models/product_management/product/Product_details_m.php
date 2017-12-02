<?php

class Product_details_m extends MY_Model
{
    protected $_table_name = 'product_details';
    protected $_primary_key = 'product_code';

    function __construct()
    {
        parent::__construct();
    }

    public function add_details()
    {
        $product_code  = rand(10,99).time().rand(100,999);
        $product_title = $this->input->post('product_title');
        $slug_string   = $product_title." ".$product_code;
        $product_slug  = url_title($slug_string, 'dash', true);

        $this->data = [
            'product_code'    => $product_code,
            'slug'            => $product_slug,
            'product_title'   => $product_title,
            'category_id'     => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
            'brand_id'        => $this->input->post('company'),
            'weight'          => $this->input->post('weight'),
            'price'           => $this->input->post('price'),
        ];

        if ($this->save($this->data)) {
            return $this->data['product_code'];
        }else{
            return false;
        }
    }

    public function get_details()
    {
        $this->db->select('product_details.product_code,product_details.product_title,product_details.price,categorys.category_title,sub_categorys.sub_category_title');
        $this->db->join('categorys', 'categorys.id = product_details.category_id');
        $this->db->join('sub_categorys', 'sub_categorys.id=product_details.sub_category_id');
        $this->db->order_by("product_details.product_title", "asc");
        $product_details = $this->get();
        if(count($product_details)){
            return $product_details;
        }else {
            return FALSE;
        }
    }

    public function update_product_band($product_code='')
    {
        $this->data = [
            'brand_id'        => $this->input->post('company'),
        ];

        if ($this->save($this->data,$product_code)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_product_cat($product_code='')
    {
        $this->data = [
            'category_id'     => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
        ];

        if ($this->save($this->data,$product_code)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_product_details($product_code='')
    {
        $product_title = $this->input->post('product_title');
        $slug_string   = $product_title." ".$product_code;
        $product_slug  = url_title($slug_string, 'dash', true);

        $this->data = [
            'slug'            => $product_slug,
            'product_title'   => $product_title,
            'weight'          => $this->input->post('weight'),
            'price'           => $this->input->post('price'),
        ];

        if ($this->save($this->data,$product_code)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_product_brand($product_code='')
    {
        $this->db->select('product_details.product_code,brands.id,brands.brand_name');
        $this->db->join('brands', 'product_details.brand_id = brands.id');
        $product_brand = $this->get_by(['product_code' => $product_code],true);
        if(count($product_brand)){
            return $product_brand;
        }else {
            return FALSE;
        }
    }

    public function get_product_category_sub_category($product_code='')
    {
        $this->db->select('categorys.id,categorys.category_title,sub_categorys.id,sub_categorys.sub_category_title');
        $this->db->join('categorys', 'product_details.category_id = categorys.id');
        $this->db->join('sub_categorys', 'product_details.sub_category_id = sub_categorys.id');
        $product_category_sub_category = $this->get_by(['product_code ' => $product_code],true);
        if(count($product_category_sub_category)){
            return $product_category_sub_category;
        }else {
            return FALSE;
        }
    }


    public function update_details($details_id = null)
    {
        $this->data = [
            'details_name' => $this->input->post('details_name')
        ];

        if ($this->save($this->data,$details_id)) {
            return true;
        }else{
            return false;
        }
    }


}

?>
