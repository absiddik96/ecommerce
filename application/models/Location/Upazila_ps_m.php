<?php

class Upazila_ps_m extends MY_Model
{
    protected $_table_name = 'upazila_ps';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_upazila_ps()
    {
        $this->data = [
            'country_id' => $this->input->post('country'),
            'division_state_id' => $this->input->post('division_state'),
            'district_city_id' => $this->input->post('district_city'),
            'upazila_ps_name' => $this->input->post('upazila_ps_name'),
            'upazila_ps_code' => $this->input->post('country').$this->input->post('division_state').$this->input->post('district_city')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_upazila_ps()
    {
        $this->db->select('upazila_ps.id,upazila_ps.upazila_ps_name,upazila_ps.upazila_ps_code,country.country_name,division_state.division_state_name,district_city.district_city_name');
        $this->db->join('country', 'upazila_ps.country_id=country.id');
        $this->db->join('division_state', 'upazila_ps.division_state_id = division_state.id');
        $this->db->join('district_city',  'district_city.id = upazila_ps.district_city_id');
        $this->db->order_by("upazila_ps.upazila_ps_name", "asc");
        $upazila_pss = $this->get();
        if(count($upazila_pss)){
            return $upazila_pss;
        }else {
            return FALSE;
        }
    }

    public function update_upazila_ps($upazila_ps_id = null)
    {
        $this->data = [
            'upazila_ps_name' => $this->input->post('upazila_ps_name')
        ];

        if ($this->save($this->data,$upazila_ps_id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_upazila_ps_by_district_city_id($district_city_id) {
        $this->db->where('district_city_id', $district_city_id);
        $this->db->order_by("upazila_ps_name", "asc");

        $upazila_pss = $this->get();
        if(count($upazila_pss)){
            return $upazila_pss;
        }else {
            return FALSE;
        }
    }

}

?>
