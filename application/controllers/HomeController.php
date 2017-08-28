<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends Frontend_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		// $this->data['content'] = 'public/home';
		$this->data['action'] = 'admin/login';
		$this->load->view('login/login',$this->data);
	}

}
