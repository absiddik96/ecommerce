<?php

class Product_discription_m extends MY_Model
{
    protected $_table_name = 'product_description';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_discription($product_code='')
    {
        $this->data = [
            'product_code' => $product_code,
            'description'  => $this->input->post('description'),
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_discription($description_id='',$product_code='')
    {
        $this->data = [
            'description'  => $this->input->post('description'),
        ];
        $des = $this->get_by(['product_code ' => $product_code],true);

        if($des->id === $description_id){
            if ($this->save($this->data,$description_id)) {
                return true;
            }else{
                return false;
            }
        }else {
            if ($this->add_discription($product_code)) {
                return true;
            }else{
                return false;
            }
        }


    }


}

?>
