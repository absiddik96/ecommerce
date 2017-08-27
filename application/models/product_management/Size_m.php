<?php

class Size_m extends MY_Model
{
    protected $_table_name = 'sizes';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_size()
    {
        $this->data = [
            'size_title' => $this->input->post('size_title')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_size($size_id = null)
    {
        $this->data = [
            'size_title' => $this->input->post('size_title')
        ];

        if ($this->save($this->data,$size_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
