<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persewaan extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Persewaan_model');
        $this->load->library('form_validation');
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Persewaan_model->json();
            die;
        }
        if ($mode == 'findLokasi') {
            // print_r($this->input->post());die;
            $postData = $this->input->post('KotaId');

            // get data 
            $data = $this->Persewaan_model->getLokasiKota($postData);
            echo json_encode($data);
            die;
        }
        if ($mode == 'findKamar') {
            $postData = $this->input->post('LokasiId');
            $data = $this->Persewaan_model->getKamarLokasi($postData);
            echo json_encode($data);
            die;
        }
        if ($mode == 'checkHarga') {
            $LokasiId = $this->input->post('LokasiId');
            $tglAwal = $this->input->post('TanggalAwal');
            $tglAkhir = $this->input->post('TanggalAkhir');

            $data = $this->Persewaan_model->checkHarga($LokasiId, $tglAwal, $tglAkhir);
            echo json_encode($data);
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Penyewa Kos';

            $view["content"] = $this->load->view('persewaan_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {

        $data = array(
            'button' => 'add',
            'action' => site_url('management/Persewaan_do/add'),
            'checkHarga' => site_url('management/Persewaan_do/checkHarga'),
            'SewaId' => set_value('SewaId'),
            'PengelolaId' => set_value('PengelolaId'),
            'KotaId' => set_value('KotaId'),
            'LokasiId' => set_value('LokasiId'),
            'KamarId' => set_value('KamarId'),
            'NamaPenyewa' => set_value('NamaPenyewa'),
            'NomorHp' => set_value('NomorHp'),
            'NomorIdentitas' => set_value('NomorIdentitas'),
            'JenisSewa' => set_value('JenisSewa'),
            'BiayaSewa' => set_value('BiayaSewa'),
            'TanggalAwal' => set_value('TanggalAwal'),
            'TanggalAkhir' => set_value('TanggalAkhir'),
            'StatusSewa' => set_value('StatusSewa'),
            'Keterangan' => set_value('Keterangan')

        );

        $data["lokasi"] = $this->Persewaan_model->getLokasi();
        $data["kota"] = $this->Persewaan_model->getKota();
        $view["content"] = $this->load->view('persewaan_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Persewaan_model->getDataById($id);

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('management/Persewaan_do/update'),
                'SewaId' => set_value('SewaId', $id),
                'PengelolaId' => set_value('PengelolaId', 1),
                'KotaId' => set_value('KotaId', $row->KotaId),
                ''
            );


            $view["content"] = $this->load->view('persewaan_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('management/Persewaan'));
        }
    }
}
