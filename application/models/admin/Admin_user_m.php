<?php

class Admin_user_m extends MY_Model
{
    protected $_table_name = 'users_admin';
    protected $_primary_key = 'user_id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function create_admin($is_admin = null)
    {
        $data = [
            'user_id' => rand(2000,2999).time(),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            //..........encripting password
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT, ['cost'=>10]),
            'status' => $this->input->post('status'),
        ];

        if ($this->save($data)) {
            return true;
        }else{
            return false;
        }
    }


    public function admin_list()
    {

        $this->db->where_not_in('user_id',$this->session->userdata('user_id'));
        $admins = $this->get();
        if(count($admins)){
            return $admins;
        }else {
            return FALSE;
        }
    }

    //........admin login
    public function login()
    {
        $user = $this->get_by([
            'email' => $this->input->post('email'),
            'is_admin' => 1,
            'status' => 1,
        ],true);

        if (count($user)) {
            if (password_verify($this->input->post('password'),$user->password)) {
                $data = [
                    'user_id' => $user->user_id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'is_admin' => $user->is_admin,
                    'admin_loggedin' => true
                ];
                $this->session->set_userdata($data);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    //........global logout
    public function logout($value='')
    {
        $this->session->sess_destroy();
    }

    //........checking user is loggedin or not
    public function admin_loggedin()
    {
        return (bool) $this->session->userdata('admin_loggedin');
    }


}

?>
