<?php
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 6/4/2018
 * Time: 5:02 AM
 */

class User extends  CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('userAccount');
        $this->load->library('session');

    }

    public function index()
    {
        $this->load->view("register.php");
    }

    public function register_user(){
        $user=array(
            'nama'=>$this->input->post('user_name'),
            'email'=>$this->input->post('user_email'),
            'hash_password'=>md5($this->input->post('user_password')),

        );
        print_r($user);

        $email_check=$this->userAccount->isDuplicate($user['email']);

        if(!$email_check){
            $this->userAccount->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
            $data=$this->userAccount->login_user($user['email'],$user['hash_password']);

            $this->session->set_userdata('user_id',$data['id_user']);
            $this->session->set_userdata('user_email',$data['email']);
            $this->session->set_userdata('user_name',$data['nama']);

            redirect(base_url().'home');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect(base_url().'home');
        }
    }

    function login_admin(){

        $user_login=array(
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password'))
        );


        $data=$this->userAccount->login_admin($user_login['user_email'],$user_login['user_password']);
        if($data)
        {
                $this->session->set_userdata('user_id', $data['id_user']);
                $this->session->set_userdata('user_email', $data['email']);
                $this->session->set_userdata('user_name', $data['nama']);
                $this->session->set_userdata('user_role', $data['role']);

            redirect(base_url('Dashboard'));
        }
        else{
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect(base_url().'Dashboard');
        }
    }

    function login_user(){

        $user_login=array(
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password'))
        );

        $data=$this->userAccount->login_user($user_login['user_email'],$user_login['user_password']);
        if($data)
        {
            if ($data['role'] == 'user') {
                $this->session->set_userdata('user_id', $data['id_user']);
                $this->session->set_userdata('user_email', $data['email']);
                $this->session->set_userdata('user_name', $data['nama']);
                $this->session->set_userdata('user_role', $data['role']);
            }
            redirect(base_url() . 'home');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect(base_url().'home');
        }
    }

    public function user_logout(){
        $this->session->sess_destroy();
        redirect(base_url('home'), 'refresh');
    }

    public function list_booking(){
        $this->load->model('TransBooking');
        $nav['nav'] = 'LIST BOOKING';
        $nav['active'] = 3;

        $user_id=$this->session->userdata('user_id');
        $user_role=$this->session->userdata('user_role');

        $data['data_booking'] = $this->TransBooking->getbyUserId($user_id);
        if ($user_id && $user_role == 'user'){
            $this->load->view('header/headerLoged', $nav);
            $this->load->view('main/list_booking', $data);
        }
        else {
            $error['error_title'] = "Can't reach this page!";
            $error['error_massage'] = "You must login to view this page";
            $this->load->view('header/header', $nav);
            $this->load->view('error', $error);
        }
        $this->load->view('footer');
    }

}