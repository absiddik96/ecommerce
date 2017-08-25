<?php

class Division_state_m extends MY_Model
{
    protected $_table_name = 'division_state';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_division_state()
    {
        $this->data = [
            'country_id' => $this->input->post('country_id'),
            'division_state_name' => $this->input->post('division_state_name')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_division_state()
    {
        $this->db->select('division_state.id,division_state.division_state_name,country.country_name');
        $this->db->join('country', 'division_state.country_id=country.id');
        $this->db->order_by("division_state.division_state_name", "asc");
        $division_states = $this->get();
        if(count($division_states)){
            return $division_states;
        }else {
            return FALSE;
        }
    }

    public function update_division_state($division_state_id = null)
    {
        $this->data = [
            'division_state_name' => $this->input->post('division_state_name')
        ];

        if ($this->save($this->data,$division_state_id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_division_state_by_country_id($country_id) {
        $this->db->where('country_id', $country_id);
        $this->db->order_by("division_state_name", "asc");
        $division_states = $this->get();
        if(count($division_states)){
            return $division_states;
        }else {
            return FALSE;
        }
    }

}

?>
