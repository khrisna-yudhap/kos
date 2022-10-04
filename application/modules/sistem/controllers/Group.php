<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
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

            $data['title'] = 'Group';

            $view["content"] = $this->load->view('group_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    function add()
    {

        $data = array(
            'button' => 'add',
            'action' => site_url('sistem/group_do/add'),
            'GroupId' => set_value('GroupId'),
            'GroupName' => set_value('GroupName'),
            'GroupDescription' => set_value('GroupDescription'),
        );

        $view["content"] = $this->load->view('group_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $this->load->model('Group_model');
        $row = $this->Group_model->getDataById(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('sistem/Group_do/update'),
                'GroupId' => set_value('GroupId', $id),
                'GroupName' => set_value('GroupName', $row->GroupName),
                'GroupDescription' => set_value('GroupDescription', $row->GroupDescription),
            );

            $view["content"] = $this->load->view('group_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Group'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
