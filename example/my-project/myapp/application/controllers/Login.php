<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function index()
	{
		$data['error']= "";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->view('template/header');
		if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = $this->encryption->decrypt(get_cookie('password')); //get the username from cookie //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array(
						'username' => $username,
						'logged_in' => true 	//create session variable
					);
					$this->session->set_userdata($user_data); //set user status to login in session
					redirect('home'); //if user already logined show main page
					// $this->load->view('library');
				}
			}else{
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			redirect('home'); //if user already logined show main page
			// $this->load->view('library');
		}
		$this->load->view('template/footer');
	}
	public function check_login()
	{
		$this->load->model('user_model');		//load user model
		$this->load->library('encryption');
		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		$username = $this->input->post('username'); //getting username from login form
		$password = $this->input->post('password');//password_hash($this->input->post('password'),PASSWORD_DEFAULT); //getting password from login form
		$remember = $this->input->post('remember'); //getting remember checkbox from login form
		$user = array(
			array(
				"username" => "",
				"password" => ""
			)
		);
		if($this->user_model->check_user($username)){
			// echo json_encode($this->user_model->check_user($username));
			$user = $this->user_model->find_user($username);
		}
		// $hash = '$2y$10$QqIzovdsaQRx7QbiqkrXwuRQlB4Wtt8f71fvoickbBDklyeqhtxjW';
		// echo password_hash($password,PASSWORD_DEFAULT);
		// $test ='';
		// echo $test = 'Hello';
		// $cipher_test = $this->encryption->encrypt($test);
		// echo $cipher_test; 
		// $deciphered_test = $this->encryption->decrypt($cipher_test);
		// echo $deciphered_test;
		
		// So its not actually the Password that will be made into a cookie but email address.
		if(!$this->session->userdata('logged_in')){	//Check if user already login
			if ( password_verify($password,$user[0]['password']))//$this->user_model->login($username, $password) )//check username and password
			{
				$user_data = array(
					'username' => $username,
					'logged_in' => true 	//create session variable
				);
				if($remember) { // if remember me is activated create cookie
					$password_ecrypted = $this->encryption->encrypt($user[0]['emailaddress']);
					set_cookie("username", $username, '300'); //set cookie username
					set_cookie("password", $password_ecrypted, '300'); //set cookie password
					set_cookie("remember", $remember, '300'); //set cookie remember
				}	
				$this->session->set_userdata($user_data); //set user status to login in session
				redirect('login'); // direct user home page
			}else
			{
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			{
				redirect('login'); //if user already logined direct user to home page
			}
		$this->load->view('template/footer');
		}
	}
	public function logout()
	{
		$this->load->helper('cookie');
		delete_cookie("username");
		delete_cookie("password");
		delete_cookie("remember");
		
		$this->session->unset_userdata('logged_in'); //delete login status
		$this->session->unset_userdata('username'); 
		redirect('login'); // redirect user back to login
	}
}
?>
