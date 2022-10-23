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

    var $rules2 = array(
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
    );

    function checkHarga()
    {
        $this->load->library('form_validation');
        $config = $this->rules2;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            die;
        } else {
            $result = TRUE;

            if ($result) {
                echo 'success';
                die;
            } else {
                echo 'Penambahan data gagal.';
                die;
            }
        }
    }

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

            //Cari Jenis Sewa
            $JenisSewa = "";
            $BiayaSewa = "";

            $TglAwal = $_POST['TanggalAwal'];
            $TglAkhir = $_POST['TanggalAkhir'];

            $TotalDays = (new DateTime($TglAwal))->diff(new DateTime($TglAkhir))->days;


            function cekTgl()
            {
                $TglAwal = $_POST['TanggalAwal'];
                $TglAkhir = $_POST['TanggalAkhir'];

                //Temukan Tanggal Hari Pada Tgl Awal
                $dayAwal = date("d", strtotime($TglAwal));

                //Hitung Jumlah hari pada input tgl akhir
                $dayAkhir = date("d", strtotime($TglAkhir));
                $month = date("m", strtotime($TglAkhir));
                $years = date("y", strtotime($TglAkhir));

                if ($dayAwal == $dayAkhir) {
                    return true;
                }
            }


            //Check Jenis Sewa dan Biaya Sewa

            if (!cekTgl()) {
                if ($TotalDays % 7 != 0) {
                    $JenisSewa = "Harian";

                    //Get Harga
                    $HargaHarian = 185000;

                    $BiayaSewa = $TotalDays * $HargaHarian;
                    echo 'Jenis Sewa = Harian' . '<br>';
                    echo 'Total Hari =' . $TotalDays . '<br>';
                    echo 'Biaya Sewa = ' . $BiayaSewa;
                    die;
                } else {
                    $JenisSewa = "Mingguan";

                    //Get Harga
                    $HargaMingguan = 1400000;

                    $TotalWeeks = $TotalDays / 7;
                    $BiayaSewa = $TotalWeeks * $HargaMingguan;
                    echo 'Jenis Sewa = Mingguan' . '<br>';
                    echo 'Total Minggu = ' . $TotalWeeks . '<br>';
                    echo 'Biaya Sewa = ' . $BiayaSewa;
                    die;
                }
            } else {
                $JenisSewa = "Bulanan";

                //Get Harga $this->Persewaan_model->getHarga()
                $HargaBulanan = 4000000;

                $TotalMonth = $TotalDays / 30;

                $BiayaSewa = round($TotalMonth) * $HargaBulanan;

                echo 'Jenis Sewa = Bulanan' . '<br>';
                echo 'Total Bulan = ' . round($TotalMonth) . '<br>';
                echo 'Biaya Sewa = ' . $BiayaSewa;

                die;

                // //Temukan Tanggal Hari Pada Tgl Awal
                // $dayAwal = date("d", strtotime($TglAwal));

                // //Hitung Jumlah hari pada input tgl akhir
                // $dayAkhir = date("d", strtotime($TglAkhir));
                // $month = date("m", strtotime($TglAkhir));
                // $years = date("y", strtotime($TglAkhir));

                // if ($dayAwal == $dayAkhir) {
                //     echo "Harga 1 Bulan";
                // }
                // // echo $dayAwal . "<br>";
                // // echo days_in_month($month, $years);
                // //Get Harga
                // $HargaBulanan = 4000000;
                // $TotalMonth = $TotalDays / 30;
                // $BiayaSewa = $TotalMonth * $HargaBulanan;

                // echo 'Jenis Sewa = Bulanan' . '<br>';
                // echo 'Total Bulan = ' . $TotalMonth . '<br>';
                // echo 'Biaya Sewa = ' . $BiayaSewa;
                // die;
            }

            // if ($TotalDays % 7 != 0) {
            //     $JenisSewa = "Harian";

            //     //Get Harga
            //     $HargaHarian = 185000;

            //     $BiayaSewa = $TotalDays * $HargaHarian;
            //     echo 'Total Hari =' . $TotalDays . '<br>';
            //     echo 'Biaya Sewa = ' . $BiayaSewa;
            //     die;
            // } else {
            //     $JenisSewa = "Mingguan";

            //     //Get Harga
            //     $HargaMingguan = 1400000;

            //     $TotalWeeks = $TotalDays / 7;
            //     $BiayaSewa = $TotalWeeks * $HargaMingguan;
            //     echo '$JenisSewa = "Mingguan"' . '<br>';
            //     echo 'Total Minggu = ' . $TotalWeeks;
            //     echo 'Biaya Sewa = ' . $BiayaSewa;
            //     die;
            // }

            //Tambah Data
            $result = $this->Persewaan_model->DoAdd(
                $PengelolaId,
                $_POST['KotaId'],
                $_POST['LokasiId'],
                $_POST['KamarId'],
                $_POST['NamaPenyewa'],
                $_POST['NomorHp'],
                $_POST['NomorIdentitas'],
                $JenisSewa,
                $BiayaSewa,
                $_POST['TanggalAwal'],
                $_POST['TanggalAkhir'],
                $tglEntry,
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