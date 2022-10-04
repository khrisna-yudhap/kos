<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Kota_model');
        $this->load->library('form_validation');
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Kota_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Kabupaten / Kota';

            $view["content"] = $this->load->view('Kota_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {

        $data = array(
            'button' => 'add',
            'action' => site_url('management/kota_do/add'),
            'KotaId' => set_value('KotaId'),
            'KotaName' => set_value('KotaName'),
            'KotaActive' => set_value('1'),
        );
        
        $view["content"] = $this->load->view('Kota_form', $data, TRUE);
        $this->load_view($view);
    }
}
