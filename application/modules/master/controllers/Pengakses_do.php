<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengakses_do extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengakses_model');
        // $this->load->library('form_validation'); 
    }

    var $rules = array(
        array(
            'field' => 'nm_pengakses',
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
                'nm_pengakses' => $this->input->post('nm_pengakses', TRUE),
                'kode_bank' => $this->input->post('kode_bank', TRUE),
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
                $result = $this->Pengakses_model->insert($data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/pengakses');
    }

    function update()
    {
        if ($this->input->post()) {
            $data = array(
                'nm_pengakses' => $this->input->post('nm_pengakses', TRUE),
                'kode_bank' => $this->input->post('kode_bank', TRUE),
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
                $result = $this->Pengakses_model->update($this->input->post('id_pengakses', TRUE), $data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/pengakses');
    }

    function delete($id)
    {
        $id = decrypt_url($id);
        $result = $this->Pengakses_model->delete($id);
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
