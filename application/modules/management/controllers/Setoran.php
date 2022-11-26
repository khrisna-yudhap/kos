<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setoran extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Setoran_model');
        $this->load->library('form_validation');
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Setoran_model->json();
            die;
        }
        if ($mode == 'checkHarga') {
            $LokasiId = $this->input->post('LokasiId');
            $tglAwal = $this->input->post('TanggalAwal');
            $tglAkhir = $this->input->post('TanggalAkhir');

            $data = $this->Setoran_model->checkHarga($LokasiId, $tglAwal, $tglAkhir);
            echo json_encode($data);
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Penyewa Kos';

            $view["content"] = $this->load->view('setoran_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {

        $data = array(
            'button' => 'add',
            'action' => site_url('management/Setoran_do/add'),
            'checkHarga' => site_url('management/Setoran_do/checkHarga'),
            'SetorId' => set_value('SetorId'),
            'PengelolaId' => set_value('PengelolaId'),
            'LokasiId' => set_value('LokasiId'),
            'JumlahSetor' => set_value('JumlahSetor'),
            'TanggalAwal' => set_value('TanggalAwal'),
            'TanggalAkhir' => set_value('TanggalAkhir'),
            'StatusSetor' => set_value('StatusSetor'),
            'Keterangan' => set_value('Keterangan')

        );

        $data["lokasi"] = $this->Setoran_model->getLokasi();
        $view["content"] = $this->load->view('setoran_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Setoran_model->getDataById($id);

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('management/Setoran_do/update'),
                'SetorId' => set_value('SetorId', $id),
                'PengelolaId' => set_value('PengelolaId', 1),
                ''
            );


            $view["content"] = $this->load->view('setoran_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('management/Setoran'));
        }
    }
}
