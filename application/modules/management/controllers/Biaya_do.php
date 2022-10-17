<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Biaya_do extends ACM_Controller
{
    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->library('ciqrcode');  

        $this->load->model('Biaya_model');
    }

    var $rules = array(
        array(
            'field' => 'KamarId',
            'label' => 'Nama kamar',
            'rules' => 'required'
        ),
        array(
            'field' => 'LokasiId',
            'label' => 'Lokasi',
            'rules' => 'required'
        ),
        array(
            'field' => 'KotaId',
            'label' => 'Lokasi Kabupaten',
            'rules' => 'required'
        ),
        array(
            'field' => 'BiayaHarian',
            'label' => 'Biaya per hari',
            'rules' => 'required'
        ),
        array(
            'field' => 'BiayaMingguan',
            'label' => 'Biaya per bulan',
            'rules' => 'required'
        ),
        array(
            'field' => 'BiayaBulanan',
            'label' => 'Biaya per bulan',
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
            // if ($_FILES['GroupFoto']['name'] != '') {
            //     $foto = date('Y_m_d_h_m_s') . $_FILES['GroupFoto']['name'];
            //     move_uploaded_file($_FILES['GroupFoto']['tmp_name'], 'images/foto/' . $foto);
            // }
            //  echo $_POST['GroupGroupId'];exit;

            $result = $this->Biaya_model->DoAdd($_POST['KamarId'], $_POST['LokasiId'], $_POST['KotaId'], $_POST['BiayaHarian'], $_POST['BiayaMingguan'], $_POST['BiayaBulanan']);

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
        $id = $_POST['BiayaId'];
        $result = $this->Biaya_model->DoUpdate($_POST['KamarId'], $_POST['LokasiId'], $_POST['KotaId'], $_POST['BiayaHarian'], $_POST['BiayaMingguan'], $_POST['BiayaBulanan'], $id);

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
        $result = $this->Biaya_model->doDelete($id);
        if ($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }
}

/* End of file Group_do.php */
/* Location: ./application/controllers/system/Group_do.php */
