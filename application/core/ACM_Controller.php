<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ACM_Controller extends CI_Controller
{

    function __Construct()
    {
        parent::__Construct();
        $this->Authentikasi();
        // if (isset($_REQUEST['ajax'])) {
        //     $_SESSION['ajax'] = '1';
        // }
        // if (isset($_REQUEST['iframe'])) {
        //     $_SESSION['iframe'] = '1';
        // }
    }


    function load_view($view = '')
    {
        $this->load->model('sistem/Menu_model');
        $view['menu'] = $this->Menu_model->GetMenu();
        $view['url']  =  $this->uri->segment('1');

        $this->load->view('admin/template', $view);
    }

    function Authentikasi()
    {
        $this->load->model('sistem/Authentikasi_model');
        $module_non_login = array('non_login');
        $module_login = array('home', 'login');
        $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
        $groupid = isset($_SESSION['groupid']) ? $_SESSION['groupid'] : '';

        $module = ($this->uri->segment(1) == '' ? 'home' : $this->uri->segment(1));
        $class = ($this->uri->segment(2) == '' ? $module : $this->uri->segment(2));
        $doclass = '';
        if (substr($class, strlen($class) - 3, 3) == '_do')
            $class = substr($class, 0, strlen($class) - 3);
        $fungsi = ($this->uri->segment(3) == '' ? 'index' : $this->uri->segment(3));
        // echo $module . '/' . $class . '/' . $fungsi;
        // die;
        if (in_array($module, $module_non_login)) {
        } elseif (in_array($module, $module_login) and $userid) {
        } elseif ($this->Authentikasi_model->CekModule($module, $class, $doclass, $fungsi, $groupid)) {
        } else
        if (!$this->Authentikasi_model->CekModule($module, $class, $doclass, $fungsi, $groupid) and $userid)
            redirect('home/');
        else
            redirect('login');
    }
}

/**
 * End of file YK_Controller.php
 * File location : ./application/core/YK_Controller.php
 */
