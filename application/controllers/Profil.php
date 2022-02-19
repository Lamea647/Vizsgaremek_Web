<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function profil_megtekintes(){

        $this->load->view('header', ['oldal' => 'profil']);
        $this->load->view('profil');
        $this->load->view('footer');
    }

    public function profil_modositas(){
        $this->load->view('header');
        $this->load->view('modositott_profil');
        $this->load->view('footer');
    }

}

/* End of file Profil.php */
