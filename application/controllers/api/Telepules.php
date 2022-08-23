<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH. 'libraries/REST_Controller.php';

class Telepules extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('telepules_model');
    }

    public function index_get($id = 0)
    {   
        $adatok = [];
        $error = false;
        $message = "Település sikeresen lekérdezve.";
        $response_code = REST_Controller::HTTP_OK;
        if ($id == 0) {
            $adatok = $this->telepules_model->get_all();
        } else{
            $adatok = $this->telepules_model->get_by_id($id);
            if (is_null($adatok)) {
                $error = true;
                $message = "A megadott azonosítóval nem található település.";
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


    public function telepulesekSzama_get(){   
        $adatok = [];
        $response_code = REST_Controller::HTTP_OK;
        $adatok = $this->telepules_model->telepulesekSzama();
        $data = [
            'adatok' => $adatok,
        ];
        $this->response($data, $response_code);
}

}