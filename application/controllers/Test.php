<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends My_controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
    }
    
    public function index() {
        $this->load->view('test');
    }
	
}
