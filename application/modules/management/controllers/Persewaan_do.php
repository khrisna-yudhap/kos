<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Persewaan_do extends ACM_Controller
{
    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->library('ciqrcode');  

        $this->load->helper('date');
        $this->load->model('Persewaan_model');
    }

    var $rules = array(

        array(
            'field' => 'KotaId',
            'label' => 'Kabupaten / Kota',
            'rules' => 'required'
        ),
        array(
            'field' => 'LokasiId',
            'label' => 'Lokasi',
            'rules' => 'required'
        ),
        array(
            'field' => 'KamarId',
            'label' => 'Kamar',
            'rules' => 'required'
        ),
        array(
            'field' => 'TanggalAwal',
            'label' => 'Tanggal Awal Sewa',
            'rules' => 'required'
        ),
        array(
            'field' => 'TanggalAkhir',
            'label' => 'Tanggal Akhir Sewa',
            'rules' => 'required'
        ),
        array(
            'field' => 'Keterangan',
            'label' => 'Keterangan',
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
            //Ambil Hari Input Sesuai Hari
            $this->load->helper('tanggal');
            $tglEntry = date('Y-m-d H:i:s');

            //Get User Session ID
            $PengelolaId = $_SESSION['userid'];

            //Tambah Data
            $result = $this->Persewaan_model->DoAdd(
                $PengelolaId,
                $_POST['KotaId'],
                $_POST['LokasiId'],
                $_POST['KamarId'],
                $_POST['NamaPenyewa'],
                $_POST['NomorHp'],
                $_POST['NomorIdentitas'],
                $_POST['JenisSewa'],
                $_POST['BiayaSewa'],
                $_POST['TanggalAwal'],
                $_POST['TanggalAkhir'],
                $tglEntry,
                $_POST['StatusSewa'],
                $_POST['Keterangan'],
            );

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
        $result = $this->Persewaan_model->doDelete($id);
        if ($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }
}

/* End of file Group_do.php */
/* Location: ./application/controllers/system/Group_do.php */