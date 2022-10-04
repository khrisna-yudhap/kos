<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_ref_billing extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_ref_billing_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Jenis_ref_billing_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Jenis Ref Billing';

            $view["content"] = $this->load->view('jenis_ref_billing_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {
        // $this->load->model('menu_model');

        // $data['aksi'] = $this->menu_model->getAksi();
        // $data['menu'] = $this->Menu_model->GetMenu();
        // $data['menuaksi'] = $this->menu_model->getMenuAksi($menuId = '');


        $data = array(
            'button' => 'add',
            'action' => site_url('master/jenis_ref_billing_do/add'),
            'id_jenis_ref_billing' => set_value('id_jenis_ref_billing'),
            'jenis_ref_billing' => set_value('jenis_ref_billing'),
        );

        $view["content"] = $this->load->view('jenis_ref_billing_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->Jenis_ref_billing_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('master/jenis_ref_billing_do/update'),
                'id_jenis_ref_billing' => set_value('id_jenis_ref_billing', $id),
                'jenis_ref_billing' => set_value('jenis_ref_billing', $row->jenis_ref_billing),
            );

            $view["content"] = $this->load->view('jenis_ref_billing_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/jenis_ref_billing'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
