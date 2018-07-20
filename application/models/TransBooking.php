<?php
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 6/3/2018
 * Time: 9:50 AM
 */

class TransBooking extends CI_Model
{
    public $id_user;
    public $date;
    public $status;
    public $price;

    public function getAll(){
        $query = $this->db->get('data_book');
        return $query->result();
    }

    public function getbyId($data){
        $query = $this->db->get_where('data_book', array('id_booking' => $data));
        return $query->row();
    }

    public function getbyUserId($data){
        $query = $this->db->get_where('data_book', array('id_user' => $data));
        return $query->result();
    }

    public function getbyDate($date){
        $query = $this->db->get_where('data_book', array('date' => $date));
        return $query->result();
    }

    public function getJadwal(){
        $query = $this->db->get('data_jadwal');
        return $query->result();
    }

    public function getAllDetail(){
        $query = $this->db->get('data_detail_booking');
        return $query->result();
    }

    public function newBooking($data){
        //echo "halo";
        $this->db->insert('data_book', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function newDetail($data){
        $this->db->insert('data_detail_booking', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function updateBooking($data){
        //echo "halo";
        $this->db->replace('data_book', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
}