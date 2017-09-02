<?php

class Role_m extends MY_Model
{
    protected $_table_name = 'roles';
    protected $_primary_key = 'id';
    function __construct()
    {
        parent::__construct();
    }

    public function role_for_admin_staff(){

        $ids = array(1,2);

        $this->db->where_in("id", $ids);
        $roles = $this->get();
        if(count($roles)){
            return $roles;
        }else{
            return FALSE;
        }
    }
}

?>
