<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Parameter_api_do extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Parameter_api_model');
        // $this->load->library('form_validation'); 
    }

    var $rules = array(
        array(
            'field' => 'id_api',
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
                'id_api' => $this->input->post('id_api', TRUE),
                'posisi_parameter' => $this->input->post('posisi_parameter', TRUE),
                'nm_parameter' => $this->input->post('nm_parameter', TRUE),
                'val_parameter' => $this->input->post('val_parameter', TRUE),
                'ket_parameter' => $this->input->post('ket_parameter', TRUE),
                'tipe_parameter' => $this->input->post('tipe_parameter', TRUE),
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
                $result = $this->Parameter_api_model->insert($data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/parameter_api');
    }

    function update()
    {
        if ($this->input->post()) {
            $data = array(
                'id_api' => $this->input->post('id_api', TRUE),
                'posisi_parameter' => $this->input->post('posisi_parameter', TRUE),
                'nm_parameter' => $this->input->post('nm_parameter', TRUE),
                'val_parameter' => $this->input->post('val_parameter', TRUE),
                'ket_parameter' => $this->input->post('ket_parameter', TRUE),
                'tipe_parameter' => $this->input->post('tipe_parameter', TRUE),
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
                $result = $this->Parameter_api_model->update($this->input->post('id_api', TRUE), $data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/parameter_api');
    }

    function delete($id)
    {
        $id = decrypt_url($id);
        $result = $this->Parameter_api_model->doDelete($id);
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
