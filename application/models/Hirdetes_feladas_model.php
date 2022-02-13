<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Hirdetes_feladas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function kategoria_lista()
{
    $this->db->select("kategoria_nev");
    $query = $this->db->get("kategoria");
    return $result = $query->result_array();
}

//kategória tábla rekordjainak megszámlása és az eredmény lekérdezése
public function kategoriakSzama(){

    return $this->db->count_all('kategoria');

}

}

/* End of file Hirdetes_feladas_model.php */
