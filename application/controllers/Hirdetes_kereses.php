<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hirdetes_kereses extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('hirdetes_feladas_model'); //kategória lekérdezés eléréséhez
        $this->load->model('regisztracio_model'); //település lekérdezés eléréséhez
        $this->load->library('session');
    }

    public function hirdetes_kereses(){
        //kategóriák lekérdezéséhez átemeltem ide is a hirdetes_feladas()-ból az adatokat
        $kategoria_nev = $this->hirdetes_feladas_model->kategoria_lista();
        $data['kategoria_nev'] = $kategoria_nev;
        $kategoria_szam = $this->hirdetes_feladas_model->kategoriakSzama();
        $data['kategoria_szam'] = $kategoria_szam;
        //települések lekérdezéséhez átemeltem ide is a kezdolap/regisztracio()-ból az adatokat
        $telepules = $this->regisztracio_model->telepules_lista();
        $data['telepules'] = $telepules;

        $telepules_szam = $this->regisztracio_model->telepulesekSzama();
        $data['telepules_szam'] = $telepules_szam;

        $this->load->view('header', ['oldal' => 'hirdetesek_keresese']);
        $this->load->view('hirdetes_kereses', $data);
        $this->load->view('footer');
    }

    public function hirdetes_megtekintes($id){
        $data['hirdetesek']= $this->hirdetes_feladas_model->konkretHirdetesMegjelenitese($id);
        //$proba = $this->hirdetes_feladas_model->konkretKategoriaMegjelenitese(); hogy adom át ennek az id-t, mikor az az előző lekérdezés eredményében van
        $this->load->view('header');
        $this->load->view('hirdetes', $data);
        $this->load->view('footer');
    }


}

/* End of file Hirdetes_kereses.php */
