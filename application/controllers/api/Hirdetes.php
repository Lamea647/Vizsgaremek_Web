<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH. 'libraries/REST_Controller.php';

class Hirdetes extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('hirdetes_model');
    }

    public function index_get($id = 0)
    {   
        $adatok = [];
        $error = false;
        $message = "Összes hirdetés sikeresen lekérdezve.";
        $response_code = REST_Controller::HTTP_OK;
        if ($id == 0) {
            $adatok = $this->hirdetes_model->get_all();
        } else{
            $adatok = $this->hirdetes_model->get_by_id($id);
            if (is_null($adatok)) {
                $error = true;
                $message = "A megadott azonosítóval nem található hirdetés.";
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
        $adatok['kategoria_id'] = $this->post('kategoria_id');
        $adatok['hirdeto_id'] = $this->post('hirdeto_id');
        $adatok['kezdo_idopont'] = $this->post('kezdo_idopont');
        $adatok['zaro_idopont'] = $this->post('zaro_idopont');
        $adatok['leiras'] = $this->post('leiras');
        $adatok['hirdetes_telszam'] = $this->post('hirdetes_telszam');
        $adatok['telepules_id'] = $this->post('telepules_id');
        $adatok['hirdetes_cim'] = $this->post('hirdetes_cim');
        $id = $this->hirdetes_model->hirdetes_rogzitese($adatok);
        $this->response($adatok, REST_Controller::HTTP_CREATED);
    }

    public function index_delete($id)
    {
        $hirdetes = $this->hirdetes_model->hirdetes_lekerdezese_id_alapjan($id);
        $resposone_code = REST_Controller::HTTP_OK;
        $data = [];
        if (count($hirdetes) == 0) {
            $resposone_code = REST_Controller::HTTP_NOT_FOUND;
            $data = ['message' => 'A megadott azonosítóval nem található hirdetés: '.$id, "success" => false];
        } else {
            $this->hirdetes_model->hirdetes_torlese($id);
            $data = ['message' => 'Hirdetés sikeresen törölve: '.$id, "success" => true];
        }
        $this->response($data, $resposone_code);
        
    }

}