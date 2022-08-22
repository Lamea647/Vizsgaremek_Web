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

    public function rangLista(){
        $this->db->select('pontszam, profilkep');
        $this->db->from('user');
        $this->db->order_by('pontszam', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function darabszamKategoriankent(){
        $sql = "SELECT kategoria.kategoria_id AS 'Kategória', COUNT(hirdetes.hirdetes_id) AS 'Darabszám' FROM hirdetes RIGHT JOIN kategoria ON hirdetes.kategoria_id = kategoria.kategoria_id GROUP BY kategoria.kategoria_id";
        return $result = $this->db->query($sql)->result_array();
    }





}

/* End of file Ranglista_model.php */
