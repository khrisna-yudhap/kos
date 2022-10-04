<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Parameter_api extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Parameter_api_model');
        $this->load->model('Api_model');
        $this->load->model('Ref_billing_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Parameter_api_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Parameter API';

            $view["content"] = $this->load->view('parameter_api_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {
        $data = array(
            'button' => 'add',
            'action' => site_url('master/parameter_api_do/add'),
            'id_parameter' => set_value('id_parameter'),
            'id_api' => set_value('id_api'),
            'posisi_parameter' => set_value('posisi_parameter'),
            'nm_parameter' => set_value('nm_parameter'),
            'val_parameter' => set_value('val_parameter'),
            'ket_parameter' => set_value('ket_parameter'),
            'tipe_parameter' => set_value('tipe_parameter'),
        );

        $data['api'] = $this->Api_model->get_all();

        $view["content"] = $this->load->view('parameter_api_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Parameter_api_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('master/parameter_api_do/update'),
                'id_parameter' => set_value('id_parameter', $row->id_parameter),
                'id_api' => set_value('id_api', $row->id_api),
                'posisi_parameter' => set_value('posisi_parameter', $row->posisi_parameter),
                'nm_parameter' => set_value('nm_parameter', $row->nm_parameter),
                'val_parameter' => set_value('val_parameter', $row->val_parameter),
                'ket_parameter' => set_value('ket_parameter', $row->ket_parameter),
                'tipe_parameter' => set_value('tipe_parameter', $row->tipe_parameter),
            );

            $data['api'] = $this->Api_model->get_all();

            $view["content"] = $this->load->view('parameter_api_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/parameter_api'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
