<?php
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 6/3/2018
 * Time: 7:12 AM
 */

class Booking extends CI_Controller
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
        $this->load->model('FutsalCourt');
        $this->load->model('TransBooking');

        $data['result'] = $this->FutsalCourt->getAll();
        $nav['nav'] = 'BOOKING';
        $nav['active'] = 2;

        $data['jadwal_booking'] = $this->TransBooking->getbyDate($this->input->post('bookdate'));
        $data['date'] = $this->input->post('bookdate');
        $data['detail_booking'] = $this->TransBooking->getAllDetail();
        $data['jadwal'] = $this->TransBooking->getJadwal();

        $user_id=$this->session->userdata('user_id');
        $user_role=$this->session->userdata('user_role');
        if ($user_id && $user_role == 'user'){
            $this->load->view('header/headerLoged', $nav);
            $this->load->view('main/booking', $data);
        }
        else {
            $error['error_title'] = "Can't reach this page!";
            $error['error_massage'] = "You must login to view this page";
            $this->load->view('header/header', $nav);
            $this->load->view('error', $error);
        }

        $this->load->view('footer');
    }

    public function newBooking(){
        $this->load->model('TransBooking');
        $this->load->model('FutsalCourt');

        $court = $this->FutsalCourt->getbyId($this->input->post('court'));
        $total_price = 0;
        $jadwal = $this->input->post('jadwal');

        print_r($jadwal);
        print_r($court);
        foreach ($jadwal as $item){
            $total_price = $total_price + $court->member_price;
        }

        $data=array(
            'id_user'=>$this->session->userdata('user_id'),
            'date'=>$this->input->post('bookdate'),
            'status'=>'pending',
            'price' => $total_price
        );

        $id_book = $this->TransBooking->newBooking($data);

        foreach ($jadwal as $item){
            $data=array(
                'id_booking'=>$id_book,
                'id_jadwal'=>$item,
                'id_field'=>$this->input->post('court'),
                'price' => $court->member_price
            );

            $this->TransBooking->newDetail($data);
        }

        $nav['nav'] = 'BOOKING';
        $nav['active'] = 2;

        $data['id_book'] = $id_book;
        $this->load->view('header/headerLoged', $nav);
        $this->load->view('main/pembayaran', $data);
        $this->load->view('footer');

    }

    public function updateBooking($id_book){
        $this->load->model('TransBooking');
        $data = $this->TransBooking->getbyId($id_book);

        $data->status = 'Verified';
        $query = $this->db->query('UPDATE DATA_BOOK SET STATUS = "' . $data->status . '" where id_booking = ' . $data->id_booking . ';');

        redirect('dashboard');
    }

}