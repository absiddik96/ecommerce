<?php

class Union_word_m extends MY_Model
{
    protected $_table_name = 'union_words';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_union_word()
    {
        $this->data = [
            'country_id' => $this->input->post('country'),
            'division_state_id' => $this->input->post('division_state'),
            'district_city_id' => $this->input->post('district_city'),
            'upazila_ps_id' => $this->input->post('upazila_ps'),
            'union_word_name' => $this->input->post('union_word_name'),
            'union_word_code' => $this->input->post('country').$this->input->post('division_state').$this->input->post('district_city').$this->input->post('upazila_ps')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_union_word()
    {
        $this->db->select('union_words.id,union_words.union_word_name,union_words.union_word_code,country.country_name,division_state.division_state_name,district_city.district_city_name,upazila_ps.upazila_ps_name');
        $this->db->join('country', 'union_words.country_id=country.id');
        $this->db->join('division_state', 'union_words.division_state_id = division_state.id');
        $this->db->join('district_city',  'district_city.id = union_words.district_city_id');
        $this->db->join('upazila_ps', 'union_words.upazila_ps_id = upazila_ps.id');
        $this->db->order_by("union_words.union_word_name", "asc");
        $union_words = $this->get();
        if(count($union_words)){
            return $union_words;
        }else {
            return FALSE;
        }
    }

    public function update_union_word($union_word_id = null)
    {
        $this->data = [
            'union_word_name' => $this->input->post('union_word_name')
        ];

        if ($this->save($this->data,$union_word_id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_union_word_by_upazila_ps_id($upazila_ps_id) {
        $this->db->where('upazila_ps_id', $upazila_ps_id);
        $this->db->order_by("union_word_name", "asc");
        $union_words = $this->get();
        if(count($union_words)){
            return $union_words;
        }else {
            return FALSE;
        }
    }

}

?>
