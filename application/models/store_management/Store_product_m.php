<?php

class Store_product_m extends MY_Model
{
    protected $_table_name = 'store_products';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_store_product()
    {
        $store_id = $this->input->post('store_id');
        $product_codes = $this->input->post('product_code');


        $number_of_product_code = count($product_codes);

        for ($j = 0; $j < $number_of_product_code; $j++)
        {
            $s_d[$j]['product_code'] = $product_codes[$j];
            $s_d[$j]['store_id']     = $store_id;
        }

        if ($this->db->insert_batch($this->_table_name,$s_d)) {
            return true;
        }else{
            return false;
        }
	}


}

?>
