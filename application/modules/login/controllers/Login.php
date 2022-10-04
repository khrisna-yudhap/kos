<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('sistem/Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('login_form');
    }
}
