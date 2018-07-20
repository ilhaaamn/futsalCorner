<?php
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 6/4/2018
 * Time: 12:49 PM
 */

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $config['upload_path'] = './bukti/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;
        $config['file_name'] = 'IDBOOK'.$this->input->post('id_book');


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->model('TransBooking');

            $databook = $this->TransBooking->getbyId($this->input->post('id_book'));
            print_r($databook);
            $datapembayaran = array(
                'id_booking' => $this->input->post('id_book'),
                'tgl_bayar' => date("Y/m/d"),
                'price' => $databook->price,
                'bukti_transfer' => 'bukti/' . 'IDBOOK' . $this->input->post('id_book') . '.jpg'
            );

            $this->insertPembayaran($datapembayaran);

            $nav['nav'] = 'BOOKING';
            $nav['active'] = 2;
            $user_id=$this->session->userdata('user_id');
            if ($user_id){
                $success['success_title'] = "Booking complited";
                $success['success_message'] = "Please wait until ur admin verified your book";
                $this->load->view('header/headerLoged', $nav);
                $this->load->view('upload_success', $success);
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

    public function insertPembayaran($data){

        $this->load->model('ModelPembayaran');
        $this->ModelPembayaran->insertBukti($data);

    }
}