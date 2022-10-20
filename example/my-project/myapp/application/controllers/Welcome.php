<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
//References
//Automatic Logout:https://stackoverflow.com/questions/572938/force-logout-users-if-users-are-inactive-for-a-certain-period-of-time
//Continous Load: https://www.webslesson.info/2018/08/codeigniter-load-more-data-on-page-scroll-using-ajax.html
//Dropzone: https://www.codexworld.com/codeigniter-drag-and-drop-file-upload-with-dropzone/

//Milestone 2 Completed:
// Remember Me (2 Points): Cookie Creation and Destruction -> Login.php
//Continuously loading data when scrolling (2 Points) -> library.php and Home.php
//File Uploading, Multiple Files and Drag and Drop (Total 6 points) -> Upload.php, file.php
// Websecurity (Password Hashing and Data Sanitisation) (Total 4 Points) -> File_Model.php and Login.php
//Search Function = Auto Complete?

// Milestone 3 Completed:
//Commenting (+1 Anonymous As Well) (Total 3 Points)
// Email Verification (3 points)
//Forgot Password (3 points)
// Watchlist (3 points)
// Likes (2 points)
// Anonymous Posting (2 Points)
// Update User Details (2 Points)
// Total 18 Points Functionality + 1 Point CSS