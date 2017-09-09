<?php

class Admin_user_m extends MY_Model
{
    protected $_table_name = 'users_admin';
    protected $_primary_key = 'user_id';

    function __construct()
    {
        parent::__construct();
        $this->load->model('role/role_m');
    }

    //.........create admin
    public function create_admin_user()
    {
        $data = [
            'user_id' => rand(2000,2999).time(),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            //..........encripting password
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT, ['cost'=>10]),
            'role' => $this->input->post('user_role'),
            'status' => $this->input->post('status'),
        ];

        if ($this->save($data)) {
            return $data['user_id'];
        }else{
            return false;
        }
    }

    public function users_admins_list($role_id)
    {
        $this->db->where_not_in('user_id',$this->session->userdata('user_id'));
        $this->db->where('role',$role_id);

        $users_admins = $this->get();
        if(count($users_admins)){
            return $users_admins;
        }else {
            return FALSE;
        }
    }

    //........admin login
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

    //.......geting user role
    public function user_role()
    {
        return (int) $this->session->userdata('role');
    }


    public function is_super_admin()
    {
        return (bool) $this->role_permission('Super_Admin');
    }
    public function is_admin()
    {
        return (bool) $this->role_permission('Admin');
    }

    private function role_permission($role_name){
        $role_id = $this->user_role();
        $role = $this->role_m->get($role_id,true);
        if(count($role)){
            if ($role->name == $role_name) {
                return true;
            }
        }
        return false;
    }

}

?>
