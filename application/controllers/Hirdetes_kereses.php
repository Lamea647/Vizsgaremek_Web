<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hirdetes_kereses extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->model('kategoria_model'); 
        $this->load->model('telepules_model');
        $this->load->model('hirdetes_model');
        $this->load->library('session');
    }

    public function hirdetes_kereses(){
        $kategoria_nev = $this->kategoria_model->kategoria_lista();
        $data['kategoria_nev'] = $kategoria_nev;

        $kategoria_szam = $this->kategoria_model->kategoriakSzama();
        $data['kategoria_szam'] = $kategoria_szam;

        $telepules = $this->telepules_model->get_all();
        $data['telepules'] = $telepules;

        $telepules_szam = $this->telepules_model->telepulesekSzama();
        $data['telepules_szam'] = $telepules_szam;

        $telepules_id = $this->input->post('telepules_id');
        $kategoria_id = $this->input->post('kategoria_id');
        $kezdo_idopont = $this->input->post('kezdo_idopont');
        $user_id = $_SESSION['user']['user_id'];
        
        $lekerdezettHirdetesek = $this->hirdetes_model->hirdetesKereses($telepules_id, $kategoria_id, $kezdo_idopont, $user_id);
        $data['lekerdezettHirdetesek'] = $lekerdezettHirdetesek;

        $kategoriaKep = $this->kategoria_model->get_by_id($kategoria_id);
        $data['kategoriaKep'] = $kategoriaKep;

        $this->load->view('header', ['oldal' => 'hirdetesek_keresese']);
        $this->load->view('hirdetes_kereses', $data);
        $this->load->view('footer');
    }

    public function hirdetes_megtekintes($id){
        $hirdetesek = $this->hirdetes_model->hirdetesAzonositoAlapjan($id);
        $data['hirdetesek'] = $hirdetesek;

        $kategoria_nev = $this->kategoria_model->kategoria_lista();
        $data['kategoria_nev'] = $kategoria_nev;

        $kategoria_szam = $this->kategoria_model->kategoriakSzama();
        $data['kategoria_szam'] = $kategoria_szam;

        $telepules = $this->telepules_model->get_all();
        $data['telepules'] = $telepules;

        $telepules_szam = $this->telepules_model->telepulesekSzama();
        $data['telepules_szam'] = $telepules_szam;

        $nev_profilkep = $this->hirdetes_model->nevProfilkep($id);
        $data['nev_profilkep'] = $nev_profilkep;

        $this->load->view('header');
        $this->load->view('hirdetes', $data);
        $this->load->view('footer');
    
    }

}

/* End of file Hirdetes_kereses.php */
