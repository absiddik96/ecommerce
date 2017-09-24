<?php
/**
 *
 */
class Mobile_bank_m extends MY_Model
{
    protected $_table_name = 'user_mobile_bank_details';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_mobile_bank($user_id = null)
    {
        $data['user_id']      = $user_id;
        $data['country_id']   = $this->input->post('country_id');
        $data['mobile_bank_id']   = $this->input->post('account_id');
        $data['phone_number'] = $this->input->post('phone_number');

        if ($this->save($data)) {
            return true;
        }else{
            return false;
        }
    }

    public function edit_mobile_bank($id = null)
    {
        $data['phone_number'] = $this->input->post('phone_number');

        if ($this->save($data,$id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_mobile_bank($user_id = null)
    {
        $this->db->select('user_mobile_bank_details.id,user_mobile_bank_details.phone_number,country.country_name,mobile_banks.mobile_bank_name');
        $this->db->join('country', 'user_mobile_bank_details.country_id = country.id');
        $this->db->join('mobile_banks', 'user_mobile_bank_details.mobile_bank_id = mobile_banks.id');
        $this->db->where('user_mobile_bank_details.user_id',$user_id);
        $mobile_banks = $this->get();
        if(count($mobile_banks)){
            return $mobile_banks;
        }else {
            return FALSE;
        }
    }

    public function get_mobile_bank_by_id($id = null)
    {
        $mobile_bank = $this->get($id);
        if(count($mobile_bank)){
            return $mobile_bank;
        }else {
            return FALSE;
        }
    }

}

 ?>
