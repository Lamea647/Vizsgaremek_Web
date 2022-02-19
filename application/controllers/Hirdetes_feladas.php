<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hirdetes_feladas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('hirdetes_feladas_model');
        $this->load->library('session');
    }

    public function hirdetes_feladas(){
        $kategoria_nev = $this->hirdetes_feladas_model->kategoria_lista();
        //print_r($kategoria_nev);
        $data['kategoria_nev'] = $kategoria_nev;

        //$szam_kategoria változóba elmenteni a Hirdetes_feladas_model kategoriakSzama() metódus eredményét, és belerakni a $data tömbbe
        $szam_kategoria = $this->hirdetes_feladas_model->kategoriakSzama();
        $data['szam_kategoria'] = $szam_kategoria;

        $this->load->view('header', ['oldal' => 'hirdetes_feladasa']);
        $this->load->view('hirdetes_feladas', $data);
        $this->load->view('footer');
    }


}

/* End of file Hirdetes_feladas.php */


