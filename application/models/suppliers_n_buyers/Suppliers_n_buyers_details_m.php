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

    public function get_suppliers_n_buyers_details($user_id = null)
    {
        $this->db->select('suppliers_n_buyer_details.id,suppliers_n_buyer_details.contact_name,suppliers_n_buyer_details.contact_designation,suppliers_n_buyer_details.phone,suppliers_n_buyer_details.web_site_url,suppliers_n_buyer_details.user_sub_type_id,user_categorys.category_title,user_types.type_title,user_sub_types.sub_type_title,suppliers_n_buyer_details.others');

        $this->db->join('user_categorys','user_categorys.id = suppliers_n_buyer_details.user_category_id');
        $this->db->join('user_types','user_types.id = suppliers_n_buyer_details.user_type_id');
        $this->db->join('user_sub_types','user_sub_types.id = suppliers_n_buyer_details.user_sub_type_id or suppliers_n_buyer_details.user_sub_type_id = 0');
        $sb_details = $this->get_by([
            'suppliers_n_buyer_details.user_id'=>$user_id,
        ],true);

        if(count($sb_details)){
            return $sb_details;
        }else {
            return false;
        }
    }

}

?>
