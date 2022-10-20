<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here 
	class User_model extends CI_Model{

    // Log in
    public function login($username, $password){
        // Validate
        $sql = "SELECT * From users where username = ? and emailaddress = ?";
        $result = $this->db->query($sql,array($username, $password));
        // $esc_username = $username;
        // $this->db->where('username',$esc_username );
        // $this->db->where('emailaddress', $password);
        // $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    //register
    public function register($username, $password,$firstname, $lastname,$emailaddress){
        $data = array(
            'username' => $username,
            'password' => $password,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'emailaddress' => $emailaddress
        );
        $query = $this->db->insert('files', $data);
    }
    public function find_user($username){
        // Validate
        $sql = "SELECT * From users where username = ?";
        $value = $this->db->query($sql,array($username));

        // $esc_username = $username;
        // $this->db->select("*");
        // $this->db->from("users");
        // $this->db->where('username', $this->db->escape($esc_username));
        // $value = $this->db->get();
        return $value -> result_array();
    }
    public function check_user($username){
        // Validate
        $sql = "SELECT * From users where username = ?";
        $result = $this->db->query($sql,array($username));
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    public function check_email($email){
        // Validate
        $sql = "SELECT * From users where emailaddress = ?";
        $result = $this->db->query($sql,array($email));
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    public function insert_user($data = array()){ 
        $insert = $this->db->insert('users', $data); 
        return $insert?true:false; 
    } 
    public function verify_user($verificationCode){ 
        $sql = "UPDATE users u
        SET u.emailVerified = 1
        WHERE u.emailverificationcode = ?";
        $result = $this->db->query($sql,array($verificationCode));
        return $result?true:false;
    } 
    public function check_verificationcode($code){
        // Validate
        $sql = "SELECT * From users where emailverificationcode = ?";
        $result = $this->db->query($sql,array($code));
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    public function insert_passwordcode($code,$email){
        // Validate
        $sql = "UPDATE users u SET u.passwordChangeCode = ? WHERE u.emailaddress = ?";
        $result = $this->db->query($sql,array($code,$email));
        return $result?true:false;
    }
    public function insert_password($password,$username){
        // Validate
        $sql = "UPDATE users u SET u.password = ? WHERE u.username  = ?";
        $result = $this->db->query($sql,array($password,$username));
        return $result?true:false;
    }
    public function find_email_user($email){
        // Validate
        $sql = "SELECT * From users where emailaddress  = ?";
        $value = $this->db->query($sql,array($email));

        return $value -> result_array();
    }
    public function check_passwordcode($code){
        // Validate
        $sql = "SELECT * From users where passwordChangeCode = ?";
        $result = $this->db->query($sql,array($code));
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    public function find_passcode_user($code){
        // Validate
        $sql = "SELECT * From users where passwordChangeCode  = ?";
        $value = $this->db->query($sql,array($code));

        return $value -> result_array();
    }
    public function delete_passwordcode($username){
        // Validate
        $sql = "UPDATE users u SET u.passwordChangeCode = '' WHERE u.username  = ?";
        //         UPDATE users u
        // SET u.passwordChangeCode =''
        // WHERE u.username='airo1011';
        $result = $this->db->query($sql,array($username));
        return $result?true:false;
    }
    public function update_user($fname,$lname,$email,$code,$username){
         
        $sql = "UPDATE users u SET u.firstname = ?, u.lastname = ?, u.emailaddress = ?, u.emailverificationcode = ?, u.emailVerified=0 WHERE u.username = ?";

        $result = $this->db->query($sql,array($fname,$lname,$email,$code,$username));
        return $result?true:false;
    }
   }
?>
