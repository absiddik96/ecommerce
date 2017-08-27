<?php

class Brand_m extends MY_Model
{
    protected $_table_name = 'brands';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_brand($brand_logo = null)
    {
        $this->data = [
            'brand_name' => $this->input->post('brand_name'),
            'category_id' => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
            'brand_logo' => $brand_logo
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_brands() {
        $this->db->select('brands.id, brands.brand_name,brands.brand_logo,categorys.category_title,sub_categorys.sub_category_title ');
        $this->db->join('categorys', 'categorys.id = brands.category_id');
        $this->db->join('sub_categorys', 'sub_categorys.id=brands.sub_category_id');
        $this->db->order_by("brand_name", "asc");
        $brands = $this->get();
        if (count($brands)) {
            return $brands;
        } else {
            return FALSE;
        }
    }

    public function update_brand($brand_id = null,$brand_logo = null)
    {
        $this->data = [
            'brand_name' => $this->input->post('brand_name'),
            'brand_logo' => $brand_logo
        ];

        if ($this->save($this->data,$brand_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
