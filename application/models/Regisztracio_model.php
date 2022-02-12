<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regisztracio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

public function telepules_lista()
{
    $this->db->select("telepules");
    $query = $this->db->get("telepules");
    return $result = $query->result_array();
}

//település tábla rekordjainak megszámlása és az eredmény lekérdezése
public function telepulesekSzama(){

    return $this->db->count_all('telepules');

}

}

/* End of file Regisztracio_model.php */
