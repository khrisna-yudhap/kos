<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Lokasi_model');
        $this->load->library('form_validation');
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Lokasi_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Lokasi';

            $view["content"] = $this->load->view('Lokasi_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {

        $data = array(
            'button' => 'add',
            'action' => site_url('management/Lokasi_do/add'),
            'LokasiId' => set_value('LokasiId'),
            'LokasiName' => set_value('LokasiName'),
            'KotaId' => set_value('KotaId'),
        );

        $data["kota"] = $this->Lokasi_model->getKota();
        $view["content"] = $this->load->view('Lokasi_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $this->load->model('Lokasi_model');
        $row = $this->Lokasi_model->getDataById($id);

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('management/Lokasi_do/update'),
                'LokasiId' => set_value('LokasiId', $id),
                'LokasiName' => set_value('LokasiName', $row->LokasiName),
                'KotaId' => set_value('KotaId', $row->KotaId),
            );
            $data["kota"] = $this->Lokasi_model->getKota();

            $view["content"] = $this->load->view('lokasi_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('management/lokasi'));
        }
    }
}
