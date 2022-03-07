<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH. 'libraries/REST_Controller.php';

class User extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index_get($id = 0)
    {   
        $adatok = [];
        $error = false;
        $message = "Felhasználó sikeresen lekérdezve.";
        $response_code = REST_Controller::HTTP_OK;
        if ($id == 0) {
            $adatok = $this->user_model->get_all();
        } else{
            $adatok = $this->user_model->get_by_id($id);
            if (is_null($adatok)) {
                $error = true;
                $message = "A megadott azonosítóval nem található felhasználó.";
                $adatok = [];
                $response_code = REST_Controller::HTTP_NOT_FOUND;
            } else{
                $adatok = [$adatok];
            }
        }
        $data = [
            'adatok' => $adatok,
            'error' => $error,
            'message' => $message,
        ];
        $this->response($data, $response_code);
    }

    public function index_post()
    {
        $adatok['nev'] = $this->post('nev');
        $adatok['felhnev'] = $this->post('felhnev');
        $adatok['jelszo'] = $this->post('jelszo');
        $adatok['cim'] = $this->post('cim');
        $adatok['szuldatum'] = $this->post('szuldatum');
        $adatok['telszam'] = $this->post('telszam');
        $adatok['email'] = $this->post('email');
        $adatok['profilkep'] = $this->post('profilkep');
        $adatok['okmanykep'] = $this->post('okmanykep');
        $adatok['okmanyszam'] = $this->post('okmanyszam');
        $adatok['telepules_id'] = $this->post('telepules_id');
        $id = $this->user_model->user_rogzitese($adatok);
        $this->response($adatok, REST_Controller::HTTP_CREATED);
    }



    

    

    

}