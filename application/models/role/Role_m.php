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

        $names = array("Admin","Super_Admin");

        $this->db->where_in("name", $names);
        $roles = $this->get();
        if(count($roles)){
            return $roles;
        }else{
            return FALSE;
        }
    }

    public function role_for_supplier_buyer(){

        $names = array("Supplier","Buyer");

        $this->db->where_in("name", $names);
        $roles = $this->get();
        if(count($roles)){
            return $roles;
        }else{
            return FALSE;
        }
    }


    public function get_role_by_role_name($role_name){
        $role = $this->get_by([
            'name' => $role_name,
        ],true);
        if(count($role)){
            return $role;
        }else{
            return FALSE;
        }
    }
}

?>
