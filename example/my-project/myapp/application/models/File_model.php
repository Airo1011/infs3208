<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here 
 class File_model extends CI_Model{

    // upload file
    public function upload($filename, $path, $username){

        $data = array(
            'filename' => $filename,
            'path' => $path,
            'username' => $username
        );
        $query = $this->db->insert('files', $data);

    }
    public function insert($data = array()){ 
        $insert = $this->db->insert('files', $data); 
        return $insert?true:false; 
    } 
    function fetch_data($query,$limit)
    {
        if($query == '')
        {
        }else{
            $this->db->select("*");
            $this->db->from("files");
            $this->db->like('filename', $query);
            $this->db->or_like('username', $query);
            $this->db->order_by('filename', 'DESC');
            $this->db->limit($limit);
            return $this->db->get();
        }
    }
    function load_data($start,$limit)
    {
        $this->db->select("*");
        $this->db->from("files");
        $this->db->order_by('id', 'DESC');
        $this->db->limit($start,$limit);
        return $this->db->get();
    }
    function fetch_video($query)
    {
        $this->db->select("*");
        $this->db->from("files");
        $this->db->where('id', $query);
        $value = $this->db->get();
        return $value -> result_array();
    }
    function count()
    {
        $this->db->select("*");
        $this->db->from("files");
        $value = $this->db->get();
        return $value ->num_rows();
    }
    function insert_comments($data = array())
    {
        $insert = $this->db->insert('comments', $data); 
        return $insert?true:false; 
    }
    function fetch_comments($id)
    {
        $this->db->select("*");
        $this->db->from("comments");
        $this->db->where('fileID', $id);
        $this->db->order_by('id', 'DESC');
        $value = $this->db->get();
        return $value -> result();
    }
    function add_to_watchlist($data = array())
    {
        $insert = $this->db->insert('watchlist', $data); 
        return $insert?true:false; 
    }
    function check_watchlist($username,$fileid)
    {
        $sql = "SELECT * from watchlist w WHERE w.username =? AND w.fileid =?";
        $result = $this->db->query($sql,array($username,$fileid));
        if($result->num_rows() >= 1){
            return true;
        } else {
            return false;
        }
    }
    function remove_from_watchlist($username,$fileid)
    {
        $sql = "DELETE FROM watchlist WHERE username=? AND fileid = ? ";
        $result = $this->db->query($sql,array($username,$fileid));
        return $result?true:false;
    }
    function fetch_watchlist($username)
    {
        // SELECT * FROM watchlist w, files f WHERE f.id = w.fileid and w.username ="infs3202" 
        $sql = "SELECT * FROM watchlist w, files f WHERE f.id = w.fileid and w.username = ? ";
        $value = $this->db->query($sql,array($username));

        return $value -> result();
    }
    function add_to_liked($data = array())
    {
        $insert = $this->db->insert('likes', $data); 
        return $insert?true:false; 
    }
    function check_liked($username,$fileid)
    {
        $sql = "SELECT * from likes w WHERE w.username =? AND w.fileid =?";
        $result = $this->db->query($sql,array($username,$fileid));
        if($result->num_rows() >= 1){
            return true;
        } else {
            return false;
        }
    }
    function remove_from_liked($username,$fileid)
    {
        $sql = "DELETE FROM likes WHERE username=? AND fileid = ? ";
        $result = $this->db->query($sql,array($username,$fileid));
        return $result?true:false;
    }
    function fetch_liked($fileid)
    {
        // SELECT * FROM watchlist w, files f WHERE f.id = w.fileid and w.username ="infs3202" 
        $sql = "SELECT * FROM likes l WHERE l.fileID=?";
        $value = $this->db->query($sql,array($fileid));

        return $value->num_rows();
    }
}