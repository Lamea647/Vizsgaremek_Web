<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH. 'libraries/REST_Controller.php';

class Kategoria extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('kategoria_model');
    }

    public function index_get($id = 0)
    {   
        $adatok = [];
        $error = false;
        $message = "Kategória sikeresen lekérdezve.";
        $response_code = REST_Controller::HTTP_OK;
        if ($id == 0) {
            $adatok = $this->kategoria_model->get_all();
        } else{
            $adatok = $this->kategoria_model->get_by_id($id);
            if (is_null($adatok)) {
                $error = true;
                $message = "A megadott azonosítóval nem található kategória.";
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

}