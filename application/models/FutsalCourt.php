<?php
/**
 * Created by PhpStorm.
 * User: mou5e
 * Date: 6/2/2018
 * Time: 10:41 AM
 */

class FutsalCourt extends CI_Model
{
    public $id_field;
    public $nama;
    public $price;
    public $description;

    public function getAll(){
        $query = $this->db->get('DATA_LAPANGAN');
        return $query->result();
    }

    public function getbyId($id_field){
        $query = $this->db->get_where('data_lapangan', array('id_field' => $id_field));

        return $query->row();
    }

}