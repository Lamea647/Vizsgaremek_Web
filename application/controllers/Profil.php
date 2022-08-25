<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('telepules_model');
        $this->load->model('user_model');
        $this->load->model('hirdetes_model');
        $this->load->model('jelentkezes_model');

    }

    public function profil_megtekintes(){
        $telepules = $this->telepules_model->get_by_id($_SESSION['user']['telepules_id']);
        $data['telepules'] = $telepules;

        //Díjaim részhez (teljesített hirdetések képei)

        $kategoriaKepek = $this->user_model->kategoriaKepekListazasa($_SESSION['user']['user_id']);
        $data['kategoriaKepek'] = $kategoriaKepek;

        //Hirdetések, amikre jelentkeztem részhez:

        $kategoriaKepekJelentkezesek = $this->hirdetes_model->kategoriaKepekListazasaJelentkezes($_SESSION['user']['user_id']);
        $data['kategoriaKepekJelentkezesek'] = $kategoriaKepekJelentkezesek;

        $hirdetesIdkJelentkezesek = $this->hirdetes_model->hirdetesekAdataiAmikreJelentkezettAFelhasznalo($_SESSION['user']['user_id']);
        $data['hirdetesIdkJelentkezesek'] = $hirdetesIdkJelentkezesek;

        //Saját hirdetéseim részhez:

        $sajatHirdetesKategoriaKepek = $this->hirdetes_model->kategoriaKepekListazasaSajatHirdetesek($_SESSION['user']['user_id']);
        $data['sajatHirdetesKategoriaKepek'] = $sajatHirdetesKategoriaKepek;

        $sajatHirdetesAdatok = $this->hirdetes_model->sajatHirdetesekAdatai($_SESSION['user']['user_id']);
        $data['sajatHirdetesAdatok'] = $sajatHirdetesAdatok;

        //Jóváhagyásra váró hirdetések részhez:

        $jovahagyasravaroKategoriaKepek = $this->hirdetes_model->kategoriaKepekJovahagyasravaroHirdetesek($_SESSION['user']['user_id']);
        $data['jovahagyasravaroKategoriaKepek'] = $jovahagyasravaroKategoriaKepek;

        $jovahagyasravaroHirdetesekAdatai = $this->hirdetes_model->jovahagyasravaroHirdetesekAdatai($_SESSION['user']['user_id']);
        $data['jovahagyasravaroHirdetesekAdatai'] = $jovahagyasravaroHirdetesekAdatai;

        
        $this->load->view('header', ['oldal' => 'profil']);
        $this->load->view('profil', $data);
        $this->load->view('footer');
    }

    public function profil_modositas(){
        $telepules = $this->telepules_model->get_all();
        $data['telepules'] = $telepules;

        $telepules_szam = $this->telepules_model->telepulesekSzama();
        $data['telepules_szam'] = $telepules_szam;

        $this->load->view('header');
        $this->load->view('modositott_profil', $data);
        $this->load->view('footer');
    }

    //személyes adatok módosítása - 1. form
    public function profil_modositas_post($id){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('telepules_id', 'Település', 'required');
        $this->form_validation->set_rules('cim', 'Cím', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail cím', 'trim|required|valid_email|is_unique');
        $this->form_validation->set_rules('telszam', 'Telefonszám', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			$this->session->set_flashdata('last_request', $this->input->post());
			redirect('profil/profil_modositas');
		}

        //$id = $this->session->userdata('user')['user_id'];

        //$id = $this->input->post('user_id');
		$data = [
            'telepules_id' => $this->input->post('telepules_id'),
            'cim' => $this->input->post('cim'),
            'email' => $this->input->post('email'),
            'telszam' => $this->input->post('telszam'),
        ];


        $this->load->model('user_model');
        $this->user_model->user_modositasa($id, $data);
        $this->session->set_flashdata('success', "Sikeresen módosította profilját!");
        redirect('profil/profil_megtekintes');
	}


}

/* End of file Profil.php */
