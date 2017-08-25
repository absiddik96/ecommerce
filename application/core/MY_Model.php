<?php

class MY_Model extends CI_Model
{
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_order_by = '';
    protected $_timestamps = TRUE;

    function __construct(){
        parent::__construct();
    }

    public function get($id = null, $single = false){
        if($id !== null){
            $method = 'row';
            $this->db->where($this->_primary_key,$id);
        }else if ($single == true){
            $method = 'row';
        }else{
            $method = 'result';
        }
        $this->db->order_by($this->_order_by);
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($data = null, $single = false){
        $this->db->where($data);
        return $this->get(null,$single);
    }

    public function save($data, $id = null){
        //......set timestamps
        if($this->_timestamps == true){
            $now = date('Y-m-d H:i:s');
            $id || $data['created_at'] = $now;
            $data['modified_at'] = $now;
        }

        //........insert
        if($id === null){
            $this->db->set($data);
            $result = $this->db->insert($this->_table_name);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        //........update
        else{
            $this->db->set($data);
            $this->db->where($this->_primary_key,$id);
            $result = $this->db->update($this->_table_name);
            if($result){
                return $id;
            }else{
                return false;
            }
        }

    }

    public function delete($id){
        if(!$id){
            return false;
        }

        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $result = $this->db->delete($this->_table_name);
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
}

?>
