<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proof_of_address_m extends MY_Model
{

    protected $_table_name  = 'proof_of_addresses';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function edit_proof_of_address($user_id = null,$image_name = null,$proof_id=null)
    {
        $data['user_id']    = $user_id;
        $data['id_type']    = $this->input->post('id_type');
        $data['attachment'] = $image_name;

        if ($proof_id) {
            if ($this->save($data,$proof_id)) {
                return true;
            }else{
                return false;
            }
        }else {
            if ($this->save($data)) {
                return true;
            }else{
                return false;
            }
        }

    }
}


?>
