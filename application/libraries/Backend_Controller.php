<?php

class Backend_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('auth/auth_m');
        //$this->data['site_name'] = config_item('site_name');

        //......checking user login or not
        $exception_uris = ['login','logout'];
        if (in_array(uri_string(),$exception_uris) == false) {
            if($this->auth_m->loggedin() == false){
                redirect('home');
            }
        }
    }
}

?>
