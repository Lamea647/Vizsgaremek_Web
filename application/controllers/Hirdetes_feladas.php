<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hirdetes_feladas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('hirdetes_feladas_model');
        $this->load->model('telepules_model');
        $this->load->model('regisztracio_model');
        $this->load->library('session');
    }

    public function hirdetes_feladas(){
        $kategoria_nev = $this->hirdetes_feladas_model->kategoria_lista();
        //print_r($kategoria_nev);
        $data['kategoria_nev'] = $kategoria_nev;

        //$szam_kategoria változóba elmenteni a Hirdetes_feladas_model kategoriakSzama() metódus eredményét, és belerakni a $data tömbbe
        $szam_kategoria = $this->hirdetes_feladas_model->kategoriakSzama();
        $data['szam_kategoria'] = $szam_kategoria;

        $telepules = $this->telepules_model->get_all();
        $data['telepules'] = $telepules;

        $szam = $this->regisztracio_model->telepulesekSzama();
        $data['szam'] = $szam;

        $this->load->view('header', ['oldal' => 'hirdetes_feladasa']);
        $this->load->view('hirdetes_feladas', $data);
        $this->load->view('footer');
    }

    //PRÓBA - hirdetés feladáshoz
    public function hirdetes_post()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kezdo_idopont', 'Kezdő időpont', 'trim|required');
		$this->form_validation->set_rules('zaro_idopont', 'Záró időpont', 'trim|required');
		$this->form_validation->set_rules('leiras', 'Leírás', 'trim|required');
        $this->form_validation->set_rules('hirdetes_cim', 'Cím', 'trim|required');
        $this->form_validation->set_rules('telszam_2', 'Másodlagos telefonszám', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			$this->session->set_flashdata('last_request', $this->input->post());
			redirect('hirdetes_feladas/hirdetes_feladas');
		}

		$data = [
            'kezdo_idopont' => $this->input->post('kezdo_idopont'),
            'zaro_idopont' => $this->input->post('zaro_idopont'),
            'kategoria_id' => $this->input->post('kategoria_id'),
            'telszam_2' => $this->input->post('telszam_2'),
            'leiras' => $this->input->post('leiras'),
            'telepules_id' => $this->input->post('telepules_id'),
            'hirdetes_cim' => $this->input->post('hirdetes_cim'),
            'hirdeto_id' => $_SESSION['user']['user_id']
        ];
        $id = $this->hirdetes_feladas_model->insert($data);
        $this->session->set_flashdata('success', "Sikeresen feladta hirdetését!");
        redirect('profil/profil_megtekintes');
	}


}

/* End of file Hirdetes_feladas.php */


