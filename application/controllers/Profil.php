<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('telepules_model');
        $this->load->model('regisztracio_model');
        $this->load->model('hirdetes_feladas_model');
    }

    public function profil_megtekintes(){
        $telepules = $this->telepules_model->get_by_id($_SESSION['user']['telepules_id']);
        $data['telepules'] = $telepules;

        $data['kategoriak'] = $this->hirdetes_feladas_model->sajatHirdetesekMegjelenitese($_SESSION['user']['user_id']);

        $this->load->view('header', ['oldal' => 'profil']);
        $this->load->view('profil', $data);
        $this->load->view('footer');
    }

    public function profil_modositas(){
        $telepules = $this->telepules_model->get_all();
        $data['telepules'] = $telepules;

        $telepules_szam = $this->regisztracio_model->telepulesekSzama();
        $data['telepules_szam'] = $telepules_szam;

        $this->load->view('header');
        $this->load->view('modositott_profil', $data);
        $this->load->view('footer');
    }

    //személyes adatok módosítása - 1. form
    public function adatok_mod($id){
        $this->load->model('user_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('telepules_id', 'Település');
        $this->form_validation->set_rules('cim', 'Cím', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail cím', 'trim|required|valid_email|is_unique');
        $this->form_validation->set_rules('telszam', 'Telefonszám', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			$this->session->set_flashdata('last_request', $this->input->post());
			redirect('profil/profil_modositas');
		}

        $profilkep_nev = $_FILES['profilkep']['name'];
        $kiterjesztes1 = pathinfo($profilkep_nev, PATHINFO_EXTENSION);
        $idopont1 = date("Y_m_d_H_i_s");
        $felhnev1 = $_SESSION['user']['felhnev'];
        $fajlnev1 = $felhnev1; //egyelőre felhasználónév
        $fajlnev1 = preg_replace('/[áàãâä]/ui', 'a', $fajlnev1);
        $fajlnev1 = preg_replace('/[éèêë]/ui', 'e', $fajlnev1);
        $fajlnev1 = preg_replace('/[íìîï]/ui', 'i', $fajlnev1);
        $fajlnev1 = preg_replace('/[óòõôöő]/ui', 'o', $fajlnev1);
        $fajlnev1 = preg_replace('/[úùûüű]/ui', 'u', $fajlnev1);
        $fajlnev1 = preg_replace('/[ç]/ui', 'c', $fajlnev1);
        $fajlnev1 = preg_replace('/[^a-z0-9]/i', '_', $fajlnev1);
        $fajlnev1 = preg_replace('/_+/', '_', $fajlnev1);
        $fajlnev1 = strtolower($fajlnev1);
        $fajlnev1 = $fajlnev1 . '_profil_' . $idopont1 . '.' . $kiterjesztes1;

        $config1['upload_path']          = './uploads/';
        $config1['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
        $config1['max_size']             = 10240;
        $config1['file_name']            = $fajlnev1;

        $this->load->library('upload', $config1);
        
		if (!$this->upload->do_upload('profilkep')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			$this->session->set_flashdata('last_request', $this->input->post());
			redirect('profil/profil_modositas');
		}

		$data = [
            'telepules_id' => $this->input->post('telepules_id'),
            'cim' => $this->input->post('cim'),
            'email' => $this->input->post('email'),
            'telszam' => $this->input->post('telszam'),
            'profilkep' => $fajlnev1 
        ];


        //$id = $this->session->userdata('user')['user_id'];
        $this->user_model->user_modositasa($id, $data);
        $this->session->set_flashdata('success', "Sikeres adatmódosítás!");
        redirect('profil/profil_megtekintes');
	}


}

/* End of file Profil.php */
