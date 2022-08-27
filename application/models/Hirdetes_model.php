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

    public function hirdetesLeiras($hirdetes_id){
        $this->db->select('leiras');
        $this->db->from('hirdetes');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    public function nevProfilkep($hirdetes_id){
        $this->db->select('nev, profilkep');
        $this->db->from('user');
        $this->db->join('hirdetes', 'hirdetes.hirdeto_id = user.user_id');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function telepulesnev($hirdetes_id){
        $this->db->select('telepules');
        $this->db->from('telepules');
        $this->db->join('hirdetes', 'hirdetes.telepules_id = telepules.telepules_id');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function kategorianev($hirdetes_id){
        $this->db->select('kategoria_nev');
        $this->db->from('kategoria');
        $this->db->join('hirdetes', 'hirdetes.kategoria_id = kategoria.kategoria_id');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function hirdetesekSzama(){
        return $this->db->count_all('hirdetes');
    }


    public function hirdetesAdatok($hirdetes_id){
        $this->db->select('kezdo_idopont,zaro_idopont,leiras,hirdetes_telszam,hirdetes_cim');
        $this->db->from('hirdetes');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }


    public function hirdetesAzonositokAmikreJelentkezettAFelhasznalo($user_id){
        $this->db->select('hirdetes_id');
        $this->db->from('jelentkezes');
        $this->db->where('jelentkezo_id', $user_id);
        $this->db->where('jovahagyas_onkentes', 'true');
        $this->db->where('jovahagyas_hirdeto', 'false');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function hirdetesekAdataiAmikreJelentkezettAFelhasznalo($user_id){
        $this->db->select('*');
        $this->db->from('hirdetes');
        $this->db->join('jelentkezes', 'hirdetes.hirdetes_id = jelentkezes.hirdetes_id');
        $this->db->where('jovahagyas_onkentes', 'true');
        $this->db->where('jovahagyas_hirdeto', 'false');
        $this->db->where('jelentkezo_id', $user_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function hirdetesAdatai($hirdetes_id){
        $this->db->select('*');
        $this->db->from('hirdetes');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function kategoriaKepekListazasaJelentkezes($user_id){
        $sql = "SELECT kategoria_kep FROM kategoria WHERE kategoria_id IN (SELECT kategoria_id FROM hirdetes h JOIN jelentkezes j ON h.hirdetes_id = j.hirdetes_id WHERE j.jovahagyas_onkentes = 'true' AND j.jovahagyas_hirdeto = 'false' AND jelentkezo_id = $user_id)";
        return $result = $this->db->query($sql)->result_array();
    }

    public function sajatHirdeteseim($user_id){
        $this->db->select('kategoria_kep');
        $this->db->from('kategoria');
        $this->db->join('hirdetes', 'hirdetes.kategoria_id = kategoria.kategoria_id');
        $this->db->where('hirdeto_id', $user_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function kategoriaKepekListazasaSajatHirdetesek($user_id){
        $sql = "SELECT kategoria_kep FROM kategoria WHERE kategoria_id IN (SELECT h.kategoria_id FROM hirdetes h LEFT JOIN user u ON u.user_id=h.hirdeto_id LEFT JOIN jelentkezes j ON j.hirdetes_id=h.hirdetes_id WHERE j.jovahagyas_onkentes = 'false' AND u.user_id = $user_id)";
        return $result = $this->db->query($sql)->result_array();
    }

    public function sajatHirdetesekAdatai($user_id){
        $this->db->select('*');
        $this->db->from('hirdetes');
        $this->db->join('jelentkezes', 'hirdetes.hirdetes_id = jelentkezes.hirdetes_id');
        $this->db->where('jovahagyas_onkentes', 'false');
        $this->db->where('jovahagyas_hirdeto', 'false');
        $this->db->where('hirdeto_id', $user_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }


    public function sajatHirdetesAzonositok($user_id){
        $this->db->select('hirdetes_id');
        $this->db->from('hirdetes');
        $this->db->where('hirdeto_id', $user_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function hirdetesAzonositoAlapjan ($hirdetes_id){
        $this->db->select('*');
        $this->db->from('hirdetes');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function sajatHirdetesTorlese ($hirdetes_id){
        $this->db->where('hirdetes_id', $hirdetes_id);
        $this->db->delete('hirdetes');
    }

    public function kategoriaKepekJovahagyasravaroHirdetesek ($user_id){
        $sql = "SELECT kategoria_kep FROM kategoria WHERE kategoria_id IN (SELECT h.kategoria_id FROM hirdetes h LEFT JOIN user u ON u.user_id=h.hirdeto_id LEFT JOIN jelentkezes j ON j.hirdetes_id=h.hirdetes_id WHERE j.jovahagyas_onkentes = 'true' AND j.jovahagyas_hirdeto = 'false' AND u.user_id = $user_id)";
        return $result = $this->db->query($sql)->result_array();
    }

    public function jovahagyasravaroHirdetesekAdatai ($user_id){
        $sql = "SELECT * FROM hirdetes h JOIN jelentkezes j ON h.hirdetes_id = j.hirdetes_id WHERE j.jovahagyas_onkentes = 'true' AND j.jovahagyas_hirdeto = 'false' AND hirdeto_id = $user_id";
        return $result = $this->db->query($sql)->result_array();
    }


    //ÚJ - Saját hirdetésekhez - hirdetes_id-k
    public function hirdetesIdkSajatHirdetesek($user_id){
        $sql = "SELECT hirdetes_id FROM `hirdetes` WHERE hirdetes_id NOT IN (SELECT hirdetes.hirdetes_id from hirdetes INNER JOIN jelentkezes WHERE jelentkezes.hirdetes_id = hirdetes.hirdetes_id AND hirdetes.hirdeto_id = $user_id) AND hirdeto_id = $user_id";
        return $result = $this->db->query($sql)->result_array();
    }

    //ÚJ - Saját hirdetésekhez - kategoria_kepek
    public function kategoriaKepekSajatHirdetesek($user_id){
        $sql = "SELECT kategoria_kep from kategoria JOIN hirdetes ON kategoria.kategoria_id = hirdetes.kategoria_id AND hirdetes_id IN(SELECT hirdetes_id FROM `hirdetes` WHERE hirdetes_id NOT IN (SELECT hirdetes.hirdetes_id from hirdetes INNER JOIN jelentkezes WHERE jelentkezes.hirdetes_id = hirdetes.hirdetes_id AND hirdetes.hirdeto_id = $user_id) AND hirdeto_id = $user_id)";
        return $result = $this->db->query($sql)->result_array();
    }













}




?>