<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kezdolap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('regisztracio_model');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('kezdolap');
        $this->load->view('footer');
    }

    public function regisztracio(){
        $telepules = $this->regisztracio_model->telepules_lista();
        //print_r($telepules);
        $data['telepules'] = $telepules;
        
        $this->load->view('header');
        $this->load->view('regisztracio', $data);
        $this->load->view('footer');
    }

    public function bejelentkezes(){
        $this->load->view('header');
        $this->load->view('bejelentkezes');
        $this->load->view('footer');
    }

}


/* End of file Kezdolap.php */
