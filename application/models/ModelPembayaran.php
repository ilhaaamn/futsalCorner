<?php
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 6/4/2018
 * Time: 12:48 PM
 */

class ModelPembayaran extends  CI_Model
{
    public $id_booking;
    public $tgl_bayar;
    public $price;
    public $bukti_transfer;

    public function getAll(){
        $query = $this->db->get('data_pembayaran');
        return $query->result();
    }

    public function insertBukti($data){
        $this->db->insert('data_pembayaran', $data);
    }
}