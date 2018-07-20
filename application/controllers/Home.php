<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 5/21/2018
 * Time: 3:24 PM
 */

class Home extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('FutsalCourt');

        $data['result'] = $this->FutsalCourt->getAll();
        $nav['nav'] = 'HOME';
        $nav['active'] = 1;
        $user_id=$this->session->userdata('user_id');
        $user_role=$this->session->userdata('user_role');
        if ($user_id && $user_role == 'user'){
            $this->load->view('header/headerLoged', $nav);
        }
        else {
            $this->load->view('header/header', $nav);
        }

        $this->load->view('main/home', $data);
        $this->load->view('footer');
    }
}