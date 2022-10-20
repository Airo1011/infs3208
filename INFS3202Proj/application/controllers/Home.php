<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    private $limit = 4;

    public function index()
    {
        // $this->load->model('file_model');
        // $count = $this->file_model->count();
        // echo $count;
        // $this->load->view('template/header');
        
        // for($i=0;$i<1;$i++){
        //     $query = $this->file_model->fetch_data(0, $this->limit);
        //     // echo json_encode($query);
        //     $data['posts'] = $query->result();
        //     $data['count']=$count;
        //     $this->load->view('thumbnail', $data);
        // }
        $this->load->view('template/header');
        $this->load->view('search');
        $this->load->view('library');
    }
    public function fetch()
    {
     $output = '';
     $this->load->model('file_model');
     $data = $this->file_model->load_data($this->input->post('start'), $this->input->post('limit'));
     if($data->num_rows() > 0)
     {
      foreach($data->result() as $row)
      {
       $likes = $this->file_model->fetch_liked($row->id);
       $output .= '
       <div class="col mb-4 centered">
        <div class="card">
            <div class="card-body">
                <a href="'. base_url().'/video/search/'.$row->id.'">
                    <h4> '.$row->filename.'</h4>
                    <video width="320" height="240"><source  src="'. base_url().'/uploads/'.$row->filename.'" type="video/mp4"></video>
                    </a>
                    <p>Uploaded by '.$row->username.' </p><i>Likes: '.$likes.'</i>
            </div>
        </div>
    </div>
       ';
      }
     }
     echo $output;
    }
    public function add_to_list()
    {
     $output = '';
     $this->load->model('file_model');
     $data = $this->file_model->load_data($this->input->post('start'), $this->input->post('limit'));
     if($data->num_rows() > 0)
     {
      foreach($data->result() as $row)
      {
       $output .= '
       <div class="col mb-4 centered">
        <div class="card">
            <div class="card-body">
                <a href="'. base_url().'/video/search/'.$row->id.'">
                    <h4> '.$row->filename.'</h4>
                    <video width="320" height="240"><source  src="'. base_url().'/uploads/'.$row->filename.'" type="video/mp4"></video>
                    </a>
                    <p>Uploaded by '.$row->username.'</p>
            </div>
        </div>
    </div>
       ';
      }
     }
     echo $output;
    }
}
    //     <div class="post_data">
    //     <h3 class="text-danger">'.$row->id.'</h3>
    //     <p>'.$row->filename.'</p>
    //    </div>