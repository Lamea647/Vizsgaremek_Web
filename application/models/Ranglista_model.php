<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Ranglista_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //Statisztikához - hirdetések összdarabszáma
    public function hirdetesekSzama(){
        return $this->db->count_all('hirdetes');
    }

    //Statisztikához - hirdetések darabszáma kategóriánként
    public function kategoriankentiHirdetes(){
       $sql = "SELECT kategoria_id, COUNT(hirdetes_id) FROM hirdetes GROUP BY kategoria_id";
       $query = $this->db->query($sql);
       return $result = $query->result_array();
    }

    //Statisztikához - kategória képének megjelenítése
    public function kategoriaAdatok(){
        $this->db->select('*');
        $this->db->from('kategoria');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

}

/* End of file Ranglista_model.php */
