<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller
{
    public function index()
    {
		$this->load->view('template/header'); 
		$this->load->helper('form');
    	if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array('username' => $username,'logged_in' => true );
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view('file',array('error' => ' ')); //if user already logined show upload page
				}
			}else{
				$this->load->view('file',array('error' => ' '));
				// redirect('login'); //if user already logined direct user to home page
			}
		}else{ 
			$username = $_SESSION['username'];
			// echo get_cookie('password');
			// password_verify('rasmuslerdorf', $hash);
			// echo password_hash(get_cookie('password'),PASSWORD_DEFAULT);
		$this->load->model('user_model'); // load file_model 
		$this->load->model('file_model');
		$output = '';
		$query = $username;
		
		$fileId =  $this->input->post('fileID');
		$show = $this->input->post('show');
		$fname =  $this->input->post('fname');
		$lname =  $this->input->post('lname');
		$email =  $this->input->post('email');
		$fnameErr = $lnameErr = $emailErr = "";
		
		$user = $this->user_model->find_user($query);

		if($username && $fileId){
			$this->file_model->remove_from_watchlist($username,$fileId);
		}

		if (empty($fname)) {
			$fnameErr = "First Name is required";
		  } else {
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
			  $fnameErr = "Only letters and white space allowed";
			}
		}
		if (!preg_match("/^[a-zA-Z-']*$/",$lname)) {
			$lnameErr = "Only letters and white space allowed";
		}
		if (empty($email)) {
			$emailErr = "Email is required";
		  } else {
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $emailErr = "Invalid email format";
			}
			if($email == $user[0]['emailaddress']){
				$emailErr = "";
			}elseif($this->user_model->check_email($email)){
				$emailErr = "Choose Another Email, This is already being used taken.";
			}else{}
		  }
		// echo $fname .'<br>'.$lname.'<br>'.$email.'<br>'.$fnameErr.'<br>'.$lnameErr.'<br>'.$emailErr.'<br>'.$show;
	
		if (!$fnameErr && !$lnameErr && !$emailErr ){
			$verificationCode = substr(bin2hex(random_bytes(20)),0);

				// "username" =>  $username,
				// "password" => password_hash($password,PASSWORD_DEFAULT),
				// "firstname" => $fname,
				// "lastname" =>  $lname,
				// "emailaddress" => $email,
				// "emailverificationcode" => $verificationCode,
				// "emailVerified" => 0,

			$this->user_model->update_user($fname,$lname,$email,$verificationCode,$username);

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'mailhub.eait.uq.edu.au',
				'smtp_port' => 25,
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE ,
				'mailtype' => 'html',
				'starttls' => true,
				'newline' => "\r\n"
				);
			
			$this->email->initialize($config);
			$this->email->from(get_current_user().'@student.uq.edu.au',get_current_user());
			$this->email->to($email);
			$this->email->subject('Details Updated');

			$message = '<p>Click the link to re-verify your account as you have recently updated your Profile.</p>';
			$message .= '<p> Updated Details <br> First Name: '.$fname.'<br> LastName: '.$lname.'<br> Email Address: '.$email.'</p> ';
			$message .= '<p>Your verification link: </br>';
			$message .= '<a href="' . base_url() . 'register/verify/'.$verificationCode.'">' . base_url() . 'register/verify/'.$verificationCode.'</a></p>';
			$this->email->message($message);
			$this->email->send();

			$show = 0;
		}

		$user = $this->user_model->find_user($query); //send query to file_model and put result to $data
			if(!$user == null){
		        $data = array(
					"username" =>  $user[0]['username'],
					"firstname" => $user[0]['firstname'],
					"lastname" =>  $user[0]['lastname'],
					"emailaddress" => $user[0]['emailaddress'],
					"verificationlink"=>$user[0]['emailverificationcode'],
					"verified" => $user[0]['emailVerified'],
					"watchlist" => $this->file_model->fetch_watchlist($user[0]['username']),
					"show" => $show,
					"fnameErr" => $fnameErr,
					"lnameErr" => $lnameErr,
					"emailErr" => $emailErr,
					"fname" => $fname,
					"lname" => $lname,
					"email" => $email

				);
				$this->load->view('user_profile',$data);
		    }else{
		        $data = array(
					"username" =>  "Anon",
					"firstname" => "Anony",
					"lastname" =>  "Mous",
					"emailaddress" => NULL,
					"verified" => 0,
					"show" => 0
				);
				$this->load->view('user_profile',$data);
		    }
			$this->load->view('file',array('error' => ' ')); //if user already logined show login page
		}
		$this->load->view('template/footer');

		

    }
    // public function do_upload() {
	// 	$this->load->model('file_model');
	// 	ini_set('max_input_time', 7200000);
	// 	ini_set('max_execution_time', 7200000);
    //     $config['upload_path'] = './uploads/';
	// 	$config['allowed_types'] = 'jpg|mp4|mkv';
	// 	$config['max_size'] = 100000000;
	// 	$config['max_width'] = 4000;
	// 	$config['max_height'] = 3000;
	// 	$this->load->library('upload', $config);
	// 	if ( ! $this->upload->do_upload('userfile')) {
    //         $this->load->view('template/header');
    //         $data = array('error' => $this->upload->display_errors());
    //         $this->load->view('file', $data);
    //         $this->load->view('template/footer');
    //     } else {
	// 		$this->file_model->upload($this->upload->data('file_name'), $this->upload->data('full_path'),$this->session->userdata('username'));
    //         $this->load->view('template/header');
    //         $this->load->view('file', array('error' => 'File upload success. <br/>'));
    //         $this->load->view('template/footer');
    //     }
	// }
	function dragDropUpload(){ 
        if(!empty($_FILES)){ 
            // File upload configuration 
            $uploadPath = './uploads/'; 
            $config['upload_path'] = $uploadPath; 
			$config['allowed_types'] = 'mp4|mkv';
			$config['max_size'] = 100000000; 
             
            // Load and initialize upload library 
            $this->load->library('upload', $config); 
			$this->upload->initialize($config);
			$this->load->model('file_model');
             
			// Upload file to the server 
			if($_SESSION['username'] == NULL){
				$anon_user = 'Anon';
			} else{
				$anon_user = $_SESSION['username'];
			}
			

            if($this->upload->do_upload('file')){ 
				$fileData = $this->upload->data();
				$uploadData['filename'] = $fileData['file_name']; 
				$uploadData['path'] = $fileData['full_path']; 
				$uploadData['username'] = $anon_user;
		 
                // Insert files info into the database 
                $insert = $this->file_model->insert($uploadData); 
            } 
        } 
    } 
	
}
