<?php

class Product_size_m extends MY_Model
{
    protected $_table_name = 'product_sizes';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_size($product_code='')
    {
        $sizes = $this->input->post('size');
        $number_of_size = count($sizes);
        for ($i = 0; $i < $number_of_size; $i++) {
            $s_data[$i]['size_id'] = $sizes[$i];
            $s_data[$i]['product_code'] = $product_code;
        }

        if ($this->db->insert_batch('product_sizes',$s_data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_sizes($product_code='')
    {
        $this->db->select('product_sizes.id,sizes.size_title');
        $this->db->join('sizes', 'product_sizes.size_id = sizes.id');
        $this->db->order_by("sizes.size_title", "asc");
        $product_sizes = $this->get_by(['product_code ' => $product_code],FALSE);
        if(count($product_sizes)){
            return $product_sizes;
        }else {
            return FALSE;
        }
    }


    public function update_size($size_id = null)
    {
        $this->data = [
            'size_name' => $this->input->post('size_name')
        ];

        if ($this->save($this->data,$size_id)) {
            return true;
        }else{
            return false;
        }
    }


}

?>
