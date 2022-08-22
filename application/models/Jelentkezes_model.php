<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jelentkezes_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function jelentkezes_rogzitese($data){
        $this->db->insert('jelentkezes', $data);
    }

}

/* End of file Jelentkezes_model.php */
