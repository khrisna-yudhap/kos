<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class kategori_ref_billing extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_ref_billing_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $kategori = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->kategori_ref_billing_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'kategori Ref Billing';

            $view["content"] = $this->load->view('kategori_ref_billing_list', $data, TRUE);
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
            'action' => site_url('master/kategori_ref_billing_do/add'),
            'id_kategori_ref_billing' => set_value('id_kategori_ref_billing'),
            'kategori_ref_billing' => set_value('kategori_ref_billing'),
        );

        $view["content"] = $this->load->view('kategori_ref_billing_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $row = $this->kategori_ref_billing_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('master/kategori_ref_billing_do/update'),
                'id_kategori_ref_billing' => set_value('id_kategori_ref_billing', $id),
                'kategori_ref_billing' => set_value('kategori_ref_billing', $row->kategori_ref_billing),
            );

            $view["content"] = $this->load->view('kategori_ref_billing_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master/kategori_ref_billing'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
