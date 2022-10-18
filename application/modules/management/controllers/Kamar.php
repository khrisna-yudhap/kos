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
        if($mode == 'find'){
            // print_r($this->input->post());die;
            $postData = $this->input->post('KotaId');

            // get data 
            $data = $this->Kamar_model->getLokasiKota($postData);
            echo json_encode($data);die;
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


    function add()
    {

        $data = array(
            'button' => 'add',
            'action' => site_url('management/Kamar_do/add'),
            'KamarName' => set_value('KamarName'),
            'KamarId' => set_value('KamarId'),
            'LokasiId' => set_value('LokasiId'),
            'KotaId' => set_value('KotaId'),
        );
        $data["lokasi_terpilih"] = "";
        $data["lokasi"] = $this->Kamar_model->getLokasi();
        $data["kota"] = $this->Kamar_model->getKota();
        $view["content"] = $this->load->view('Kamar_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $this->load->model('Kamar_model');
        $row = $this->Kamar_model->getDataById($id);

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('management/Kamar_do/update'),
                'KamarId' => set_value('KamarId', $id),
                'KamarName' => set_value('KamarName', $row->KamarName),
                'LokasiId' => set_value('LokasiId', $row->LokasiId),
                'KotaId' => set_value('KotaId', $row->KotaId),
            );
            $data["lokasi_terpilih"] = $this->Kamar_model->getLokasiById($row->LokasiId);
            $data["kota"] = $this->Kamar_model->getKota();
            $data["lokasi"] = $this->Kamar_model->getLokasi();
            $view["content"] = $this->load->view('kamar_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('management/kamar'));
        }
    }

    public function getLokasiKota(){ 
        // POST data 
        $postData = $this->input->post('KotaId');

        // get data 
        $data = $this->Kamar_model->getLokasiKota($postData);
        echo json_encode($data); 
      }
}
