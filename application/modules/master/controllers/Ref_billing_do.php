<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ref_billing_do extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Ref_billing_model');
        // $this->load->library('form_validation'); 
    }

    var $rules = array(
        array(
            'field' => 'ref_billing',
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
                'ref_billing' => $this->input->post('ref_billing', TRUE),
                'id_kategori_ref_billing' => $this->input->post('id_kategori_ref_billing', TRUE),
                'id_jenis_ref_billing' => $this->input->post('id_jenis_ref_billing', TRUE),
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
                $result = $this->Ref_billing_model->insert($data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/ref_billing');
    }

    function update()
    {
        if ($this->input->post()) {
            $data = array(
                'ref_billing' => $this->input->post('ref_billing', TRUE),
                'id_kategori_ref_billing' => $this->input->post('id_kategori_ref_billing', TRUE),
                'id_jenis_ref_billing' => $this->input->post('id_jenis_ref_billing', TRUE),
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
                $result = $this->Ref_billing_model->update($this->input->post('id_ref_billing', TRUE), $data);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/jenis_ref_billing');
    }

    function delete($id)
    {
        $id = decrypt_url($id);
        $result = $this->Jenis_ref_billing_model->doDelete($id);
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
