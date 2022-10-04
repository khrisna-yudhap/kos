<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akses_api extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Akses_api_model');
        $this->load->model('Api_model');
        $this->load->model('Pengakses_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Akses_api_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Akses API';

            $view["content"] = $this->load->view('akses_api_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {
        $data = array(
            'button' => 'add',
            'action' => site_url('master/akses_api_do/add'),
            'id_api' => set_value('id_api'),
            'id_pengakses' => set_value('id_pengakses'),
            'ip_pengakses' => set_value('ip_pengakses'),
            'status_akses' => set_value('status_akses'),
        );
        $data['api'] = $this->Api_model->get_all();
        $data['pengakses'] = $this->Pengakses_model->get_all();

        $view["content"] = $this->load->view('akses_api_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Akses_api_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('master/akses_api_do/update'),
                'id_api' => set_value('id_api', $row->id_api),
                'id_pengakses' => set_value('id_pengakses', $row->id_pengakses),
                'ip_pengakses' => set_value('ip_pengakses', $row->ip_pengakses),
                'status_akses' => set_value('status_akses', $row->status_akses),
            );

            $view["content"] = $this->load->view('akses_api_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/akses_api'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
