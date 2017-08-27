<?php

class AdminDashController extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('admin/layouts/_layouts_main');
    }
}
