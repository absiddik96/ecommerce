<?php

class E_wallet_type_m extends MY_Model
{
    protected $_table_name = 'ewallets';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_ewallet()
    {
        $this->data = [
            'ewallet_name' => $this->input->post('ewallet_name')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_ewallet($e_wallet_id = null)
    {
        $this->data = [
            'ewallet_name' => $this->input->post('ewallet_name')
        ];

        if ($this->save($this->data,$e_wallet_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
