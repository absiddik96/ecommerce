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
            'user_category_id' => $this->input->post('user_category'),
            'user_type_id'     => $this->input->post('user_type'),
            'sub_type_title'   => $this->input->post('user_sub_type_title')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_user_sub_types()
    {
        $this->db->select('user_sub_types.id,user_sub_types.sub_type_title,user_types.type_title ,user_categorys.category_title');
        $this->db->join('user_categorys', 'user_sub_types.user_category_id=user_categorys.id');
        $this->db->join('user_types', 'user_sub_types.user_type_id=user_types.id');
        $this->db->order_by("user_sub_types.sub_type_title", "asc");
        $user_sub_types = $this->get();
        if(count($user_sub_types)){
            return $user_sub_types;
        }else {
            return FALSE;
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

    public function get_user_sub_type_by_user_type_id($user_type_id) {
        $this->db->where('user_type_id', $user_type_id);
        $this->db->order_by("sub_type_title", "asc");
        $user_sub_types = $this->get();
        if(count($user_sub_types)){
            return $user_sub_types;
        }else {
            return FALSE;
        }
    }

}

?>
