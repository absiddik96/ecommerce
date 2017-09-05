<?php

class Admin_user_sub_type_m extends MY_Model
{
    protected $_table_name = 'user_sub_types';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_user_sub_type()
    {
        $this->data = [
            'sub_type_title' => $this->input->post('user_sub_type_title')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_user_sub_type($sub_type_id = null)
    {
        $this->data = [
            'sub_type_title' => $this->input->post('user_sub_type_title')
        ];

        if ($this->save($this->data,$sub_type_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
