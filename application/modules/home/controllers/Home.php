<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends ACM_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('sistem/Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data = '';
        $view["content"] = $this->load->view('dashboard', $data, TRUE);
        $this->load_view($view);
    }
}
