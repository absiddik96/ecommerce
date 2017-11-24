<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_identity_m extends MY_Model
{

    protected $_table_name  = 'personal_identities';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function edit_personal_identity($user_id = null,$image_name = null,$pi_id=null)
    {
        $data['user_id']    = $user_id;
        $data['id_type']    = $this->input->post('id_type');
        $data['id_number']  = $this->input->post('id_number');
        $data['attachment'] = $image_name;

        if ($pi_id) {
            if ($this->save($data,$pi_id)) {
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
