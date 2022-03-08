<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Telepules_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all()
    {
        $this->db->order_by('telepules_id');
        return $this->db->get('telepules')->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->where('telepules_id', $id);
        return $this->db->get('telepules')->row_array();
    }

    public function search($where)
    {
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->get('telepules')->result_array();
    }

    
}