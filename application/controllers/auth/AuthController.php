<?php

class AuthController extends Backend_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //........login user
    public function login()
    {
        $this->auth_m->loggedin() == false || redirect('home','refresh');
        //........validation
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[50]');

        if($this->form_validation->run()){
            if ($this->auth_m->login()) {
                //........ call the model function & redirect
                // if($this->auth_m->call_the_model_function()){
                //     redirect('');
                // }else{
                //     echo "do something";
                // }

            }else{
                $this->session->set_flashdata('errors', "The email or password you entered is invalid");
                redirect('home');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors());
            redirect('home');
        }

    }

    //........logout
    public function logout()
    {
        $this->auth_m->logout();
        redirect('home');
    }
}

?>
