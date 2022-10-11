<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biaya extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Biaya_model');
        $this->load->library('form_validation');
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Biaya_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Biaya Sewa Kamar';

            $view["content"] = $this->load->view('biaya_list', $data, TRUE);
            $this->load_view($view);
        }
    }
}
