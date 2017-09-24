<?php
/**
 *
 */
class Bank_m extends MY_Model
{
    protected $_table_name = 'user_bank_details';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_bank($user_id = null)
    {
        $data['user_id']      = $user_id;
        $data['bank_name']    = $this->input->post('bank_name');
        $data['ac_name']      = $this->input->post('ac_name');
        $data['ac_number']    = $this->input->post('ac_number');
        $data['iban_number']  = $this->input->post('iban_number');
        $data['swift_code']   = $this->input->post('swift_code');
        $data['bank_address'] = $this->input->post('bank_address');

        if ($this->save($data)) {
            return true;
        }else{
            return false;
        }
    }

    public function edit_bank($id = null)
    {
        $data['bank_name']    = $this->input->post('bank_name');
        $data['ac_name']      = $this->input->post('ac_name');
        $data['ac_number']    = $this->input->post('ac_number');
        $data['iban_number']  = $this->input->post('iban_number');
        $data['swift_code']   = $this->input->post('swift_code');
        $data['bank_address'] = $this->input->post('bank_address');

        if ($this->save($data,$id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_bank($user_id = null)
    {
        $this->db->where('user_id',$user_id);
        $banks = $this->get();
        if(count($banks)){
            return $banks;
        }else {
            return FALSE;
        }
    }

    public function get_bank_by_id($id = null)
    {
        $bank = $this->get($id);
        if(count($bank)){
            return $bank;
        }else {
            return FALSE;
        }
    }

}

 ?>
