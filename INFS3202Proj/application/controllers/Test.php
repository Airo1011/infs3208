<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('test');
    }
    public function fetch_user(){
		$this->load->model('user_model');
		
	}
}
?>