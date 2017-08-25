<?php

class village_moholla_m extends MY_Model
{
    protected $_table_name = 'village_mohollas';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_village_moholla()
    {
        $this->data = [
            'country_id'           => $this->input->post('country'),
            'division_state_id'    => $this->input->post('division_state'),
            'district_city_id'     => $this->input->post('district_city'),
            'upazila_ps_id'        => $this->input->post('upazila_ps'),
            'union_word_id'        => $this->input->post('union_word'),
            'village_moholla_name' => $this->input->post('village_moholla_name'),
            'village_moholla_code' => $this->input->post('country').$this->input->post('division_state').$this->input->post('district_city').$this->input->post('upazila_ps').$this->input->post('union_word')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_village_moholla()
    {
        $this->db->select('village_mohollas.id,village_mohollas.village_moholla_name,village_mohollas.village_moholla_code,union_words.union_word_name,country.country_name,division_state.division_state_name,district_city.district_city_name,upazila_ps.upazila_ps_name');
        $this->db->join('country', 'village_mohollas.country_id=country.id');
        $this->db->join('division_state', 'village_mohollas.division_state_id = division_state.id');
        $this->db->join('district_city',  'district_city.id = village_mohollas.district_city_id');
        $this->db->join('upazila_ps', 'village_mohollas.upazila_ps_id = upazila_ps.id');
        $this->db->join('union_words', 'village_mohollas.union_word_id = union_words.id');
        $this->db->order_by("village_mohollas.village_moholla_name", "asc");
        $village_mohollas = $this->get();
        if(count($village_mohollas)){
            return $village_mohollas;
        }else {
            return FALSE;
        }
    }

    public function update_village_moholla($village_moholla_id = null)
    {
        $this->data = [
            'village_moholla_name' => $this->input->post('village_moholla_name')
        ];

        if ($this->save($this->data,$village_moholla_id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_village_moholla_by_union_word_id($union_word_id) {
        $this->db->where('union_word_id', $union_word_id);
        $this->db->order_by("village_moholla_name", "asc");
        $village_mohollas = $this->get();
        if(count($village_mohollas)){
            return $village_mohollas;
        }else {
            return FALSE;
        }
    }

}

?>
