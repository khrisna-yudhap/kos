<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Menu_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->User_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'User';

            $view["content"] = $this->load->view('user_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {

        $data = array(
            'button' => 'add',
            'action' => site_url('sistem/user_do/add'),
            'UserId' => set_value('UserId'),
            'UserRealName' => set_value('UserRealName'),
            'UserName' => set_value('UserName'),
            'UserPassword' => set_value('UserPassword'),
            'UserActive' => set_value('UserActive'),
            'UserGroupId' => set_value('UserGroupId'),
            'UserEmail' => set_value('UserEmail'),
            'UserFoto' => set_value('UserFoto'),
            'UserExpired' => set_value('UserExpired'),
            'UserTelp' => set_value('UserTelp'),
        );

        $data['group'] = $this->User_model->GetGroup();

        $view["content"] = $this->load->view('user_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $this->load->model('User_model');
        $row = $this->User_model->getDataById(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('sistem/user_do/update'),
                'UserId' => set_value('UserId', $id),
                'UserRealName' => set_value('UserRealName', $row->UserRealName),
                'UserName' => set_value('UserName', $row->UserName),
                'UserPassword' => set_value('UserPassword', $row->UserPassword),
                'UserActive' => set_value('UserActive', $row->UserActive),
                'UserGroupId' => set_value('UserGroupId', $row->UserGroupId),
                'UserEmail' => set_value('UserEmail', $row->UserEmail),
                'UserFoto' => set_value('UserFoto', $row->UserFoto),
                'UserExpired' => set_value('UserExpired', $row->UserExpired),
                'UserTelp' => set_value('UserTelp', $row->UserTelp),
            );

            $data['group'] = $this->User_model->GetGroup();

            $view["content"] = $this->load->view('user_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sistem/user'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
