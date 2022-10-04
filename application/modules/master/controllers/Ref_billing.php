<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ref_billing extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Ref_billing_model');
        $this->load->model('Kategori_ref_billing_model');
        $this->load->model('Jenis_ref_billing_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Ref_billing_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Ref Billing';

            $view["content"] = $this->load->view('ref_billing_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {
        $data = array(
            'button' => 'add',
            'action' => site_url('master/ref_billing_do/add'),
            'id_ref_billing' => set_value('id_ref_billing'),
            'ref_billing' => set_value('ref_billing'),
            'id_kategori_ref_billing' => set_value('id_kategori_ref_billing'),
            'id_jenis_ref_billing' => set_value('id_jenis_ref_billing'),
        );

        $data['kategori'] = $this->Kategori_ref_billing_model->get_all();
        $data['jenis'] = $this->Jenis_ref_billing_model->get_all();

        $view["content"] = $this->load->view('ref_billing_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Ref_billing_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('master/ref_billing_do/update'),
                'id_ref_billing' => set_value('id_ref_billing', $row->id_ref_billing),
                'ref_billing' => set_value('ref_billing', $row->ref_billing),
                'id_kategori_ref_billing' => set_value('id_kategori_ref_billing', $row->id_kategori_ref_billing),
                'id_jenis_ref_billing' => set_value('id_jenis_ref_billing', $row->id_jenis_ref_billing),
            );
            $data['kategori'] = $this->Kategori_ref_billing_model->get_all();
            $data['jenis'] = $this->Jenis_ref_billing_model->get_all();

            $view["content"] = $this->load->view('ref_billing_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/ref_billing'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
