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
        $this->load->view('test/test_view');
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
