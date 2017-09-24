<?php

class mobile_bank_type_m extends MY_Model
{
    protected $_table_name = 'mobile_banks';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_mobile_bank()
    {
        $this->data = [
            'mobile_bank_name' => $this->input->post('mobile_bank_name')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_mobile_bank($mobile_bank_id = null)
    {
        $this->data = [
            'mobile_bank_name' => $this->input->post('mobile_bank_name')
        ];

        if ($this->save($this->data,$mobile_bank_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
