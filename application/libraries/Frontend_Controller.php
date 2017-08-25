<?php

class Frontend_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        //   $this->load->model('public/blog_m');

        $this->data['site_name'] = config_item('site_name');
    }
}

?>
