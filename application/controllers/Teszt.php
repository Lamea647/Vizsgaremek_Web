<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Teszt extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('teszt_model');
    }

    public function index(){
        $tesztadat = $this->teszt_model->teszt();
        $data['tesztadat'] = $tesztadat;
        $this->load->view('header');
        $this->load->view('teszt', $data);
        $this->load->view('footer');
    }

}

/* End of file Teszt.php */
