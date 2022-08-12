<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Statisztika extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function ranglista_megtekintes(){
        $this->load->view('header', ['oldal' => 'ranglista']);
        $this->load->view('statisztika');
        $this->load->view('footer');
    }


}

/* End of file Statisztika.php */
