<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Statisztika extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('ranglista_model');
    }

    public function ranglista_megtekintes(){
        $hirdetes_szam = $this->ranglista_model->hirdetesekSzama();
        $data['hirdetes_szam'] = $hirdetes_szam;

        $adatok = $this->ranglista_model->kategoriankentiHirdetes();
        $data['adatok'] = $adatok;

        $kategoriaAdatok = $this->ranglista_model->kategoriaAdatok();
        $data['kategoriaAdatok'] = $kategoriaAdatok;

        $this->load->view('header', ['oldal' => 'ranglista']);
        $this->load->view('statisztika', $data);
        $this->load->view('footer');
    }


}

/* End of file Statisztika.php */
