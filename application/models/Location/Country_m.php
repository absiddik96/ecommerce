<?php

class Country_m extends MY_Model
{
    protected $_table_name = 'country';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_country()
    {
        $this->data = [
            'country_name' => $this->input->post('country_name')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_country($country_id = null)
    {
        $this->data = [
            'country_name' => $this->input->post('country_name')
        ];

        if ($this->save($this->data,$country_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
