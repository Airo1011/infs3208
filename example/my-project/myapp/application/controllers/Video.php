<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class video extends CI_Controller {
    public function index($page_num1 = NULL)
    {
        $this->load->view('template/header');
    }
    
    public function search($page_num1 = NULL){
        // echo $this->uri->segment(1);
        // echo $this->uri->segment(2);
        // echo $this->uri->segment(3);
        // if($_SESSION['username'] ==NULL){
        //     redirect('login/logout');
        // }
        // echo $_SESSION['username'];
        $ednum = $this->uri->segment(3);

        $this->load->helper('form');

        $this->load->model('file_model'); // load file_model 

        $username =  $_SESSION['username'];
        $fileId =  $ednum;
        $delete = $this->file_model->check_watchlist($username,$fileId);
        $liked = $this->file_model->check_liked($username,$fileId);
        $likes = $this->file_model->fetch_liked($fileId);
        $remove = $this->input->post('remove');
        $like = $this->input->post('like');

        $data = array(
            "name" => "No Video Here",
            "path" => ( base_url()."uploads/notfound.mp4"),
            "user" => "Obi Wanobody",
            "id" => $ednum,
            "comment" => NULL,
            "likes" => 0,
            "delete" => $delete,
            "liked" => $liked,
            "likes" => $likes
        );


        $this->load->view('template/header');
        $comment = $this->input->post('comment'); //getting username from login form
        $anon = $this->input->post('anon'); //getting remember checkbox from login form
        $commentor = "Anon";
        if(!$comment==NULL){
            if ($anon){
                $commentor = $_SERVER['REMOTE_ADDR']; 
            }else{
                $commentor = $_SESSION['username'];
            }
            $this->load->model('file_model');

            $uploadComment = array(
                'fileID' => intval($ednum),
                'userID' => $commentor,
                'comment' => $comment
            );
            $this->file_model->insert_comments($uploadComment);
        }
        $comment = "";
        if (is_numeric($ednum)){
            // echo '<br> like:'.$like;
            // echo '<br> liked:'.$liked;
            if($username && $fileId && $like && $liked){
                $removed = $this->file_model->remove_from_liked($username,$fileId);
                // $delete = $this->file_model->check_watchlist($username,$fileId);
                // echo '<br> remove:'.$removed;
                $likes = $this->file_model->fetch_liked($fileId);
                // echo '<br>2:'.$likes;
                $liked = 0;
            }
            if($username && $fileId && $like==2){
                $watch = array(
                    'username' =>$username,
                    'fileid' => $fileId,
                    'liked' => 1
                );
                $add = $this->file_model->add_to_liked($watch);
                // $delete = $this->file_model->check_watchlist($username,$fileId);
                // echo '<br> add:'.$add;
                $liked = 1;
                $likes = $this->file_model->fetch_liked($fileId);
                // echo '<br>3:'.$likes;
            }

            if($username && $fileId && $remove && $delete){
                $removed = $this->file_model->remove_from_watchlist($username,$fileId);
                // $delete = $this->file_model->check_watchlist($username,$fileId);
                
                $delete = 0;
            }
            if($username && $fileId && $remove==2){
                $watch = array(
                    'username' =>$username,
                    'fileid' => $fileId,
                    'added' => 1
                );
                $add = $this->file_model->add_to_watchlist($watch);
                // $delete = $this->file_model->check_watchlist($username,$fileId);
                $delete = 1;
            }
            

            $output = '';
            // $data['screen'] = $ednum;
            $video = $this->file_model->fetch_video($ednum); //send query to file_model and put result to $data
                if(!$video == null){
                    $data = array(
                        "name" =>  $video[0]['filename'],
                        "path" => base_url().'/uploads/'.$video[0]['filename'],
                        "user" => $video[0]['username'],
                        "id" => $ednum,
                        "comment" => $this->file_model->fetch_comments($ednum),
                        "delete" => $delete,
                        "liked" => $liked,
                        "likes" => $likes
                    );
                    $this->load->view('video',$data); // Sends through the particular search with the view allowing for the ajax functionality to take place.
                }else{
                    $this->load->view('video',$data); // Sends through the particular search with the view allowing for the ajax functionality to take place.
                    echo  ""; // no result found
                }

            
        }

    } 
    
}
?>