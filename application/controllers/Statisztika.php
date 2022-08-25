<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Statisztika extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('hirdetes_model');
        $this->load->model('ranglista_model');
        $this->load->model('kategoria_model');
    }

    public function ranglista_megtekintes(){

        $dijKepek = ['elso.jpg', 'masodik.jpg', 'harmadik.jpg', 'negyedik.jpg', 'otodik.jpg'];
        $data['dijKepek'] = $dijKepek;

        $hirdetes_szam = $this->hirdetes_model->hirdetesekSzama();
        $data['hirdetes_szam'] = $hirdetes_szam;

        $kategoriaKepek = $this->kategoria_model->kategoria_kepek();
        $data['kategoriaKepek'] = $kategoriaKepek;

        $kategoriaDarabszamok = $this->ranglista_model->darabszamKategoriankent();
        $data['kategoriaDarabszamok'] = $kategoriaDarabszamok;

        $kategoria_szam = $this->kategoria_model->kategoriakSzama();
        $data['kategoria_szam'] = $kategoria_szam;


        $adatok = $this->ranglista_model->kategoriankentiHirdetes();
        $data['adatok'] = $adatok;

        $kategoriaAdatok = $this->ranglista_model->kategoriaAdatok();
        $data['kategoriaAdatok'] = $kategoriaAdatok;

        $profilKepek = $this->ranglista_model->rangLista();
        $data['profilKepek'] = $profilKepek;


        $this->load->view('header', ['oldal' => 'ranglista']);
        $this->load->view('statisztika', $data);
        $this->load->view('footer');
    }


}

/* End of file Statisztika.php */
