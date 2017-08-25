<?php

class Sub_category_m extends MY_Model
{
    protected $_table_name = 'sub_categorys';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }


    public function add_sub_category()
    {
        $this->data = [
            'category_id' => $this->input->post('category'),
            'sub_category_title' => $this->input->post('sub_category_title')
        ];

        if ($this->save($this->data)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_sub_category() {
        $this->db->select('sub_categorys.id,sub_categorys.sub_category_title,categorys.category_title');
        $this->db->join('categorys', 'sub_categorys.category_id=categorys.id');
        $this->db->order_by("sub_category_title", "asc");
        $sub_categorys = $this->get();
        if(count($sub_categorys)){
            return $sub_categorys;
        }else {
            return FALSE;
        }
    }

    public function update_sub_category($sub_category_id = null)
    {
        $this->data = [
            'sub_category_title' => $this->input->post('sub_category_title')
        ];

        if ($this->save($this->data,$sub_category_id)) {
            return true;
        }else{
            return false;
        }
    }

}

?>
