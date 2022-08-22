<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoria_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all()
    {
        $this->db->order_by('kategoria_id');
        return $this->db->get('kategoria')->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->where('kategoria_id', $id);
        return $this->db->get('kategoria')->row_array();
    }

    public function search($where)
    {
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->get('kategoria')->result_array();
    }

    public function kategoriakSzama(){
        return $this->db->count_all('kategoria');
    }

    public function kategoria_lista(){
        $this->db->select('kategoria_nev');
        $query = $this->db->get('kategoria');
        return $result = $query->result_array();
    }



    
}