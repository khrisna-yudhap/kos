<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengakses extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengakses_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Pengakses_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Pengakses';

            $view["content"] = $this->load->view('pengakses_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {
        $data = array(
            'button' => 'add',
            'action' => site_url('master/pengakses_do/add'),
            'id_pengakses' => set_value('id_pengakses'),
            'nm_pengakses' => set_value('nm_pengakses'),
            'kode_bank' => set_value('kode_bank'),
        );

        $view["content"] = $this->load->view('pengakses_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Pengakses_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('master/pengakses_do/update'),
                'id_pengakses' => set_value('id_pengakses', $row->id_pengakses),
                'nm_pengakses' => set_value('nm_pengakses', $row->nm_pengakses),
                'kode_bank' => set_value('kode_bank', $row->kode_bank),
            );

            $view["content"] = $this->load->view('pengakses_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/pengakses'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
