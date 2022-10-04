<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akses_api_do extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Akses_api_model');
        // $this->load->library('form_validation'); 
    }

    var $rules = array(
        array(
            'field' => 'id_pengakses',
            'label' => 'Nama Pengakses',
            'rules' => 'trim|required'
        ),
    );

    // function checkStatus($status)
    // {
    //     if ($this->input->post('is_child') == '1' && $this->input->post('MenuModule') == '' || $this->input->post('MenuParent') == '') {
    //         $this->form_validation->set_message("checkStatus", '<br> %s harus diisi.');
    //         return FALSE;
    //     } else {
    //         return TRUE;
    //     }
    // }

    function add()
    {
        // print_r($this->input->post()); die;
        if ($this->input->post()) {
            $data = array(
                'id_api' => $this->input->post('id_api', TRUE),
                'id_pengakses' => $this->input->post('id_pengakses', TRUE),
                'ip_pengakses' => $this->input->post('ip_pengakses', TRUE),
                'status_akses' => $this->input->post('status_akses', TRUE),
            );

            // print_r($_POST);
            // die;

            $this->load->library('form_validation');
            $config = $this->rules;
            $this->form_validation->set_message('required', '<br> %s harus diisi.');
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                die;
            } else {
                $result = $this->Akses_api_model->insert($data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/akses_api');
    }

    function update()
    {
        if ($this->input->post()) {
            $data = array(
                'id_api' => $this->input->post('id_api', TRUE),
                'id_pengakses' => $this->input->post('id_pengakses', TRUE),
                'ip_pengakses' => $this->input->post('ip_pengakses', TRUE),
                'status_akses' => $this->input->post('status_akses', TRUE),
            );

            // print_r($_POST); die;

            $this->load->library('form_validation');
            $config = $this->rules;
            $this->form_validation->set_message('required', '<br> %s harus diisi.');
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                die;
            } else {
                // echo 'aaa'; die;       
                $result = $this->Akses_api_model->update($this->input->post('id_pengakses', TRUE), $data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/akses_api');
    }

    function delete($id)
    {
        $id = decrypt_url($id);
        $result = $this->Akses_api_model->delete($id);
        if ($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }
}

/* 
 * End of file menu_do.php 
 * File location ./application/controllers/system/menu_do.php
 */
