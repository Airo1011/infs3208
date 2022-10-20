<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajax extends CI_Controller {
    private $limit = 4;
    public function fatch()
    {
		$this->load->model('file_model'); // load file_model 
        $output = '';
        $query = '';
        if($this->input->get('query')){ 
            $query = $this->input->get('query'); // get search query send from ajax search form  
            $this->limit += 4;
        }
        $data = $this->file_model->fetch_data($query,$this->limit); //send query to file_model and put result to $data
            if(!$data == null){
                echo json_encode ($data->result()); //send result back
            }else{
                echo  ""; // no result found
            }
    }   
    public function fetch_vid()
    {
		$this->load->model('file_model'); // load file_model 
        $output = '';
        $query = '';
        
        if($this->input->get('query')){ 
            $query = $this->input->get('query'); // get search query send from ajax search form
        }
        $data = $this->file_model->fetch_video($query); //send query to file_model and put result to $data
            if(!$data == null){
                echo json_encode ($data->result()); //send result back
            }else{
                echo  ""; // no result found
            }
    }
    public function fetch_user()
    {
		$this->load->model('user_model'); // load file_model 
        $output = '';
        $query = '';
        
        if($this->input->get('query')){ 
            $query = $this->input->get('query'); // get search query send from ajax search form
        }
        $data = $this->user_model->find_user($query); //send query to file_model and put result to $data
            if(!$data == null){
                echo json_encode ($data->result()); //send result back
            }else{
                echo  ""; // no result found
            }
    }
    public function fetch_comments()
    {
		$this->load->model('file_model'); // load file_model 
        $output = '';
        $query = 10;
        
        if($this->input->get('query')){ 
            $query = $this->input->get('query'); // get search query send from ajax search form
        }
        $data = $this->file_model->fetch_comments($query); //send query to file_model and put result to $data
            if(!$data == null){
                echo json_encode ($data->result()); //send result back
            }else{
                echo "" ; // no result found
            }
    }
}
?>