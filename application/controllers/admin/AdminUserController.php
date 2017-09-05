<?php

class AdminUserController extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    //................ADMIN USER AREA.........
    //.........create admin
    public function create_admin()
    {
        //.........validation
        $this->form_validation->set_rules('name','Name','required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users_admin.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('division_state', 'Division / Province / State', 'trim|required');
        $this->form_validation->set_rules('district_city', 'District / City', 'trim|required');
        $this->form_validation->set_rules('upazila_ps', 'Upazila / Police Station', 'trim|required');
        $this->form_validation->set_rules('union_word', 'Union / Word', 'trim|required');
        $this->form_validation->set_rules('village_moholla', 'Village / Moholla', 'trim|required');
        $this->form_validation->set_rules('role','User Role','required|min[1]|max[1]|numeric');
        $this->form_validation->set_rules('status','Status','required|max_length[1]|numeric');

        if($this->form_validation->run()){
            $user_id = $this->admin_user_m->create_admin();
            if($user_id){
                if($this->admin_user_location_m->create_admin_location($user_id)){
                    $this->session->set_flashdata('message','Admin / Staff create successfull.');
                }else{
                    $this->session->set_flashdata('message','Admin / Staff create fail!!!');
                }
            }else{
                $this->session->set_flashdata('message','Admin / Staff create fail!!!');
            }

        }
        $this->data['countries'] = $this->country_m->get();
        $this->data['roles']     = $this->role_m->role_for_admin_staff();
        $this->data['content']   = 'admin/user/admin/create';
        $this->load->view('admin/layouts/_layouts_main',$this->data);


    }

    //........login admin
    public function login()
    {
        $this->admin_user_m->admin_loggedin() == false || redirect('home','refresh');
        //........validation
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[50]');

        if($this->form_validation->run()){
            if ($this->admin_user_m->login()) {
                //.........checking user role
                //........all layouts section gose here
                if ($this->admin_user_m->is_super_admin()) {
                    redirect('admin/dash','refresh');
                }elseif ($this->admin_user_m->is_admin()) {
                    redirect('admin/dash','refresh');
                }else{
                    echo "you are nothing";
                }

                //redirect('admin/dash','refresh');
            }else{
                echo "You are not Authorized";
            }
        }
        $this->data['action'] = "admin/login";
        $this->load->view('login/login',$this->data);
    }

    //........admin logout
    public function logout()
    {
        $this->admin_user_m->logout();
        redirect('admin/login','refresh');
    }

    public function admin_list()
    {
        //....get all admins
        $this->data['admins'] = $this->admin_user_m->admin_list();
        $this->data['content'] = 'admin/user/admin/view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function admin_active($user_id=0)
    {
        $admin = $this->admin_user_m->get($user_id,true);
        if (count($admin)) {
            $data = ['status' => 1];
            $this->admin_user_m->save($data,$user_id);
        }

        redirect('admin/adminList','refresh');
    }

    public function admin_deactive($user_id=0)
    {
        $admin = $this->admin_user_m->get($user_id,true);
        if (count($admin)) {
            $data = ['status' => 0];
            $this->admin_user_m->save($data,$user_id);
        }

        redirect('admin/adminList','refresh');
    }

    public function admin_delete($user_id=0)
    {
        $admin = $this->admin_user_m->get($user_id,true);
        if (count($admin)) {
            if ($this->admin_user_m->delete($user_id)) {
                $this->session->set_flashdata('message','Admin / Staff delete successfull.');
            }else{
                $this->session->set_flashdata('message','Admin / Staff delete fail !!!');
            }
        }

        redirect('admin/adminList','refresh');
    }
    //................NORMAL USER AREA..............
    //.........create user
    public function create_user()
    {
        //.........validation
        $this->form_validation->set_rules('name','Name','required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users_admin.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
        $this->form_validation->set_rules('role','User Role','required|min[1]|max[1]|numeric');
        $this->form_validation->set_rules('status','Status','required|max_length[1]|numeric');

        if($this->form_validation->run()){
            if($this->global_user_m->create_user()){
                $this->session->set_flashdata('message','User create successfull.');
            }else{
                $this->session->set_flashdata('message','User create fail!!!');
            }
        }

        $this->data['content'] = 'admin/user/global_user/create';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function user_list()
    {
        //....get all users
        $this->data['users'] = $this->global_user_m->get();
        $this->data['content'] = 'admin/user/global_user/view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function user_active($user_id=0)
    {
        $user = $this->global_user_m->get($user_id,true);
        if (count($user)) {
            $data = ['status' => 1];
            $this->global_user_m->save($data,$user_id);
        }

        redirect('admin/userList','refresh');
    }

    public function user_deactive($user_id=0)
    {
        $user = $this->global_user_m->get($user_id,true);
        if (count($user)) {
            $data = ['status' => 0];
            $this->global_user_m->save($data,$user_id);
        }

        redirect('admin/userList','refresh');
    }

    public function user_delete($user_id=0)
    {
        $user = $this->global_user_m->get($user_id,true);
        if (count($user)) {
            if ($this->global_user_m->delete($user_id)) {
                $this->session->set_flashdata('message','User delete successfull.');
            }else{
                $this->session->set_flashdata('message','User delete fail !!!');
            }
        }

        redirect('admin/userList','refresh');
    }

}

?>
