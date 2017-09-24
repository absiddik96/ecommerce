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
    public function create_admin_user_location($user_id = null)
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

    public function get_admin_user_location($user_id = null)
    {
        $this->db->select('users_admin_location.id,country.country_name,division_state.division_state_name,district_city.district_city_name,upazila_ps.upazila_ps_name,union_words.union_word_name,village_mohollas.village_moholla_name');
        $this->db->join('country', 'users_admin_location.country_id = country.id');
        $this->db->join('division_state', 'users_admin_location.division_state_id = division_state.id');
        $this->db->join('district_city', 'users_admin_location.district_city_id = district_city.id');
        $this->db->join('upazila_ps', 'users_admin_location.upazila_ps_id = upazila_ps.id');
        $this->db->join('union_words', 'users_admin_location.union_word_id = union_words.id');
        $this->db->join('village_mohollas', 'users_admin_location.village_moholla_id = village_mohollas.id');

        $admin_user_location = $this->get_by([
            'users_admin_location.user_id'=>$user_id,
        ],true);

        if(count($admin_user_location)){
            return $admin_user_location;
        }else {
            return false;
        }
    }

}

?>
