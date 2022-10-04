<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_ref_billing_do extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_ref_billing_model');
        // $this->load->library('form_validation'); 
    }

    var $rules = array(
        array(
            'field' => 'kategori_ref_billing',
            'label' => 'Kategori Ref Billing',
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
            $id_kategori_ref_billing = $this->input->post('id_kategori_ref_billing');
            $kategori_ref_billing = $this->input->post('kategori_ref_billing');

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
                $result = $this->Kategori_ref_billing_model->doAdd(
                    $id_kategori_ref_billing,
                    $kategori_ref_billing
                );
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/kategori_ref_billing');
    }

    function update()
    {
        if ($this->input->post()) {
            $kategori_ref_billing = $this->input->post('kategori_ref_billing');
            $id_kategori_ref_billing = decrypt_url($this->input->post('id_kategori_ref_billing'));

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
                $result = $this->Kategori_ref_billing_model->doUpdate($kategori_ref_billing, $id_kategori_ref_billing);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('master/kategori_ref_billing');
    }

    function delete($id)
    {
        $id = decrypt_url($id);
        $result = $this->Kategori_ref_billing_model->doDelete($id);
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
