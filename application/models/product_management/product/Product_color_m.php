<?php

class Product_color_m extends MY_Model
{
    protected $_table_name = 'product_colors';
    protected $_primary_key = 'id';
    protected $s_d = '';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_color($product_code='')
    {
        $colors = $this->input->post('color');
        $number_of_color = count($colors);
        for ($j = 0; $j < $number_of_color; $j++) {
            $this->s_d[$j]['color_id'] = $colors[$j];
            $this->s_d[$j]['product_code'] = $product_code;
        }

        if ($this->db->insert_batch($this->_table_name,$this->s_d)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_colors($product_code='')
    {
        $this->db->select('product_colors.id,colors.color_title');
        $this->db->join('colors', 'product_colors.color_id = colors.id');
        $this->db->order_by("colors.color_title", "asc");
        $product_colors = $this->get_by(['product_code ' => $product_code],FALSE);
        if(count($product_colors)){
            return $product_colors;
        }else {
            return FALSE;
        }
    }


    public function update_color($color_id = null)
    {
        $this->data = [
            'color_name' => $this->input->post('color_name')
        ];

        if ($this->save($this->data,$color_id)) {
            return true;
        }else{
            return false;
        }
    }


}

?>
