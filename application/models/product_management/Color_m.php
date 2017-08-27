<?php

class Color_m extends MY_Model
{
    protected $_table_name = 'colors';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_color()
    {
        $this->data = [
            'color_title' => $this->input->post('color_title')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_color($color_id = null)
    {
        $this->data = [
            'color_title' => $this->input->post('color_title')
        ];

        if ($this->save($this->data,$color_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
