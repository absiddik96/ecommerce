<?php
/**
 *
 */
class TestController extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo $this->session->userdata('user_id');
        // echo $this->admin_user_m->is_super_admin();
    }

    public function test()
    {
        $checkboxes = $this->input->post('id[]');

        foreach ($checkboxes as $checkbox) {
            echo $checkbox;
        }
    }

}

?>
