<?php

class Admin_user_type_m extends MY_Model
{
    protected $_table_name = 'user_types';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_user_type()
    {
        $this->data = [
            'user_category_id' => $this->input->post('user_category'),
            'type_title' => $this->input->post('user_type_title')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_user_types()
    {
        $this->db->select('user_types.id,user_types.type_title ,user_categorys.category_title');
        $this->db->join('user_categorys', 'user_types.user_category_id=user_categorys.id');
        $this->db->order_by("user_types.type_title", "asc");
        $user_types = $this->get();
        if(count($user_types)){
            return $user_types;
        }else {
            return FALSE;
        }
    }

    public function update_user_type($type_id = null)
    {
        $this->data = [
            'type_title' => $this->input->post('user_type_title')
        ];

        if ($this->save($this->data,$type_id)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_user_type_by_user_category_id($user_category_id) {
        $this->db->where('user_category_id', $user_category_id);
        $this->db->order_by("type_title", "asc");
        $user_types = $this->get();
        if(count($user_types)){
            return $user_types;
        }else {
            return FALSE;
        }
    }

}

?>
