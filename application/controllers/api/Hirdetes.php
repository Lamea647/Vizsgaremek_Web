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
        $message = "Hirdetés sikeresen lekérdezve.";
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

}