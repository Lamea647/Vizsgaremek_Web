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

    //Hirdetés rögzítése még fejlesztés alatt
    /*public function hirdetes_rogzitese($data)
    {
        $this->db->insert('hirdetes', $data);
    }*/

    public function hirdetes_torlese($id)
    {
        $this->db->where('hirdetes_id', $id);
        $this->db->delete('hirdetes');
    }

}




?>