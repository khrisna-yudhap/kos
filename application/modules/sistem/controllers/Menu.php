<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        // $this->load->library('form_validation'); 
    }

    public function index($mode = '', $jenis = '', $query = '')
    {
        if ($mode == 'json') {
            header('Content-Type: application/json');
            echo $this->Menu_model->json();
            die;
        }
        if ($mode == 'encrypt') {
            $id = encrypt_url($this->input->post('id'));
            echo $id;
        } else {

            $data['title'] = 'Menu';

            $view["content"] = $this->load->view('menu_list', $data, TRUE);
            $this->load_view($view);
        }
    }

    // public function api()
    // {
    //     // $data = json_decode($this->curl->simple_get("https://webservice.jogjakota.go.id/jss/akun?id=".str_replace('_', '-', $id)));

    //     // $id = $this->input->post('id');
    //     $url = "https://layananupik.jogjakota.go.id/lumen/public/master/skpd/list";
    //     $data = json_decode(file_get_contents($url));
    //     $status = isset($data->status)?TRUE:FALSE;
    //     // print_r($data->data[0]->nama); die;
    //     foreach ($data->data as $key) {
    //         $arr = array('kode' => $key->kode,
    //                      'nama' => $key->nama,);

    //         $this->db->insert('skpd', $arr);
    //     }
    //     echo 'ok';
    // }

    // function bc()
    // {

    //     // get cURL resource
    //     $ch = curl_init();

    //     // set url
    //     curl_setopt($ch, CURLOPT_URL, 'https://layananupik.jogjakota.go.id/lumen/public/api/notif');

    //     // set method
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

    //     // return the transfer as a string
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //     // set headers
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //       'Content-Type: application/json; charset=utf-8',
    //       'Cookie: SIMPATDASOLOSESSION=b0sft2tdnavia2cvdrc454p3j3',
    //     ]);

    //     // json body
    //     $json_array = [
    //       'title' => 'Test',
    //       'isi' => 'Test',
    //       'notif' => 'jss',
    //       'user' => [
    //         'JSS-A7324'
    //       ]
    //     ]; 
    //     $body = json_encode($json_array);

    //     // set body
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

    //     // send the request and save response to $response
    //     $response = curl_exec($ch);

    //     // stop if fails
    //     if (!$response) {
    //       die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
    //     }

    //     echo 'HTTP Status Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
    //     echo 'Response Body: ' . $response . PHP_EOL;

    //     // close curl resource to free up system resources 
    //     curl_close($ch);
    // }

    function add()
    {
        $this->load->model('menu_model');

        $data = array(
            'button' => 'add',
            'action' => site_url('sistem/menu_do/add'),
            'MenuParentId' => set_value('MenuParentId'),
            'MenuId' => set_value('MenuId'),
            'MenuName' => set_value('MenuName'),
            'MenuModule' => set_value('MenuModule'),
            'MenuIsShow' => set_value('MenuIcon'),
            'MenuOrder' => set_value('MenuOrder'),
        );

        $data['aksi'] = $this->menu_model->getAksi();
        $data['menu'] = $this->Menu_model->GetMenu();
        $data['menuaksi'] = $this->menu_model->getMenuAksi($menuId = '');

        $view["content"] = $this->load->view('menu_form', $data, TRUE);
        $this->load_view($view);
    }

    function update($id)
    {
        $this->load->model('menu_model');
        $row = $this->menu_model->getDataById(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'update',
                'action' => site_url('sistem/menu_do/update'),
                'MenuId' => set_value('MenuId', $id),
                'MenuParentId' => set_value('MenuParentId', $row->MenuParentId),
                'MenuName' => set_value('MenuName', $row->MenuName),
                'MenuModule' => set_value('MenuModule', $row->MenuModule),
                'MenuIsShow' => set_value('MenuIcon', $row->MenuIcon),
                'MenuOrder' => set_value('MenuOrder', $row->MenuOrder),
            );

            $data['aksi'] = $this->menu_model->getAksi();
            $data['menu'] = $this->Menu_model->GetMenu();
            $data['menuaksi'] = $this->menu_model->getMenuAksi(decrypt_url($id));

            $view["content"] = $this->load->view('menu_form', $data, TRUE);
            $this->load_view($view);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sistem/menu'));
        }
    }
}

/* 
 * End of file menu.php 
 * File location ./application/controllers/system/menu.php
 */
