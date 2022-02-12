<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hirdetes_kereses extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('hirdetes_feladas_model'); //kategória lekérdezés eléréséhez
        $this->load->model('regisztracio_model'); //település lekérdezés eléréséhez
    }

    public function hirdetes_kereses(){
        //kategóriák lekérdezéséhez átemeltem ide is a hirdetes_feladas()-ból az adatokat
        $kategoria_nev = $this->hirdetes_feladas_model->kategoria_lista();
        $data['kategoria_nev'] = $kategoria_nev;
        //települések lekérdezéséhez átemeltem ide is a kezdolap/regisztracio()-ból az adatokat
        $telepules = $this->regisztracio_model->telepules_lista();
        $data['telepules'] = $telepules;

        $this->load->view('header');
        $this->load->view('hirdetes_kereses', $data);
        $this->load->view('footer');
    }

    public function hirdetes_megtekintes(){
        $this->load->view('header');
        $this->load->view('hirdetes');
        $this->load->view('footer');
    }


}

/* End of file Hirdetes_kereses.php */
