<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_do extends ACM_Controller {
    public function __construct()
{
    parent::__construct();// you have missed this line.
   //$this->load->library('ciqrcode');  

    $this->load->model('User_model');
}   
    
    var $rules = array(
        array(
            'field' => 'UserEmail',
            'label' => 'e-Mail',
            'rules' => 'valid_email'
        ),
        array(
            'field' => 'UserName',
            'label' => 'Nama Pengguna',
            'rules' => 'trim|required|is_unique[yk_user.UserName]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ),
        array(
            'field' => 'check',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|matches[password]'
        ),
    );
    
    function add() {
        $this->load->library('form_validation');
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');

        if($this->form_validation->run() == FALSE) {
            echo validation_errors(); die;
        } else {
            $this->load->model('User_model');
            $this->load->helper('tanggal');
            $foto = '';
//            if ($_FILES['UserFoto']['name'] != '') {
//                $foto = date('Y_m_d_h_m_s') . $_FILES['UserFoto']['name'];
//                move_uploaded_file($_FILES['UserFoto']['tmp_name'], 'images/foto/' . $foto);
//            }
//echo $_POST['UserGroupId'];exit;

            $result = $this->User_model->DoAdd($_POST['UserName'], md5($_POST['password']), $_POST['UserRealName'], $_POST['UserGroupId'], $_POST['UserEmail'],$_POST['UserTelp'], $foto);
            
            if ($result){
                echo 'success'; die;
            } else {
                echo 'Penambahan data gagal.'; die;
            }
        }
    }
    
    function update() {
        $id = decrypt_url($_POST['UserId']);
        // $this->load->library('form_validation');
        // $config = $this->rules;
        // $this->form_validation->set_rules($config);
        // $this->form_validation->set_error_delimiters('', '');

        // if($this->form_validation->run() == FALSE) {
        //     echo validation_errors(); die;
        // } else {
        //     $this->load->model('User_model');
        //     $this->load->helper('tanggal');
            $foto = '';
           // if ($_FILES['UserFoto']['name'] != '') {
           //     $foto = date('Y_m_d_h_m_s') . $_FILES['UserFoto']['name'];
           //     move_uploaded_file($_FILES['UserFoto']['tmp_name'], 'images/foto/' . $foto);
           // }
           // echo $_POST['UserGroupId'];exit;

            $result = $this->User_model->DoUpdate($_POST['UserName'],$_POST['UserRealName'], $_POST['UserGroupId'], $_POST['UserEmail'],$_POST['UserTelp'], $foto, $id);
            
            if ($result){
                echo 'success'; die;
            } else {
                echo 'Perubahan data gagal.'; die;
            }
        // }
    }

    function delete($id) {
        $id = decrypt_url($id);
        $result = $this->User_model->doDelete($id);
        if($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }
}

/* End of file user_do.php */
/* Location: ./application/controllers/system/user_do.php */