<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_do extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        // $this->load->library('form_validation'); 
    }

    var $rules = array(
        array(
            'field' => 'MenuName',
            'label' => 'Nama Menu',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'MenuModule',
            'label' => 'Module / Url',
            'rules' => 'callback_checkStatus'
        ),
        array(
            'field' => 'MenuParent',
            'label' => 'Menu Utama',
            'rules' => 'callback_checkStatus'
        ),
        array(
            'field' => 'MenuOrder',
            'label' => 'Urutan',
            'rules' => 'required'
        ),
        array(
            'field' => 'add',
            'label' => 'Index',
            'rules' => 'trim'
        ),
        array(
            'field' => 'update',
            'label' => 'Update',
            'rules' => 'trim'
        ),
        array(
            'field' => 'delete',
            'label' => 'Delete',
            'rules' => 'trim'
        ),
        array(
            'field' => 'detail',
            'label' => 'Detail',
            'rules' => 'trim'
        ),
        array(
            'field' => 'print',
            'label' => 'Print',
            'rules' => 'trim'
        ),
        array(
            'field' => 'import',
            'label' => 'Import',
            'rules' => 'trim'
        ),
    );

    function checkStatus($status)
    {
        if ($this->input->post('is_child') == '1' && $this->input->post('MenuModule') == '' || $this->input->post('MenuParent') == '') {
            $this->form_validation->set_message("checkStatus", '<br> %s harus diisi.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function add()
    {
        // print_r($this->input->post()); die;
        if ($this->input->post()) {
            $MenuName = $this->input->post('MenuName');
            $MenuModule = $this->input->post('MenuModule') != '' ? $this->input->post('MenuModule') : '#';
            $is_child = $this->input->post('is_child');
            $ParentId = $this->input->post('MenuParent');
            $MenuIsShow = '1';
            $MenuOrder = $this->input->post('MenuOrder');
            $index = $this->input->post('index');
            $add = $this->input->post('update');
            $update = $this->input->post('update');
            $delete = $this->input->post('delete');
            $detail = $this->input->post('detail');
            $print = $this->input->post('print');
            $import = $this->input->post('import');

            if ($ParentId == 0) {
                $MenuParent = $MenuName;
            } else {
                $MenuParent = $this->Menu_model->getMenuParentName($ParentId);
            }


            // print_r($MenuParent);
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
                $result = $this->Menu_model->doAdd(
                    $MenuName,
                    $is_child,
                    $ParentId,
                    $MenuParent,
                    $MenuModule,
                    $MenuIsShow,
                    $MenuOrder,
                    $index,
                    $add,
                    $update,
                    $delete,
                    $detail,
                    $print,
                    $import
                );
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('sistem/menu');
    }

    function update()
    {
        if ($this->input->post()) {
            $MenuName = $this->input->post('MenuName');
            $MenuModule = $this->input->post('MenuModule');
            $is_child = $this->input->post('is_child');
            $ParentId = $this->input->post('MenuParent');
            $MenuIsShow = $this->input->post('MenuIsShow');
            $MenuOrder = $this->input->post('MenuOrder');
            $index = $this->input->post('index');
            $add = $this->input->post('update');
            $update = $this->input->post('update');
            $delete = $this->input->post('delete');
            $detail = $this->input->post('detail');
            $print = $this->input->post('print');
            $import = $this->input->post('import');
            $id = decrypt_url($this->input->post('MenuId'));

            if ($ParentId == 0) {
                $MenuParent = $MenuName;
            } else {
                $MenuParent = $this->Menu_model->getMenuParentName($ParentId);
            }

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
                $result = $this->Menu_model->doUpdate($MenuName, $is_child, $ParentId, $MenuParent, $MenuModule, $MenuIsShow, $MenuOrder, $index, $add, $update, $delete, $detail, $print, $import, $id);
                if ($result) {
                    echo 'success';
                    die;
                }
            }
        }
        redirect('sistem/menu');
    }

    function delete($id)
    {
        $id = decrypt_url($id);
        $this->load->model('menu_model');
        $result = $this->menu_model->doDelete($id);
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
