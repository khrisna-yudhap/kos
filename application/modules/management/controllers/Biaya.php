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
        if ($mode == 'find') {
            // print_r($this->input->post());die;
            $postData = $this->input->post('KotaId');

            // get data 
            $data = $this->Biaya_model->getLokasiKota($postData);
            echo json_encode($data);
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

    function add()
    {

        $data = array(
            'button' => 'add',
            'action' => site_url('management/Biaya_do/add'),
            'BiayaId' => set_value('BiayaId'),
            'KotaId' => set_value('KotaId'),
            'LokasiId' => set_value('LokasiId'),
            'BiayaHarian' => set_value('BiayaHarian'),
            'BiayaMingguan' => set_value('BiayaMingguan'),
            'BiayaBulanan' => set_value('BiayaBulanan'),
        );

        $data["lokasi"] = $this->Biaya_model->getLokasi();
        $data["kota"] = $this->Biaya_model->getKota();
        $view["content"] = $this->load->view('Biaya_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Biaya_model->getDataById($id);

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('management/Biaya_do/update'),
                'BiayaId' => set_value('BiayaId', $id),
                'KotaId' => set_value('KotaId', $row->KotaId),
                'LokasiId' => set_value('LokasiId', $row->LokasiId),
                'BiayaHarian' => set_value('BiayaHarian', $row->BiayaHarian),
                'BiayaMingguan' => set_value('BiayaMingguan', $row->BiayaMingguan),
                'BiayaBulanan' => set_value('BiayaBulanan', $row->BiayaBulanan),
            );

            $data["lokasi_terpilih"] = $this->Biaya_model->getLokasiById($row->LokasiId);
            $data["kota"] = $this->Biaya_model->getKota();
            $data["lokasi"] = $this->Biaya_model->getLokasi();
            $view["content"] = $this->load->view('Biaya_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('management/biaya'));
        }
    }
}
