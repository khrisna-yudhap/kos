<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Kamar_model');
        $this->load->library('form_validation');
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Kamar_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Master Kamar';

            $view["content"] = $this->load->view('kamar_list', $data, TRUE);
            $this->load_view($view);
        }
    }
}
