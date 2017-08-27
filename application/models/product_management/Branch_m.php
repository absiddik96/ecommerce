<?php

class Branch_m extends MY_Model
{
    protected $_table_name = 'branchs';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_branch()
    {
        $this->data = [
            'country_id'         => $this->input->post('country'),
            'division_state_id'  => $this->input->post('division_state'),
            'district_city_id'   => $this->input->post('district_city'),
            'upazila_ps_id'      => $this->input->post('upazila_ps'),
            'union_word_id'      => $this->input->post('union_word'),
            'village_moholla_id' => $this->input->post('village_moholla'),
            'branch_name'        => $this->input->post('branch_name')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_branchs()
    {
        $this->db->select('branchs.id,branchs.branch_name,village_mohollas.village_moholla_name,union_words.union_word_name,country.country_name,division_state.division_state_name,district_city.district_city_name,upazila_ps.upazila_ps_name');
        $this->db->join('country', 'branchs.country_id=country.id');
        $this->db->join('division_state', 'branchs.division_state_id = division_state.id');
        $this->db->join('district_city',  'district_city.id = branchs.district_city_id');
        $this->db->join('upazila_ps', 'branchs.upazila_ps_id = upazila_ps.id');
        $this->db->join('union_words', 'branchs.union_word_id = union_words.id');
        $this->db->join('village_mohollas', 'branchs.village_moholla_id = village_mohollas.id');
        $this->db->order_by("branchs.branch_name", "asc");
        $village_mohollas = $this->get();
        if(count($village_mohollas)){
            return $village_mohollas;
        }else {
            return FALSE;
        }
    }


    public function update_branch($branch_id = null)
    {
        $this->data = [
            'branch_name' => $this->input->post('branch_name')
        ];

        if ($this->save($this->data,$branch_id)) {
            return true;
        }else{
            return false;
        }
    }


}

?>
