<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_do extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
        // $this->load->library('form_validation'); 
    }

    var $rules = array(
        array(
            'field' => 'id_ref_billing',
            'label' => 'Ref Billing',
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
                'nm_api' => $this->input->post('nm_api', TRUE),
                'link_api' => $this->input->post('link_api', TRUE),
                'opd_api' => $this->input->post('opd_api', TRUE),
                'nm_opd_api' => $this->input->post('nm_opd_api', TRUE),
                'tahun_api' => $this->input->post('tahun_api', TRUE),
                'keterangan_api' => $this->input->post('keterangan_api', TRUE),
                'created_api' => date('Y-m-d h:i:s'),
                'user_api' => $this->input->post('user_api', TRUE),
                'id_ref_billing' => $this->input->post('id_ref_billing', TRUE),
                'token' => $this->input->post('token', TRUE),
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
                $result = $this->Api_model->insert($data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/api');
    }

    function update()
    {
        if ($this->input->post()) {
            $data = array(
                'nm_api' => $this->input->post('nm_api', TRUE),
                'link_api' => $this->input->post('link_api', TRUE),
                'opd_api' => $this->input->post('opd_api', TRUE),
                'nm_opd_api' => $this->input->post('nm_opd_api', TRUE),
                'tahun_api' => $this->input->post('tahun_api', TRUE),
                'keterangan_api' => $this->input->post('keterangan_api', TRUE),
                'created_api' => date('Y-m-d h:i:s'),
                'user_api' => $this->input->post('user_api', TRUE),
                'id_ref_billing' => $this->input->post('id_ref_billing', TRUE),
                'token' => $this->input->post('token', TRUE),
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
                $result = $this->Api_model->update($this->input->post('id_api', TRUE), $data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/api');
    }

    function delete($id)
    {
        $id = decrypt_url($id);
        $result = $this->Api_model->doDelete($id);
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
