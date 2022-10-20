<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
	public function index()
	{
		$this-> load->view('template/header');
		$this->load->library('encryption');
		
		$usernameErr = $passwordErr = $fnameErr = $lnameErr = $emailErr= $ansErr= $questErr= "";
		$username = $password = $fname = $lname = $email = $quest = $ans = "";
		$registered = 0;
	
		$username = $this->input->post('username');
		$password = $this->input->post('password');//password_hash($this->input->post('password'),PASSWORD_DEFAULT);
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('emailaddress');
		$ans = $this->input->post('ans');
		$quest = $this->input->post('quest');
		$this->load->model('user_model');

		if (empty($username)) {
			$usernameErr = "Username is required";
		  } else {
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-'0-9 ]*$/",$username)) {
			  $usernameErr = "Only Letters, Numbers and White Spaces allowed";
			}
			if($this->user_model->check_user($username)){
				$usernameErr = "Choose Another Username, This is already taken.";
			}
		}
		if (empty($password)) {
			$passwordErr = "Password is required";
		  } else {
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-' ]*$/",$password)) {
			  $passwordErr = "Only letters and white space allowed";
			}
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
			if($this->user_model->check_email($email)){
				$emailErr = "Choose Another Email, This is already being used taken.";
			}
		  }
		
		if (empty($quest)) {
			$questErr = "Question is required";
			} else {
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-'0-9 ]*$/",$quest)) {
				$questErr = "Only Letters, Numbers and White Spaces allowed";
			}
		}
		if (empty($ans)) {
			$ansErr = "Answer is required";
		  } else {
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-'0-9 ]*$/",$ans)) {
			  $ansErr = "Only letters and white space allowed";
			}
		} 

		// echo $username .'<br>'. $password.'<br>'. $fname.'<br>'. $lname.'<br>'. $email;
		$data = array(
			"username" =>  $username,
			"password" => $password,
			"fname" => $fname,
			"lname" =>  $lname,
            "email" => $email,
            "ans" => $ans,
            "quest" => $quest,
			"usernameErr" =>  $usernameErr,
			"passwordErr" => $passwordErr,
			"fnameErr" => $fnameErr,
			"lnameErr" =>  $lnameErr,
            "emailErr" => $emailErr,
            "ansErr" => $ansErr,
			"questErr" => $questErr,
			"registered" =>  0
		);
		if($usernameErr == "" && $passwordErr == "" && $fnameErr == "" && $lnameErr == "" && $emailErr == ""&& $ansErr == "" && $questErr == ""){
			$data = array(
				"username" =>  $username,
				"password" => $password,
				"fname" => $fname,
				"lname" =>  $lname,
				"email" => $email,
				"ans" => $ans,
				"quest" => $quest,
				"usernameErr" =>  $usernameErr,
				"passwordErr" => $passwordErr,
				"fnameErr" => $fnameErr,
				"lnameErr" =>  $lnameErr,
				"emailErr" => $emailErr,
				"ansErr" => $ansErr,
				"questErr" => $questErr,
				"registered" =>  1
			);
			$verificationCode = substr(bin2hex(random_bytes(20)),0);

			$input = array(
				"username" =>  $username,
				"password" => password_hash($password,PASSWORD_DEFAULT),
				"firstname" => $fname,
				"lastname" =>  $lname,
				"emailaddress" => $email,
				"emailverificationcode" => $verificationCode,
				"emailVerified" => 0,
				"identifyingPhrase" => password_hash($ans,PASSWORD_DEFAULT),
				"identifyingQuestion" => $this->encryption->encrypt($quest)
			);
			$this->user_model->insert_user($input);

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
			$this->email->subject('Email Verification Test');

			$message = '<p>Click the link to verify your account. If you did not make this request, please ignore this email.</p>';
			$message .= '<p>Your verification link: </br>';
			$message .= '<a href="' . base_url() . 'register/verify/'.$verificationCode.'">' . base_url() . 'register/verify/'.$verificationCode.'</a></p>';
			$this->email->message($message);
			$this->email->send();
		}
		$this-> load->view('register',$data);
	}
	public function verify($page_num1 = NULL)
	{
		$ednum = $this->uri->segment(3);
		// echo $ednum;
		$this->load->view('template/header');

		$this->load->model('user_model');
		if ($this->user_model->check_verificationcode($ednum)){		
			$this->user_model->verify_user($ednum);
			$data = array(
				"title" => 'Email Verification Successful',
				"message" => '<p>Thank you for Verifying your Email. Please continue to Login and Explore this website further. <a href ='.base_url().'/login> Login</a>.</p>'
			);
		} else {
			$data = array(
				"title" => 'Email Verification Failed',
				"message" => '<p>Please Register Again, or retry the link later. <a href ='.base_url().'/register> Register</a>.</p>'
			);		
		}

		$this->load->view('template/message',$data);
		
	}
	public function forgot_password($page_num1 = NULL)
	{
		$this->load->view('template/header');
		$this->load->model('user_model');
		$this->load->library('encryption');
		$change_password = 0;
		$password = '';
		$passwordErr = '';

		$ednum = $this->uri->segment(3);

		


		if($this->user_model->check_passwordcode($ednum) && $change_password!=2){
			$details =  $this->user_model->find_passcode_user($ednum);
			$q = $details[0]['identifyingQuestion'];
			$a = $details[0]['identifyingPhrase'];
			$quest = $this->encryption->decrypt($q);
			// echo $quest;
			$ans = '';
			$ansErr = '';
			
			$ans = $this->input->post('ans');
			if (empty($ans)) {
				$ansErr = "Answer is required";
			  } else {
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z-'0-9 ]*$/",$ans)) {
				  $ansErr = "Only letters and white space allowed";
				}
			} 
			// echo '<br>'.$ans.'<br>'.$a.'<br>'.password_verify($ans,$a);
			if(password_verify($ans,$a)){
				// echo 'Lol,so true';
				$change_password = 1;
				redirect('register/insert_password/'.$ednum);
			}
			
			
			
			$data = array(
				'id'=> $ednum,
				'question' => $quest,
				'reset' => '',
				'ansErr' => $ansErr
			);
			

		}else{

			$email = $emailErr = '';
			$email = $this->input->post('emailaddress');
			if (empty($email)) {
				$emailErr = "Email is required";
			} else {
				// check if e-mail address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				}
			}
			$email_message = '';
			if ($emailErr == NULL){
				$email_message = '<p>If '.$email.' is associated with an account then they shall recieve a link to change password.</p>';
			}


			if($this->user_model->check_email($email)){
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
				$verificationCode = substr(bin2hex(random_bytes(20)),0);

				$user = $this->user_model->find_email_user($email);
				$this->user_model->insert_passwordcode($verificationCode,$email);

				$this->email->initialize($config);
				$this->email->from(get_current_user().'@student.uq.edu.au',get_current_user());
				$this->email->to($email);
				$this->email->subject('Password Change Test');

				$message = '<p>Click the link to change your password. If you did not make this request, please ignore this email.</p>';
				$message .= '<p>Your Password Change link for '.$user[0]['username'].': </br>';
				$message .= '<a href="' . base_url() . 'register/forgot_password/'.$verificationCode.'">' . base_url() . 'register/forgot_password/'.$verificationCode.'</a></p>';
				$this->email->message($message);
				$this->email->send();
			}

			$reset_message = '<div class="container">
										<div class="col-4 offset-4">
										'. form_open_multipart("register/forgot_password") .'
												<h2 class="text-center">Forgot Email</h2>       
												<div class="form-group">
													<h5 type = text>Enter Active Email Address:</h5>
													<input type="text" class="form-control" placeholder="Email Address" name="emailaddress">
													<span class="error">*'. $emailErr.'</span>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
												</div>   
												'. form_close().'
												'.$email_message.'
									</div>
								</div>'	;
			$data = array(
				'reset' => $reset_message
			);
		}
		


		$data['change_password'] = $change_password;
		$this->load->view('forgot_password',$data);
		
	}
	public function insert_password($page_num1 = NULL)
	{
		$this->load->view('template/header');
		$this->load->model('user_model');
		$this->load->library('encryption');
		$change_password = 1;
		$password = '';
		$passwordErr = '';

		$ednum = $this->uri->segment(3);

		if($change_password == 1){
			
			$user_detail =  $this->user_model->find_passcode_user($ednum);
			$username = $user_detail[0]['username'];

			$password = $this->input->post('password');

			// echo '<br>text:'.$password;
			if (empty($password)) {
				$passwordErr = "Password is required";
			  } else {
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z-' ]*$/",$password)) {
				  $passwordErr = "Only letters and white space allowed";
				}
			}
			if($passwordErr==''){
				$this->user_model->insert_password(password_hash($password,PASSWORD_DEFAULT),$username);
				// echo '<br>Query:'.$query;
				// $test =  $this->user_model->find_passcode_user($ednum);
				// echo '<br>Username:'.$test[0]['username'];
				// echo '<br>Password:'.$test[0]['password'];
				// echo '<br>Compare:'.password_verify($password,$test[0]['password']);
				$change_password = 2;
				if($this->user_model->delete_passwordcode($username)){
					// echo '<br> Time to Login in Buckoo';
					redirect('login');
				}


			}
			
		}
		$data = array(
			'passwordErr' => $passwordErr,
			'reset'=> '',
			'change_password'=>$change_password,
			'id'=>$ednum
		);
		$this->load->view('forgot_password',$data);
	}


}
?>
