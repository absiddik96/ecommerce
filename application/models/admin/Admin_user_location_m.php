<?php

class Admin_user_location_m extends MY_Model
{
    protected $_table_name = 'users_admin_location';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function create_admin_location($user_id = null)
    {
        $data = [
            'user_id'            => $user_id,
            'country_id'         => $this->input->post('country'),
            'division_state_id'  => $this->input->post('division_state'),
            'district_city_id'   => $this->input->post('district_city'),
            'upazila_ps_id'      => $this->input->post('upazila_ps'),
            'union_word_id'      => $this->input->post('union_word'),
            'village_moholla_id' => $this->input->post('village_moholla'),
        ];

        if ($this->save($data)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
