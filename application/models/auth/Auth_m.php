<?php

class Auth_m extends MY_Model
{
    protected $_table_name = 'users';
    protected $_primary_key = 'user_id';
    function __construct()
    {
        parent::__construct();
    }

    //........global login
    public function login()
    {
        $user = $this->get_by([
            'email' => $this->input->post('email'),
            'status' => 1,
        ],true);

        if (count($user)) {
            if (password_verify($this->input->post('password'),$user->password)) {
                $data = [
                    'user_id' => $user->user_id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'loggedin' => true
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
    public function loggedin()
    {
        return (bool) $this->session->userdata('loggedin');
    }

    public function role()
    {
        return $this->session->userdata('role');
    }

    //............ role chack
    // public function is_(){
    //     //role 1 = ...
    //     if($this->role() == 1){
    //         return true;
    //     }
    //     return false;
    // }

}

?>
