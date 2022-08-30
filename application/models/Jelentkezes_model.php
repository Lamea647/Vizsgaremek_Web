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

    public function jelentkezesJovahagyasa($hirdetes_id){
        $this->db->set('jovahagyas_hirdeto', 'true');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $this->db->update('jelentkezes');
    }

    public function jelentkezesElutasitasa($hirdetes_id){
        $this->db->set('jovahagyas_onkentes', 'false');
        $this->db->where('hirdetes_id', $hirdetes_id);
        $this->db->update('jelentkezes');
    }

    //ÚJ - Jelentkezés elutasításakor törlés
    public function jelentkezesTorleseElutasitasMiatt($hirdetes_id){
        $this->db->where('hirdetes_id', $hirdetes_id);
        $this->db->delete('jelentkezes');
    }


}

/* End of file Jelentkezes_model.php */
