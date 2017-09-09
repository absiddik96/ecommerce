<?php

class Suppliers_n_buyers_details_m extends MY_Model
{
    protected $_table_name = 'suppliers_n_buyer_details';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function create_suppliers_n_buyers_details($user_id = null)
    {
        $data = [
            'user_id'             => $user_id,
            'user_characteristic' => $this->input->post('user_characteristic'),
            'user_category_id'    => $this->input->post('user_category'),
            'user_type_id'        => $this->input->post('user_type'),
            'user_sub_type_id'    => $this->input->post('user_sub_type'),
        ];

        if($data['user_sub_type_id'] == '0'){
            $data['others'] = $this->input->post('others_option');
        }

        if ($this->save($data)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
