<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kezdolap extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('telepules_model');
    }

    public function index(){
        $this->load->view('header', ['oldal' => 'fooldal']);
        $this->load->view('kezdolap');
        $this->load->view('footer');
    }

    public function regisztracio(){
        $telepules = $this->telepules_model->get_all();
        //print_r($telepules);
        $data['telepules'] = $telepules;

        //$szam változóba elmenteni a Regisztracio_model telepulesekSzama() metódus eredményét, és belerakni a $data tömbbe
        $telepules_szam = $this->telepules_model->telepulesekSzama();
        $data['telepules_szam'] = $telepules_szam;
        
        $this->load->view('header', ['oldal' => 'regisztracio']);
        $this->load->view('regisztracio', $data);
        $this->load->view('footer');
    }

    public function regisztracio_post(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nev', 'Teljes név', 'trim|required|regex_match[^((Mr\.|Dr\.|dr\.|Ms\.|Mrs\.)\s)?([A-ZÁÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]+([-][A-ZÁÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]+){0,1})(\s[A-ZÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]+(\s[A-ZÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]+){0,1}]');
		$this->form_validation->set_rules('felhnev', 'Felhasználónév', 'trim|required|is_unique[user.felhnev]|min_length[6]|max_length[100]');
		$this->form_validation->set_rules('szuldatum', 'Születési dátum', 'trim|required');
		$this->form_validation->set_rules('telszam', 'Telefonszám', 'trim|required|min_length[7]|max_length[30]');
		$this->form_validation->set_rules('email', 'E-mail cím', 'trim|required|valid_email');
		$this->form_validation->set_rules('telepules_id', 'Település');
        $this->form_validation->set_rules('cim', 'Cím', 'trim|required|min_length[8]|max_length[100]');
        $this->form_validation->set_rules('okmanyszam', 'Feltöltött okmány száma', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('feltetelek', 'Elfogadom a Felhasználói feltételeket és az Adatvédelmi irányelveket.','required');

		if (empty($_FILES['okmanykep']['name'])) {
			$this->form_validation->set_rules('okmanykep', 'Okmánykép feltöltése', 'required');
		}
        if (empty($_FILES['profilkep']['name'])) {
			$this->form_validation->set_rules('profilkep', 'Profilkép feltöltése', 'required');
		}

        $this->form_validation->set_rules('jelszo', 'Jelszó', 'trim|required|min_length[6]|max_length[100]');
        $this->form_validation->set_rules('jelszoujra', 'Jelszó megerősítése', 'trim|required|matches[jelszo]|min_length[6]|max_length[100]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			$this->session->set_flashdata('last_request', $this->input->post());
			redirect('kezdolap/regisztracio');
		}

		$okmanykep_nev = $_FILES['okmanykep']['name'];
        $kiterjesztes1 = pathinfo($okmanykep_nev, PATHINFO_EXTENSION);
        $idopont1 = date("Y_m_d_H_i_s");
        $felhnev1 = $this->input->post('felhnev');
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
        $fajlnev1 = $fajlnev1 . '_okmany_' . $idopont1 . '.' . $kiterjesztes1;

        $config1['upload_path']          = './uploads/';
        $config1['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
        $config1['max_size']             = 10240;
        $config1['file_name']            = $fajlnev1;

        $this->load->library('upload', $config1);

		if (!$this->upload->do_upload('okmanykep')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			$this->session->set_flashdata('last_request', $this->input->post());
			redirect('kezdolap/regisztracio');
		}

        $profilkep_nev = $_FILES['profilkep']['name'];
        $kiterjesztes2 = pathinfo($profilkep_nev, PATHINFO_EXTENSION);
        $idopont2 = date("Y_m_d_H_i_s");
        $felhnev2 = $this->input->post('felhnev');
        $fajlnev2 = $felhnev2; //egyelőre felhasználónév
        $fajlnev2 = preg_replace('/[áàãâä]/ui', 'a', $fajlnev2);
        $fajlnev2 = preg_replace('/[éèêë]/ui', 'e', $fajlnev2);
        $fajlnev2 = preg_replace('/[íìîï]/ui', 'i', $fajlnev2);
        $fajlnev2 = preg_replace('/[óòõôöő]/ui', 'o', $fajlnev2);
        $fajlnev2 = preg_replace('/[úùûüű]/ui', 'u', $fajlnev2);
        $fajlnev2 = preg_replace('/[ç]/ui', 'c', $fajlnev2);
        $fajlnev2 = preg_replace('/[^a-z0-9]/i', '_', $fajlnev2);
        $fajlnev2 = preg_replace('/_+/', '_', $fajlnev2);
        $fajlnev2 = strtolower($fajlnev2);
        $fajlnev2 = $fajlnev2 . '_profil_' . $idopont2 . '.' . $kiterjesztes2;

        $config2['upload_path']          = './uploads/';
        $config2['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
        $config2['max_size']             = 10240;
        $config2['file_name']            = $fajlnev2;

        $this->upload->initialize($config2);
        //$this->load->library('upload', $config2);
        
		if (!$this->upload->do_upload('profilkep')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			$this->session->set_flashdata('last_request', $this->input->post());
			redirect('kezdolap/regisztracio');
		}

		$data = [
            'nev' => $this->input->post('nev'),
            'felhnev' => $this->input->post('felhnev'),
            'szuldatum' => $this->input->post('szuldatum'),
            'telszam' => $this->input->post('telszam'),
            'email' => $this->input->post('email'),
            'telepules_id' => $this->input->post('telepules_id'),
            'cim' => $this->input->post('cim'),
            'okmanyszam' => $this->input->post('okmanyszam'),
            'okmanykep' => $fajlnev1,
            'profilkep' => $fajlnev2,
            'jelszo' => password_hash($this->input->post('jelszo'), PASSWORD_DEFAULT),
        ];
        $id = $this->user_model->user_rogzitese($data);
        $this->session->set_flashdata('success', "Sikeres regisztráció!");
        redirect('kezdolap');
	}

    public function bejelentkezes(){
        $this->load->view('header', ['oldal' => 'bejelentkezes']);
        $this->load->view('bejelentkezes');
        $this->load->view('footer');
    }

    public function bejelentkezes_post(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('felhnev', 'Felhasználónév', 'trim|required');
        $this->form_validation->set_rules('jelszo', 'Jelszó', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('last_request', $this->input->post());
            redirect('kezdolap/bejelentkezes');
        }
        $felhnev = $this->input->post('felhnev');

        $felhasznalo = $this->user_model->kereses_felhnev_alapjan($felhnev);

        //BEJELENTKEZÉS GÁTOLÁSA - PRÓBA
        if ($felhasznalo['hitelesites'] == "false") {
            $this->session->set_flashdata('error', "Sajnos még nem tud bejelentkezni, mert nem történt meg a regisztrációt követő hitelesítés!");
            $this->session->set_flashdata('last_request', $this->input->post());
            redirect('kezdolap/bejelentkezes');
        }
        //

        if (empty($felhasznalo)) {
            $this->session->set_flashdata('error', "Hibás felhasználónév vagy jelszó!");
            $this->session->set_flashdata('last_request', $this->input->post());
            redirect('kezdolap/bejelentkezes');
        }

        $jelszo = $this->input->post('jelszo');

        if (!password_verify($jelszo, $felhasznalo['jelszo'])) {
            $this->session->set_flashdata('error', "Hibás felhasználónév vagy jelszó!");
            $this->session->set_flashdata('last_request', $this->input->post());
            redirect('kezdolap/bejelentkezes');
        }

        $array = array(
            'user' => $felhasznalo
        );

        $this->session->set_userdata($array);


        $this->session->set_flashdata('success', "Sikeres bejelentkezés!");
        redirect('hirdetes_kereses');
    }

	public function kijelentkezes(){	
		$this->session->unset_userdata('user');
        $this->session->set_flashdata('success', "Sikeres kijelentkezés!");
        redirect('kezdolap');
	}

}


/* End of file Kezdolap.php */
