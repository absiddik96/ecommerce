<?php

class Admin_user_category_m extends MY_Model
{
    protected $_table_name = 'user_categorys';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_user_category()
    {
        $this->data = [
            'category_title' => $this->input->post('user_category_title')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_user_category($category_id = null)
    {
        $this->data = [
            'category_title' => $this->input->post('user_category_title')
        ];

        if ($this->save($this->data,$category_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
