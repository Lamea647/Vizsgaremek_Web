<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Hirdetes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        $this->db->order_by('hirdetes_id');
        return $this->db->get('hirdetes')->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->where('hirdetes_id', $id);
        return $this->db->get('hirdetes')->row_array();
    }

    public function hirdetes_lekerdezese_id_alapjan($id)
    {
        $this->db->where('hirdetes_id', $id);
        return $this->db->get('hirdetes')->result_array();
    }

    //Hirdetés rögzítése 
    public function hirdetes_rogzitese($data)
    {
        $this->db->insert('hirdetes', $data);
    }

    public function hirdetes_torlese($id)
    {
        $this->db->where('hirdetes_id', $id);
        $this->db->delete('hirdetes');
    }

    public function hirdetesKereses($telepules_id, $kategoria_id, $kezdo_idopont, $user_id){
        $this->db->select('*');
        $this->db->where('telepules_id',$telepules_id);
        $this->db->where('kategoria_id',$kategoria_id);
        $this->db->like('kezdo_idopont',$kezdo_idopont, 'after');
        $this->db->where('hirdeto_id !=',$user_id);
        $query = $this->db->get('hirdetes');
        return $result = $query->result_array();
    }

    public function kategoriaKep($hirdetes_id){
        $this->db->select('kategoria_kep');
        $this->db->from('kategoria');
        $this->db->join('hirdetes', 'hirdetes.kategoria_id = kategoria.kategoria_id');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }



}




?>