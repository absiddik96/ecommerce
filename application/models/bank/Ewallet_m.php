<?php
/**
 *
 */
class Ewallet_m extends MY_Model
{
    protected $_table_name = 'user_ewallets_details';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_ewallet($user_id = null)
    {
        $data['user_id']    = $user_id;
        $data['ewallet_type_id'] = $this->input->post('ew_type_id');
        $data['e_wallet_email'] = $this->input->post('e_wallet_email');

        if ($this->save($data)) {
            return true;
        }else{
            return false;
        }
    }

    public function edit_ewallet($id = null)
    {
        $data['e_wallet_email'] = $this->input->post('e_wallet_email');

        if ($this->save($data,$id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_ewallet($user_id = null)
    {
        $this->db->select('user_ewallets_details.id,user_ewallets_details.e_wallet_email,ewallets.ewallet_name');
        $this->db->join('ewallets', 'user_ewallets_details.ewallet_type_id = ewallets.id');
        $this->db->where('user_ewallets_details.user_id',$user_id);
        $ewallets = $this->get();
        if(count($ewallets)){
            return $ewallets;
        }else {
            return FALSE;
        }
    }

    public function get_ewallet_by_id($id = null)
    {
        $ewallet = $this->get($id);
        if(count($ewallet)){
            return $ewallet;
        }else {
            return FALSE;
        }
    }

}

 ?>
