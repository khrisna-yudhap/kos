<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kota_do extends ACM_Controller
{
    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->library('ciqrcode');  

        $this->load->model('Kota_model');
    }

    var $rules = array(
        array(
            'field' => 'KotaName',
            'label' => 'Nama Kota',
            'rules' => 'required'
        ),
    );

    function add()
    {
        $this->load->library('form_validation');
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            die;
        } else {
            $this->load->helper('tanggal');
            $result = $this->Kota_model->DoAdd($_POST['KotaName']);

            if ($result) {
                echo 'success';
                die;
            } else {
                echo 'Penambahan data gagal.';
                die;
            }
        }
    }

    function update()
    {
        $id = $_POST['KotaId'];
        $result = $this->Kota_model->DoUpdate($_POST['KotaName'], $id);

        if ($result) {
            echo 'success';
            die;
        } else {
            echo 'Perubahan data gagal.';
            die;
        }
        // }
    }

    function delete($id)
    {
        $result = $this->Kota_model->doDelete($id);
        if ($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }
}

/* End of file Group_do.php */
/* Location: ./application/controllers/system/Group_do.php */