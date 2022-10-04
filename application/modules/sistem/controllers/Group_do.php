<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Group_do extends ACM_Controller {
    public function __construct()
{
    parent::__construct();// you have missed this line.
   //$this->load->library('ciqrcode');  

    $this->load->model('Group_model');
}   
    
    var $rules = array(
        array(
            'field' => 'GroupName',
            'label' => 'Nama Group',
            'rules' => 'required'
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
            $this->load->helper('tanggal');
            $foto = '';
           // if ($_FILES['GroupFoto']['name'] != '') {
           //     $foto = date('Y_m_d_h_m_s') . $_FILES['GroupFoto']['name'];
           //     move_uploaded_file($_FILES['GroupFoto']['tmp_name'], 'images/foto/' . $foto);
           // }
           //  echo $_POST['GroupGroupId'];exit;

            $result = $this->Group_model->DoAdd($_POST['GroupName'],$_POST['GroupDescription'] );
            
            if ($result){
                echo 'success'; die;
            } else {
                echo 'Penambahan data gagal.'; die;
            }
        }
    }
    
    function update() {
        $id = decrypt_url($_POST['GroupId']);
            $result = $this->Group_model->DoUpdate($_POST['GroupName'],$_POST['GroupDescription'],$id);
            
            if ($result){
                echo 'success'; die;
            } else {
                echo 'Perubahan data gagal.'; die;
            }
        // }
    }

    function delete($id) {
        $id = decrypt_url($id);
        $result = $this->Group_model->doDelete($id);
        if($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }
}

/* End of file Group_do.php */
/* Location: ./application/controllers/system/Group_do.php */