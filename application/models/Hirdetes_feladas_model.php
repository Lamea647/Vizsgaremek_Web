<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Hirdetes_feladas_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function kategoria_lista(){
        $this->db->select('kategoria_nev');
        $query = $this->db->get('kategoria');
        return $result = $query->result_array();
    }

    //kategória tábla rekordjainak megszámlása és az eredmény lekérdezése
    public function kategoriakSzama(){
        return $this->db->count_all('kategoria');
    }

    //hirdetes táblába új hirdetés adatainak rögzítése
    public function insert($data){
        $this->db->insert('hirdetes', $data);
    }

    //PRÓBA - hirdetés megjelenítéséhez
    public function hirdetesekMegjelenitese(){
        $this->db->select('leiras');
        $this->db->from('hirdetes');
        $this->db->join('user', 'user.user_id = hirdetes.hirdeto_id');
        //$this->db->where('hirdetes_id', 2);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    //PRÓBA - saját hirdetések megjelenítéséhez profil oldalon
    public function sajatHirdetesekMegjelenitese($id){
        $this->db->select('*');
        $this->db->from('kategoria');
        $this->db->join('hirdetes', 'kategoria.kategoria_id = hirdetes.kategoria_id');
        $this->db->where('hirdeto_id', $id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    //PRÓBA - konkrét hirdetés megjelenítése
    public function konkretHirdetesMegjelenitese($id){
        $this->db->select('*');
        $this->db->from('hirdetes');
        $this->db->where('hirdetes_id', $id);
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    //PRÓBA - hirdetéshez kategória név lekérdezése - nem használom eddig sehol
    public function konkretKategoriaMegjelenitese($kategoria_id){
        $this->db->select('kategoria_nev');
        $this->db->from('kategoria');
        $this->db->where('kategoria_id', $kategoria_id);
        $query = $this->db->get();
        return $result = $query->row_array();
    }
}

/* End of file Hirdetes_feladas_model.php */
