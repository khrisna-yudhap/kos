<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentikasi extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Authentikasi_model');
        $this->load->model('Group_model');
        $this->load->model('Menu_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Group_model->json();
            die;
        } else {

            $data['title'] = 'Authentikasi';

            $view["content"] = $this->load->view('authentikasi_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function update($id)
    {
        $row = $this->Group_model->getDataById(decrypt_url($id));

        if ($row) {

            $data['data'] = $this->Authentikasi_model->getAuthenticationMenu(decrypt_url($id));
            $data['button'] = 'update';
            $data['groupId'] = $id;
            $data['group'] = $this->Group_model->getDataByIdArr(decrypt_url($id));
            // print_r($data['data']); die;
            $view["content"] = $this->load->view('authentikasi_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sistem/authentikasi'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
