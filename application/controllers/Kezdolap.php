<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kezdolap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('fooldal');
        $this->load->view('footer');
    }

}


/* End of file Kezdolap.php */
