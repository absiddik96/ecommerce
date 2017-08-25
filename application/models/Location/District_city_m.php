<?php

class District_city_m extends MY_Model
{
    protected $_table_name = 'district_city';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_district_city()
    {
        $this->data = [
            'country_id' => $this->input->post('country'),
            'division_state_id' => $this->input->post('division_state'),
            'district_city_name' => $this->input->post('district_city_name'),
            'district_city_code' => $this->input->post('country').$this->input->post('division_state')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_district_city()
    {
        $this->db->select('district_city.id,district_city.district_city_code ,district_city.district_city_name,country.country_name,division_state.division_state_name');
        $this->db->join('country', 'district_city.country_id=country.id');
        $this->db->join('division_state', 'district_city.division_state_id = division_state.id');
        $this->db->order_by("district_city.district_city_name", "asc");
        $district_citys = $this->get();
        if(count($district_citys)){
            return $district_citys;
        }else {
            return FALSE;
        }
    }

    public function update_district_city($district_city_id = null)
    {
        $this->data = [
            'district_city_name' => $this->input->post('district_city_name')
        ];

        if ($this->save($this->data,$district_city_id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_district_city_by_division_state_id($division_state_id) {
        $this->db->where('division_state_id', $division_state_id);
        $this->db->order_by("district_city_name", "asc");
        $district_citys = $this->get();
        if(count($district_citys)){
            return $district_citys;
        }else {
            return FALSE;
        }
    }

}

?>
