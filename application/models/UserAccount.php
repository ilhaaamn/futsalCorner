<?php
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 6/2/2018
 * Time: 11:44 PM
 */

class UserAccount extends CI_Model
{
    public $nama;
    public $email;
    public $role;
    public $status;
    public $hash_password;

    public function __construct()
    {
        parent::__construct();
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
    }

    /**
     * @return mixed
     */
    public function getbyid($username)
    {
        $query = $this->db->query('SELECT * FROM DATA_USER WHERE ID_USER = '.$username.';');
        $result = $query->result();
        return $result;
    }

    public function register_user($user){
        $user = array(
            'nama'=>$user['nama'],
            'email'=>$user['email'],
            'role'=>$this->roles[0],
            'status'=>$this->status[0],
            'hash_password'=>$user['hash_password']
        );

        $this->db->insert('data_user', $user);

    }

    public function login_admin($email,$pass){

        $query = $this->db->get_where('data_user', array('email' => $email, 'hash_password' => $pass, 'role' => 'admin'));

        if($query->result())
        {
            return $query->row_array();
        }
        else{
            return false;
        }
    }

    public function login_user($email,$pass){

        $query = $this->db->get_where('data_user', array('email' => $email, 'hash_password' => $pass, 'role' => 'user'));

        if($query->result())
        {
            return $query->row_array();
        }
        else{
            return false;
        }
    }

    public function isDuplicate($email)
    {
        $this->db->get_where('data_user', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }


}