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
        $userAdatai = $this->user_model->user_lekerdezese_id_alapjan($_SESSION['user']['user_id']);
        $data['userAdatai'] = $userAdatai;

        $telepules = $this->telepules_model->get_by_id($userAdatai[0]['telepules_id']);
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

        //ÚJ!!!!!!!! lekérdezések alapján Saját hirdetéseim részhez:

        $kategoriaKepekSajatHirdetesek = $this->hirdetes_model->kategoriaKepekSajatHirdetesek($_SESSION['user']['user_id']);
        $data['kategoriaKepekSajatHirdetesek'] = $kategoriaKepekSajatHirdetesek;

        $hirdetesIdkSajatHirdetesek = $this->hirdetes_model->hirdetesIdkSajatHirdetesek($_SESSION['user']['user_id']);
        $data['hirdetesIdkSajatHirdetesek'] = $hirdetesIdkSajatHirdetesek;

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

        $userAdatai = $this->user_model->user_lekerdezese_id_alapjan($_SESSION['user']['user_id']);
        $data['userAdatai'] = $userAdatai;

        $this->load->view('header');
        $this->load->view('modositott_profil', $data);
        $this->load->view('footer');
    }

    //személyes adatok módosítása - 1. form
    public function profil_modositas_post($user_id){
        /*
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
        */

        $telepules_id = $this->input->post('telepules_id');
        $cim= $this->input->post('cim');
        $email = $this->input->post('email');
        $telszam= $this->input->post('telszam');
        //$user_id = $this->input->post('user_id');

		$data['telepules_id'] = $telepules_id;
        $data['cim'] = $cim;
        $data['telszam'] = $telszam;
        $data['email'] = $email;
            
        $this->load->model('user_model');
        $this->user_model->user_modositasa($user_id, $data);
        $this->session->set_flashdata('success', "Sikeresen módosította profilját!");
        redirect('profil/profil_megtekintes');
	}

    //jelszó módosítása - 2. form
    public function profil_modositas_jelszo_post($user_id){
        $jelenlegiJelszo = $this->input->post('jelenlegi_jelszo');
        $jelszo = $this->input->post('jelszo');
        $jelszoujra = $this->input->post('ujjelszoujra');
        
        if (!password_verify($jelenlegiJelszo, $_SESSION['user']['jelszo'])) {
            $this->session->set_flashdata('error', "Hibásan adta meg jelenlegi jelszavát!");
            redirect('profil/profil_modositas');
        }else if($jelszo !== $jelszoujra){
            $this->session->set_flashdata('error', "Nem egyeznek meg az újonnan megadott jelszavak!");
            redirect('profil/profil_modositas');
        }else{
            $jelszo = password_hash($this->input->post('jelszo'), PASSWORD_DEFAULT);
            $this->load->model('user_model');
            $this->user_model->userJelszoModositasa($jelszo, $user_id);
            $this->session->set_flashdata('success', "Sikeresen módosította jelszavát!");
            redirect('profil/profil_megtekintes');
        }
	}


    public function profil_torles(){
        $user_id = $_SESSION['user']['user_id'];
        $this->user_model->user_torlese($user_id);
        redirect('kezdolap/kijelentkezes');
    }

    public function hirdetes_torles($hirdetes_id){
        $this->hirdetes_model->sajatHirdetesTorlese($hirdetes_id);
        redirect('profil/profil_megtekintes');
    }

    public function hirdetes_elfogadasa($hirdetes_id){
        $this->jelentkezes_model->jelentkezesJovahagyasa($hirdetes_id);
        $this->session->set_flashdata('success', "Sikeresen elfogadta az önkéntes jelentkezését!");
        redirect('profil/profil_megtekintes');
    }

    public function hirdetes_elutasitasa($hirdetes_id){
        $this->jelentkezes_model->jelentkezesTorleseElutasitasMiatt($hirdetes_id);
        $this->session->set_flashdata('success', "Sikeresen elutasította az önkéntes jelentkezését!");
        redirect('profil/profil_megtekintes');
    }


}

/* End of file Profil.php */
