<?php

class Store_m extends MY_Model
{
    protected $_table_name = 'stores';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_store()
    {
        $this->data = [
            'country_id'         => $this->input->post('country'),
            'division_state_id'  => $this->input->post('division_state'),
            'district_city_id'   => $this->input->post('district_city'),
            'upazila_ps_id'      => $this->input->post('upazila_ps'),
            'union_word_id'      => $this->input->post('union_word'),
            'village_moholla_id' => $this->input->post('village_moholla'),
            'store_name'        => $this->input->post('store_name')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_stores()
    {
        $this->db->select('stores.id,stores.store_name,village_mohollas.village_moholla_name,union_words.union_word_name,country.country_name,division_state.division_state_name,district_city.district_city_name,upazila_ps.upazila_ps_name');
        $this->db->join('country', 'stores.country_id=country.id');
        $this->db->join('division_state', 'stores.division_state_id = division_state.id','left');
        $this->db->join('district_city',  'district_city.id = stores.district_city_id','left');
        $this->db->join('upazila_ps', 'stores.upazila_ps_id = upazila_ps.id','left');
        $this->db->join('union_words', 'stores.union_word_id = union_words.id','left');
        $this->db->join('village_mohollas', 'stores.village_moholla_id = village_mohollas.id','left');
        $this->db->order_by("stores.store_name", "asc");
        $village_mohollas = $this->get();
        if(count($village_mohollas)){
            return $village_mohollas;
        }else {
            return FALSE;
        }
    }

    public function get_stores_by_working_id($working_id='')
    {
        $store = $this->store_m->get($working_id,true);

        if ($store->country_id) {
            $data['country_id'] = $store->country_id;
        }
        if ($store->division_state_id) {
            $data['division_state_id'] = $store->division_state_id;
        }
        if ( $store->district_city_id) {
            $data['district_city_id'] = $store->district_city_id;
        }
        if ($store->upazila_ps_id) {
            $data['upazila_ps_id'] = $store->upazila_ps_id;
        }
        if ($store->union_word_id) {
            $data['union_word_id'] = $store->union_word_id;
        }
        if ($store->village_moholla_id) {
            $data['village_moholla_id'] = $store->village_moholla_id;
        }

        if ($stores = $this->store_m->get_by($data)) {
            return $stores;
        }else{
            return false;
        }


    }


    public function update_store($store_id = null)
    {
        $this->data = [
            'store_name' => $this->input->post('store_name')
        ];

        if ($this->save($this->data,$store_id)) {
            return true;
        }else{
            return false;
        }
    }


}

?>
