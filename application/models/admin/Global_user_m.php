<?php

class Global_user_m extends MY_Model
{
    protected $_table_name = 'users';
    protected $_primary_key = 'user_id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create global
    public function create_user($is_admin = null)
    {
        $data = [
            'user_id' => rand(2000,2999).time(),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            //..........encripting password
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT, ['cost'=>10]),

            //.....role
            // ... = 1
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status'),
        ];

        if ($this->save($data)) {
            return true;
        }else{
            return false;
        }
    }


}

?>
