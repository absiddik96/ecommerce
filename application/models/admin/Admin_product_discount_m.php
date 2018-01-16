<?php

class Admin_product_discount_m extends MY_Model
{
    protected $_table_name = 'product_discounts';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_discount()
    {
        $discount_type = $this->input->post('discount_type');
        $discount      = $this->input->post('discount');
        $store_id      = $this->input->post('store');
        $product_codes = $this->input->post('product_code');


        $number_of_product_code = count($product_codes);

        for ($j = 0; $j < $number_of_product_code; $j++)
        {
            $s_d[$j]['product_code']  = $product_codes[$j];
            $s_d[$j]['discount_type'] = $discount_type;
            $s_d[$j]['discount']      = $discount;
            $s_d[$j]['store_id']      = $store_id;
        }

        if ($this->db->insert_batch($this->_table_name,$s_d)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
