<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Setoran_do extends ACM_Controller
{
    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->library('ciqrcode');  

        $this->load->helper('date');
        $this->load->model('Setoran_model');
    }

    var $rules = array(

        array(
            'field' => 'LokasiId',
            'label' => 'Lokasi',
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
            $tglSetor = date('Y-m-d H:i:s');

            //Get User Session ID
            $PengelolaId = $_SESSION['userid'];

            //Tambah Data
            $result = $this->Setoran_model->DoAdd(
                $PengelolaId,
                $_POST['LokasiId'],
                $_POST['JumlahSetor'],
                $_POST['TanggalAwal'],
                $_POST['TanggalAkhir'],
                $tglSetor,
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
        $id = $_POST['LokasiId'];
        $result = $this->Lokasi_model->DoUpdate($_POST['LokasiName'], $id);

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
        $result = $this->Setoran_model->doDelete($id);
        if ($result == 0) {
            echo '{"success":false}';
        } else {
            echo '{"success":true}';
        }
    }
}
