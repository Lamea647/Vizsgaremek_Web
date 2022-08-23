<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        $this->db->order_by('user_id', 'desc');
        return $this->db->get('user')->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('user')->row_array();
    }

    public function user_rogzitese($data)
    {
        $this->db->insert('user', $data);
        //return $this->db->insert_id();
    }

    public function user_lekerdezese_id_alapjan($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('user')->result_array();
    }

    public function user_modositasa($id, $data)
    {
        $this->db->where('user_id', $id);
        return $this->db->update('user', $data);
    }

    public function user_torlese($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }


    //Bejelentkezéshez + Profil oldalhoz használható

    public function kereses_felhnev_alapjan($felhnev){
        $this->db->where('felhnev', $felhnev);
        return $this->db->get('user')->row_array();
    }

    public function kategoriaKepekListazasa($user_id){
        $sql = "SELECT DISTINCT kategoria_kep FROM kategoria WHERE kategoria_id IN (SELECT kategoria_id FROM hirdetes h JOIN jelentkezes j ON h.hirdetes_id = j.hirdetes_id WHERE j.jovahagyas_onkentes = 'true' AND j.jovahagyas_hirdeto = 'true' AND jelentkezo_id = $user_id)"; 
        return $result = $this->db->query($sql)->result_array();
    }

    public function telepulesAzonositoUser($user_id){
        $this->db->select('telepules_id');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');
        return $result = $query->result_array();
    }




}

/* End of file ModelName.php */


?>