<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('Ref_billing_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Api_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'API';

            $view["content"] = $this->load->view('api_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {
        $data = array(
            'button' => 'add',
            'action' => site_url('master/api_do/add'),
            'id_api' => $this->input->post('id_api', TRUE),
            'nm_api' => $this->input->post('nm_api', TRUE),
            'link_api' => $this->input->post('link_api', TRUE),
            'opd_api' => $this->input->post('opd_api', TRUE),
            'nm_opd_api' => $this->input->post('nm_opd_api', TRUE),
            'tahun_api' => $this->input->post('tahun_api', TRUE),
            'keterangan_api' => $this->input->post('keterangan_api', TRUE),
            'created_api' => $this->input->post('created_api', TRUE),
            'user_api' => $this->input->post('user_api', TRUE),
            'id_ref_billing' => $this->input->post('id_ref_billing', TRUE),
            'token' => $this->input->post('token', TRUE),
        );

        $data['ref_billing'] = $this->Ref_billing_model->get_all();

        $view["content"] = $this->load->view('api_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Api_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('master/api_do/update'),
                'id_api' => set_value('id_api', $row->id_api),
                'nm_api' => set_value('nm_api', $row->nm_api),
                'link_api' => set_value('link_api', $row->link_api),
                'opd_api' => set_value('opd_api', $row->opd_api),
                'nm_opd_api' => set_value('nm_opd_api', $row->nm_opd_api),
                'tahun_api' => set_value('tahun_api', $row->tahun_api),
                'keterangan_api' => set_value('keterangan_api', $row->keterangan_api),
                'created_api' => set_value('created_api', $row->created_api),
                'user_api' => set_value('user_api', $row->user_api),
                'id_ref_billing' => set_value('id_ref_billing', $row->id_ref_billing),
                'token' => set_value('token', $row->token),
            );

            $data['ref_billing'] = $this->Ref_billing_model->get_all();

            $view["content"] = $this->load->view('api_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/api'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
