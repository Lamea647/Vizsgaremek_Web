<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('telepules_model');
        $this->load->model('regisztracio_model');
    }

    public function profil_megtekintes(){

        $telepules = $this->telepules_model->get_by_id($_SESSION['user']['telepules_id']);
        $data['telepules'] = $telepules;

        $this->load->view('header', ['oldal' => 'profil']);
        $this->load->view('profil', $data);
        $this->load->view('footer');
    }

    public function profil_modositas(){

        $telepules = $this->telepules_model->get_all();
        $data['telepules'] = $telepules;

        $szam = $this->regisztracio_model->telepulesekSzama();
        $data['szam'] = $szam;

        $this->load->view('header');
        $this->load->view('modositott_profil', $data);
        $this->load->view('footer');
    }

}

/* End of file Profil.php */
