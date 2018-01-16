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
        $this->form_validation->set_rules('user_role','User Role','required|numeric');
        $this->form_validation->set_rules('status','Status','required|max_length[1]|numeric');

        if($this->form_validation->run()){
            $user_id = $this->admin_user_m->create_admin_user();
            $this->user_working_zone_m->add_working_zone($user_id);

            if($user_id){
                if($this->admin_user_location_m->create_admin_user_location($user_id)){
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
        $this->data['stores']     = $this->store_m->get();
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

    public function get_role_id_by_role_name($role_name)
    {
        return $this->role_m->get_role_by_role_name($role_name);
    }

    public function super_admin_list()
    {
        //....get all super admins
        $role = $this->get_role_id_by_role_name('Super_Admin');
        $this->data['admins'] = $this->admin_user_m->users_admins_list($role->id);
        $this->data['content'] = 'admin/user/admin/super_admin_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function admin_list()
    {
        //....get all admins
        $role = $this->get_role_id_by_role_name('Admin');
        $this->data['admins'] = $this->admin_user_m->users_admins_list($role->id);
        $this->data['content'] = 'admin/user/admin/admin_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function agent_list()
    {
        //....get all agents
        $role = $this->get_role_id_by_role_name('Agent');
        $this->data['agents'] = $this->admin_user_m->users_admins_list($role->id);
        $this->data['content'] = 'admin/user/agent/agent_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function user_admin_active($user_id=0,$rPath)
    {
        $admin = $this->admin_user_m->get($user_id,true);
        if (count($admin)) {
            $data = ['status' => 1];
            $this->admin_user_m->save($data,$user_id);
        }

        redirect('admin/'.$rPath,'refresh');
    }

    public function user_admin_deactive($user_id=0,$rPath)
    {
        $admin = $this->admin_user_m->get($user_id,true);
        if (count($admin)) {
            $data = ['status' => 0];
            $this->admin_user_m->save($data,$user_id);
        }

        redirect('admin/'.$rPath,'refresh');
    }

    public function user_admin_delete($user_id=0,$rPath)
    {
        $admin = $this->admin_user_m->get($user_id,true);
        if (count($admin)) {
            if ($this->admin_user_m->delete($user_id)) {
                $this->session->set_flashdata('message','Admin / Staff delete successfull.');
            }else{
                $this->session->set_flashdata('message','Admin / Staff delete fail !!!');
            }
        }

        redirect('admin/'.$rPath,'refresh');
    }
    //................NORMAL USER AREA..............
    //.........create user
    public function create_user($role_name = null)
    {
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
        $this->form_validation->set_rules('status','Status','required|max_length[1]|numeric');



        if($this->form_validation->run()){
            $role =  $this->role_m->get_role_by_role_name($role_name);
            $user_id = $this->admin_user_m->create_admin_user($role->id);
            if($user_id){
                if($this->admin_user_location_m->create_admin_user_location($user_id)){
                    if($this->suppliers_n_buyers_details_m->create_suppliers_n_buyers_details($user_id)){
                        $this->session->set_flashdata('message','Supplier / Buyer create successfull.');
                    }else{
                        $this->session->set_flashdata('message','Supplier / Buyer create fail!!!');
                    }
                }else{
                    $this->session->set_flashdata('message','Supplier / Buyer create fail!!!');
                }
            }else{
                $this->session->set_flashdata('message','Supplier / Buyer create fail!!!');
            }

        }
        $this->data['countries']      = $this->country_m->get();
        $this->data['user_categorys'] = $this->admin_user_category_m->get();
        $this->data['role_name']      = $role_name;
        $this->data['content']        = 'admin/user/supplier_buyer/create';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function supplier_list()
    {
        //....get all users
        $role = $this->get_role_id_by_role_name('Supplier');
        $this->data['page_name'] = 'Supplier';
        $this->data['users'] = $this->admin_user_m->users_admins_list($role->id);
        $this->data['content'] = 'admin/user/supplier_buyer/supplier_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function buyer_list()
    {
        //....get all users
        $role = $this->get_role_id_by_role_name('Buyer');
        $this->data['page_name'] = 'Buyer';
        $this->data['users'] = $this->admin_user_m->users_admins_list($role->id);
        $this->data['content'] = 'admin/user/supplier_buyer/buyer_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

}

?>
