<?php
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 6/4/2018
 * Time: 11:43 PM
 */

class Dashboard extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('TransBooking');
        $this->load->model('ModelPembayaran');
        $nav['nav'] = 'ADMIN FUTSALCORNER';
        $nav['active'] = 1;
        $user_id=$this->session->userdata('user_id');

        $data['data_booking'] = $this->TransBooking->getAll();
        $data['data_pembayaran'] = $this->ModelPembayaran->getAll();
        if ($user_id){
            $this->load->view('header/headerAdmin', $nav);
            $this->load->view('main/dashboard', $data);
        }
        else {
            $error['error_title'] = "Can't reach this page!";
            $error['error_massage'] = "You must login to view this page";
            $this->load->view('header/headerAdmin', $nav);
            $this->load->view('loginadmin', $error);
        }
        $this->load->view('footer');
    }
}